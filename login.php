<?php
if(isset($_POST['submit']))
{
	$userName = $_POST['username'];
	$passWord = $_POST['password'];

	if($userName == "admin" && $passWord == "admin")
	{
		$myfile = fopen("userLoginDetails.txt", "w+") or die("Unable to open file!");
		fwrite($myfile, $userName."\r\n");
		fclose($myfile);
		header('Location: add_entry.html');
	}
	else
	{
		header('Location: login.html');
	}
}
?>