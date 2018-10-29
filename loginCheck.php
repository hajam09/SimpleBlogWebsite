<?php
$myFile2 = "userLoginDetails.txt";
$lines2 = file($myFile2);
if(count(file($myFile2))==0)
{
	header('Location: login.html');
}
else
{
	header('Location: add_entry.html');
}
?>