<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
		if(isset($_POST['logout']))
		{
			$fileToClear = fopen("userLoginDetails.txt", "w") or die("Unable to open file!");
			$write = '';
			fwrite($fileToClear, $write);
			fclose($fileToClear);
			header('Location: viewBlog.php');
		}
		?>
	</body>
</html>