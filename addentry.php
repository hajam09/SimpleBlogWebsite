<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<script>
		//document.getElementById("date").innerHTML = Date();
	</script>
	<body>
		<?php
		if(isset($_POST['toEdit']))
		{
			include 'add_entry_Preview.php';

			$myFile = "userBlogEntry.txt";
			$lines = file($myFile);
			$tempFile = fopen("previewTempFiles.txt", "w") or die("Unable to open file!");
			for($i = 0; $i<=count(file($myFile))-4; $i++)
			{
				fwrite($tempFile, $lines[$i]);
			}
			fclose($tempFile);

			$myFile1 = "previewTempFiles.txt";
			$lines1 = file($myFile1);
			$tempFile1 = fopen("userBlogEntry.txt", "w") or die("Unable to open file!");
			for($j = 0; $j<count(file($myFile1)); $j++)
			{
				fwrite($tempFile1, $lines1[$j]);
			}
			fclose($tempFile1);

		}

		if(isset($_POST['cancel']))
		{
			header('Location: viewBlog.php');
		}

		function writeTOFile($titleEntry, $userEntry)
		{
			$date = new DateTime();
			//$date = $date->format("D M j Y h:i a T");
			$date = $date->format("D, M jS, Y, h:i a e");
			$myfile = fopen("userBlogEntry.txt", "a+") or die("Unable to open file!");
			fwrite($myfile, $userEntry."\r\n");
			fwrite($myfile, $titleEntry."\r\n");
			fwrite($myfile, $date."\r\n");
			fclose($myfile);

		}

		function logEntries()
		{
			if (!empty($_SERVER['HTTP_CLIENT_IP']))
			{
				$ip=$_SERVER['HTTP_CLIENT_IP'];
			}
			elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
			{
				$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
			}
			else
			{
				$ip=$_SERVER['REMOTE_ADDR'];
			}
			$date = new DateTime();
			$date = $date->format("D, M jS, Y, h:i:s a e");
			$ipFile = fopen("logEntries.txt", "a+") or die("Unable to open file!");
			$entryFileName = "logEntries.txt";
			$entryInfo = "User Entry ".count(file($entryFileName))." IP: ".$ip." entered at ".$date;
			fwrite($ipFile, $entryInfo."\r\n");
			fclose($ipFile);
		}

		if(isset($_POST['submit']))
		{
			$titleEntry = $_POST['titleText'];
			$userEntry = $_POST['userdataentry'];
			include 'add_entry_Preview.php';			
			if($titleEntry == null || $userEntry == null)
				{
					header('Location: add_entry.html');
				}
			else
				{
					writeTOFile($titleEntry, $userEntry);
					logEntries();
					header('Location: viewBlog.php');
				}
		}
		elseif(isset($_POST['preview']))
		{
			$titleEntry = $_POST['titleText'];
			$userEntry = $_POST['userdataentry'];
			if($titleEntry == null || $userEntry == null)
				{
					header('Location: add_entry.html');
				}
			else
				{
					writeTOFile($titleEntry, $userEntry);
					header('Location: previewBlog.php');
				}
		}
		?>
	</body>
</html>