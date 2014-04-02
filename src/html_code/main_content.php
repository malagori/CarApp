<?php
include("connect.php");
$select_post="select * from post order by rand() LIMIT 0,4";
$run_post=mysql_query($select_post);
while($row=mysql_fetch_array($run_post)){
$post_id=$row['post_id'];
$post_title=$row['post_title'];
$post_date=$row['post_date'];
$post_author=$row['post_author'];
$post_image=$row['post_image'];
$post_keyword=$row['post_keyword'];
$post_content= substr($row['post_content'],0,300);

?>
<div class="mainContent" align="center">
<div class="content">
<article class="topContent">
<header align="left">
<h2><a href="pages.php?id=<?php echo $post_id; ?>" title="First Post"><?php echo $post_title; ?></a></h2>
</header>
<footer>

<div class="postinfo" align="left"> By <b><?php echo $post_author ?></b>
Date <?php echo $post_date ?>
</div>

</footer>
<content>
<img src="images/<?php echo $post_image ?>" alt="<?php $post_image ?>">
<p> 

<?php echo $post_content ?>

</p>

</content>
<p align="right"><a href="pages.php?id=<?php echo $post_id; ?>">Read More</a></p>

</article>

</div>
<?php
}
?>

</div>
