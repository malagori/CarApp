<?php

ini_set('display_errors','On');
 error_reporting(E_ALL);

include_once "functions.php";
include_once "db_connect.php";

date_default_timezone_set("Europe/Stockholm");

function sec_session_start() {
        $session_name = 'login'; // Set a custom session name
        $secure = false; // Set to true if using https.
        $httponly = true; // This stops javascript being able to access the session id. 
 
        ini_set('session.use_only_cookies', 1); // Forces sessions to only use cookies. 
        $cookieParams = session_get_cookie_params(); // Gets current cookies params.
        session_set_cookie_params(1800, $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
        session_name($session_name); // Sets the session name to the one set above.
        session_start(); // Start the php session
        session_regenerate_id(); // regenerated the session, delete the old one.  
}

// Kund Registration function
function Register($form1_Namnn, $form1_Telefone, $form1_Adres, $form1_Epost) {
	
	echo $form1_Namnn;
	
}


function login($email, $password, $mysqli) {
   // Using prepared Statements means that SQL injection is not possible. 
   if ($stmt = $mysqli->prepare("SELECT id, firstname, lastname, password, salt FROM members WHERE email = ? LIMIT 1")) { 
      $stmt->bind_param('s', $email); // Bind "$email" to parameter.
      $stmt->execute(); // Execute the prepared query.
      $stmt->store_result();
      $stmt->bind_result($user_id, $first, $last, $db_password, $salt); // get variables from result.
      $stmt->fetch();
      $password = hash('sha512', $password.$salt); // hash the password with the unique salt.
 
      if($stmt->num_rows == 1) { // If the user exists
         // We check if the account is locked from too many login attempts
         if(checkbrute($user_id, $mysqli) == true) { 
            // Account is locked
            // Send an email to user saying their account is locked
            return false;
         } else {
         if($db_password == $password) { // Check if the password in the database matches the password the user submitted. 
            // Password is correct!
 
 
               $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
 
               $user_id = preg_replace("/[^0-9]+/", "", $user_id); // XSS protection as we might print this value
               $_SESSION['user_id'] = $user_id; 
               $_SESSION['user_email'] = $email;
               $_SESSION['user_first'] = $first;
               $_SESSION['user_last'] = $last;
             
               $_SESSION['login_string'] = hash('sha512', $password.$user_browser);
               // Login successful.
               return true;    
         } else {
            // Password is not correct
            // We record this attempt in the database
            $now = time();
            $mysqli->query("INSERT INTO login_attempts (user_id, time) VALUES ('$user_id', '$now')");
            return false;
         }
      }
      } else {
         // No user exists.
         return false;
      }
   }
}

// Duplicate Email function

function duplicate($regemail, $mysqli) {
    
if($stmt= $mysqli->prepare("SELECT * FROM members WHERE email= ?")){
       
     $stmt->bind_param('s', $regemail);
     $stmt->execute();
      $stmt->store_result();

       if($stmt->num_rows > 0) {
         return true;
      } else {
         return false;
      }
}
}

function checkbrute($user_id, $mysqli) {
   // Get timestamp of current time
   $now = time();
   // All login attempts are counted from the past 2 hours. 
   $valid_attempts = $now - (60 * 60); 
 
   if ($stmt = $mysqli->prepare("SELECT time FROM login_attempts WHERE user_id = ? AND time > '$valid_attempts'")) { 
      $stmt->bind_param('i', $user_id); 
      // Execute the prepared query.
      $stmt->execute();
      $stmt->store_result();
      // If there has been more than 5 failed logins
      if($stmt->num_rows > 10) {
         return true;
      } else {
         return false;
      }
   }
}

function login_check($mysqli) {
   // Check if all session variables are set
   if(isset($_SESSION['user_id'], $_SESSION['login_string'])) {
     $user_id = $_SESSION['user_id'];
     $login_string = $_SESSION['login_string'];
 
     $user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
 
     if ($stmt = $mysqli->prepare("SELECT password FROM members WHERE id = ? LIMIT 1")) { 
        $stmt->bind_param('i', $user_id); // Bind "$user_id" to parameter.
        $stmt->execute(); // Execute the prepared query.
        $stmt->store_result();
 
        if($stmt->num_rows == 1) { // If the user exists
           $stmt->bind_result($password); // get variables from result.
           $stmt->fetch();
           $login_check = hash('sha512', $password.$user_browser);
           if($login_check == $login_string) {
              // Logged In!!!!
              return true;
           } else {
              // Not logged in
              return false;
           }
        } else {
            // Not logged in
            return false;
        }
     } else {
        // Not logged in
        return false;
     }
   } else {
     // Not logged in
     return false;
   }
}

function pts($user, $mysqli)
{
    if($stmt = $mysqli->prepare("SELECT pts FROM members WHERE id = ?"))
    {
        $stmt->bind_param('s', $user);
        $stmt->execute();
        $stmt->bind_result($pts);
        $stmt->fetch();
        
        return $pts;
    }
}

function leaders($mysqli)
{
	$arr = array();

			if($stmt = $mysqli->prepare("SELECT firstname, lastname, pts FROM members ORDER BY pts DESC LIMIT 20"))
			{
				$stmt->execute();
				$stmt->bind_result($firstname, $lastname, $pts);
				while($stmt->fetch())
				{
					$arr[] = $firstname;
					$arr[] = $lastname;
                    $arr[] = $pts;
				}
				
				return $arr;
			}
}

function games($mysqli)
{
    
    $time = date("Y-m-d H:i:s");
 
    $arr = array();
    
    if($stmt = $mysqli->prepare("SELECT game_id, l1, l2, start_time, res, i1, i2 FROM games WHERE open_time < '$time' AND start_time > '$time' ORDER BY start_time ASC"))
    {
        
     $stmt->execute();
     $stmt->bind_result($game_id, $l1, $l2, $start_time, $res, $i1, $i2);
     while($stmt->fetch())
     {
         $arr[] = $game_id;
         $arr[] = $l1;
         $arr[] = $l2;
         $arr[] = $start_time;
         $arr[] = $res;
         $arr[] = $i1;
         $arr[] = $i2;
     }
        
    return $arr;
        
    }
    
}

function bet($user, $game, $bet, $mysqli)
{
    
 if($stmt = $mysqli->prepare("INSERT INTO `bets` (`user_id`,`game_id`,`bet`) VALUES (?, ?, ?) On DUPLICATE KEY UPDATE `bet`= ?"))
 {
  $stmt->bind_param('ssss', $user, $game, $bet, $bet);
  $stmt->execute();
     
  return true;
 }
    else
    {
        return false;
    }
    
}

function gameids($mysqli)
{
 
 $ids = array();
    
 if($stmt = $mysqli->prepare("SELECT game_id FROM games ORDER BY game_id ASC"))
 {
     
     $stmt->execute();
     $stmt->bind_result($id);
     while($stmt->fetch())
     {
        $ids[] = $id;   
     }
     
     return $ids;    
 }
    
}

function ubetgids($user, $mysqli)
{
    
 $ids = array();
    
 if($stmt = $mysqli->prepare("SELECT game_id FROM bets WHERE user_id = ? ORDER BY game_id ASC"))
 {
     
    $stmt->bind_param('s', $user);
    $stmt->execute();
    $stmt->bind_result($id);
     while($stmt->fetch())
     {
        $ids[] = $id;   
     }
     
     return $ids;
     
 }
    
}

function updatepoints($mysqli)
{
    
    $res = array();
    $bets = array();
    $ids = array();
    
    $real_gids = gameids($mysqli);
    $legbets = array();
    
    if($stmt = $mysqli->prepare("SELECT winner FROM games ORDER BY game_id ASC"))
    {
        
        $stmt->execute();
        $stmt->bind_result($win);
        while($stmt->fetch())
        {
            $res[] = $win;   
        }
        
    }
        
    if($stmt = $mysqli->prepare("SELECT id FROM members"))
    {
        $stmt->execute();
        $stmt->bind_result($id);
        while($stmt->fetch())
        {
            $ids[] = $id;   
        }
        
    }
    
    for($i=0;$i<count($ids);$i++)
    {
        
        $bets = array();
        $legbets = array();
        
        if($stmt = $mysqli->prepare("SELECT bet FROM bets WHERE user_id = ? ORDER BY game_id ASC"))
        {
        
        $stmt->bind_param('s', $ids[$i]);
        $stmt->execute();
        $stmt->bind_result($bet);
        while($stmt->fetch())
        {
            if($bet==null)
            {
                $bets[] = "0";   
            }
            else
            {
                $bets[] = $bet;
            }
        }
        
        }
        
        $user_gids = ubetgids($ids[$i], $mysqli);
        
        $x=0;
        $int=0;
        
        while($int<count($real_gids))
        {
            if($real_gids[$int]  == $user_gids[$x])
            {
                $legbets[] = $bets[$x];
                $int++;$x++;
            }
            else
            {
                $legbets[] = "0";
                $int++;   
            }
        }
        
        $pts = count(array_intersect_assoc($res, $legbets));
        
        if($up_stmt = $mysqli->prepare("UPDATE members SET pts = ? WHERE id = ?"))
        {
            $up_stmt->bind_param('is', $pts, $ids[$i]);
            $up_stmt->execute(); 
        }
        
    }
    
}

function gamebet($game, $mysqli)
{
    
    $b = "";
    
    if($stmt = $mysqli->prepare("SELECT bet FROM bets WHERE user_id = ? AND game_id = ?"))
    {
        $stmt->bind_param('ss', $_SESSION['user_id'], $game);
        $stmt->execute();
        $stmt->bind_result($bet);
        while($stmt->fetch())
        {
            $b = $bet;
        }
        
        return $b;
        
    }
    else
    {
        return 0;   
    }
    
}


?>

