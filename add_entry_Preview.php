<!DOCTYPE html>
<html>
	<head>
		<title>Add entry to My Own Blog!</title>
	</head>
	<style type="text/css">
	body
	{
		background-color: #e5e7ea;
	}
	h1
	{
		color: #ba3939;
		margin-left: 50px;
	}
	#my_table
	{
		margin-left:50px;
	}
	p
	{
		margin-left: 50px;
	}
	</style>
	<script>
		function confirm_reset()
		{
			document.getElementById("myForm").reset();
			return confirm("Clear the form?");

		}
	</script>
	<body>
		<h1>Add an entry to Mohamed Ashraf Hajamohideen's Blog!</h1>
		<p>Instructions: Enter a title and body for your blog entry. In the body, you can use simple HTML formatting elements, such as &lt;b&gt; (bold) and &lt;i&gt; (italic) as well as the hyperlink "anchor" element &lt;a&gt;.</p>
		
		<form action="addentry.php" method="POST" id="myForm">
		<?php
		$myFile = "userBlogEntry.txt";
		$lines = file($myFile);
		//$lineCounter = count(file($myFile));
		$oldDay = $lines[count(file($myFile))-1];
		$oldTitleEdit = $lines[count(file($myFile))-2];
		$oldBodyEdit = $lines[count(file($myFile))-3];
		
		?>
		<table id="my_table">
			<tr>
				<td></td>
			</tr>
			<tr>
				<td>Title: </td>
				<td><input type="text" name="titleText" size="60" value="<?php echo$oldTitleEdit?>"></td>
			</tr>
			<tr>
				<td>Body: </td>
				<td><textarea rows="9" cols="100" name="userdataentry"><?php echo$oldBodyEdit?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input name = "submit" type="submit" value="Add entry"><input type="button" onclick="return confirm_reset()" value="Clear"><input name = "preview" type="submit" value="Preview"><input name = "cancel" type="submit" value="Cancel"></td>
			</tr>
		</table>
		</form>
		<!--<form method="POST" action="previewBlog.php">
			<button type="submit">Preview</button>
		</form>-->
	</body>
</html>