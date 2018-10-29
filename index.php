<?php
$myFile = "userBlogEntryRepeat.txt";
$myFile2 = "userLoginDetails.txt";
$lines = file($myFile);
$lines2 = file($myFile2);
if(count(file($myFile))==0 || count(file($myFile2))==0)
{
	header('Location: login.html');
}
else
{
	header('Location: viewBlog.php');
}
?>