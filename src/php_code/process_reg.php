<?php

ini_set('display_errors','On');
error_reporting(E_ALL);
header('Content-Type: text/html; charset=UTF-8');

include_once 'functions.php';
include_once 'db_connect.php';



/*


if (empty($_REQUEST) === false)
{
    $regemail1 = filter_input('INPUT_REQUEST', 'email', 'FILTER_SANITIZE_EMAIL');
    $regfirst1 = filter_input('INPUT_REQUEST', 'fname', 'FILTER_SANITIZE_SPECIAL_CHARS');
    $reglast1 = filter_input('INPUT_REQUEST', 'lname',  'FILTER_SANITIZE_SPECIAL_CHARS');
    $reglast1 = $_POST['lname'];
    $regpass = $_POST['p'];
    
    $regemail = htmlspecialchars($regemail1);
    $reglast = htmlspecialchars($reglast1);
    $regfirst = htmlspecialchars($regfirst1);
      

}
*/



$regemail1 = $_POST['email'];
$reglast1 = $_POST['lname'];
$regfirst1 = $_POST['fname'];
$regpass = $_POST['p'];

$regemail = htmlspecialchars($regemail1);
$reglast = htmlspecialchars($reglast1);
$regfirst = htmlspecialchars($regfirst1);






if(duplicate($regemail, $mysqli) == false) {

$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
$reghashpass = hash('sha512', $regpass.$random_salt);

// TODO: We have to prevent duplicate accounts and tell the user an account with that email already exists

if ($insert_stmt = $mysqli->prepare("INSERT INTO members (email, firstname, lastname, password, salt, pts) VALUES (?, ?, ?, ?, ?, 0)")) {    
   $insert_stmt->bind_param('sssss', $regemail, $regfirst, $reglast, $reghashpass, $random_salt); 
   // Execute the prepared query.
   $insert_stmt->execute();
    
   echo "DONE";
}

echo "FILE EXECUTED";
    
    echo "<br>".$reglast . "<br>";
    
   echo $regfirst . "<br>";
    echo $regemail . "<br>";
  echo $regpass . "<br>";
 }
else
    
{
 
 echo "This Email is already registered";
    
}

?>