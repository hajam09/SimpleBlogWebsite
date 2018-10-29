<!DOCTYPE html>
	<html>
	<head>
		<title>Welcome to Mohamed Ashraf Hajamohideen's Blog</title>
		<style type="text/css">
			html
			{
				margin: 0;
				padding: 0;
				background-color: #e0e1e2;
				position: center;
			}
			#main
			{
				float: left;
				width: 71.832%;
				background-color: #e0e1e2;
				padding: 10px;
			}
			#sidebar
			{
				float: right;
				width: 25%;
				background-color:#e0e1e2;
				padding: 10px;
			}
			#page
			{
				margin-left:auto;
				margin-right:auto;
				width:960px;
			}
			p.top
			{
				font-family: 'arial';
				color: #464949;
				font-size: 12px;

			}
			p.middle
			{
				font-family: 'Bookman Old Style';
				color: #ba0000;
				font-size: 23px;


			}
			p.bottom
			{
				font-family: 'Arial Unicode MS';
				color: #111111;
				font-size: 18px;

			}
		</style>
	</head>
	<body>
		<?php
		//
		$selected='';
		function get_months($select)
		{
			$months = array('Select...'=>0,'January'=>1, 'February'=>2, 'March'=>3, 'April'=>4, 'May'=>5, 'June'=>6, 'July'=>7, 'August'=>8, 'September'=>9, 'October'=>10, 'November'=>11, 'December'=>12);
			$options = '';
			while(list($a, $b)=each($months))
			{
				if($select==$b)
					{
						$options.='<option value="'.$n.'"selected>'.$a.'</option>';
					}
				else
					{
						$options.='<option value="'.$b.'">'.$a.'</option>';
					}
				
			}
			return $options;
		}
		function showBlogByMonth($lookUpWord)
		{
			$myFile = "userBlogEntryRepeat.txt";
			$lines = file($myFile);
			for($i = 0; $i<count(file($myFile)); $i++)
			{
				if(strpos($lines[$i], $lookUpWord)!== false)
				{
					$second = $i+1;
					$third = $i+2;
					echo '<pre>'; print_r("<td><p class='top'> $lines[$i]</p></td>"); echo '</pre>';
					echo '<pre>'; print_r("<td><p class='middle'> $lines[$second]</p></td>"); echo '</pre>';
					echo '<pre>'; print_r("<td><p class='bottom'> $lines[$third]</p></td>"); echo '</pre>';
					echo '<hr style="height:2px;border:none;color:black;background-color:black;" />';
				}
			}
		}
		if(isset($_POST['months']))
		{
			$selected = $_POST['months'];
		}
		//
		echo"<div id = 'page'>
				<img src = 'TitleBanner.PNG'>
			</div>";

			$myfile = "userBlogEntry.txt";
			$lines = file($myfile);

			$lineCounter = COUNT(FILE($myfile))-1;
			$myfile2 = fopen("userBlogEntryRepeat.txt", "r+") or die("Unable to open file!");
			while($lineCounter>=0)
			{
				$temp = $lines[$lineCounter];
				$lineCounter = $lineCounter-1;
				fwrite($myfile2, $temp);
				//echo $temp."<br />";
			}
			fclose($myfile2);
			$entryDate = array();
			$userTitle = array();
			$userDay = array();
			$myFile = "userBlogEntryRepeat.txt";
			$openFile = fopen($myFile,'r');
			while(!feof($openFile))
			{
				$entryDate[] = fgets($openFile);
				$userTitle[] = fgets($openFile);
				$userDay[] = fgets($openFile);
			}
			fclose($openFile);

			/*for($i = 0; $i < count($entryDate); $i++)
			{
				echo '<pre>'; print_r("<td><p class='top'> $entryDate[$i]</p></td>"); echo '</pre>';
				echo '<pre>'; print_r("<td><p class='middle'> $userTitle[$i]</p></td>"); echo '</pre>';
				echo '<pre>'; print_r("<td><p class='bottom'> $userDay[$i]</p></td>"); echo '</pre>';
				echo '<hr style="height:2px;border:none;color:black;background-color:black;" />';
			}*/
		echo"<div id='main'>";
				//<h1>Welcome to my homepage!</h1>
		if($selected==0)
		{
			for($i = 0; $i < count($entryDate); $i++)
			{
				echo '<pre>'; print_r("<td><p class='top'> $entryDate[$i]</p></td>"); echo '</pre>';
				echo '<pre>'; print_r("<td><p class='middle'> $userTitle[$i]</p></td>"); echo '</pre>';
				echo '<pre>'; print_r("<td><p class='bottom'> $userDay[$i]</p></td>"); echo '</pre>';
				echo '<hr style="height:2px;border:none;color:black;background-color:black;" />';
			}
		}
		elseif ($selected==1)
		{
			showBlogByMonth("Jan");
			/*$lookUpWord = "Jan";
			$myFile = "userBlogEntryRepeat.txt";
			$lines = file($myFile);
			for($i = 0; $i<COUNT(FILE($myfile)); $i++)
			{
				if(strpos($lines[$i], $lookUpWord)!== false)
				{
					$second = $i+1;
					$third = $i+2;
					echo '<pre>'; print_r("<td><p class='top'> $lines[$i]</p></td>"); echo '</pre>';
					echo '<pre>'; print_r("<td><p class='middle'> $lines[$second]</p></td>"); echo '</pre>';
					echo '<pre>'; print_r("<td><p class='bottom'> $lines[$third]</p></td>"); echo '</pre>';
					echo '<hr style="height:2px;border:none;color:black;background-color:black;" />';
				}
			}*/
		}
		elseif ($selected==2)
		{
			showBlogByMonth("Feb");
		}
		elseif ($selected==3)
		{
			showBlogByMonth("Mar");
		}
		elseif ($selected==4)
		{
			showBlogByMonth("Apr");			
		}
		elseif ($selected==5)
		{
			showBlogByMonth("May");
		}
		elseif ($selected==6)
		{
			showBlogByMonth("Jun");
		}
		elseif ($selected==7)
		{
			showBlogByMonth("Jul");
		}
		elseif ($selected==8)
		{
			showBlogByMonth("Aug");
		}
		elseif ($selected==9)
		{
			showBlogByMonth("Sept");
		}
		elseif ($selected==10)
		{
			showBlogByMonth("Oct");
		}
		elseif ($selected==11)
		{
			showBlogByMonth("Nov");
		}
		elseif ($selected==12)
		{
			showBlogByMonth("Dec");
		}
		?>
		</div>
		<div id='sidebar'>
			<ul>
				<form action="viewBlog.php" method="POST" id="myForm">
					<table id="my_table">
						<tr>
							<td><input name = "toBlog" type="submit" value="Upload the entry"></td>
						</tr>
					</table>
				</form>
				<form action="addentry.php" method="POST" id="myForm">
					<table id="my_table">
						<tr>
							<td><input name = "toEdit" type="submit" value="Go back to edit"></td>
						</tr>
					</table>
				</form>
			</ul>
			For which month do you want to view the blog?
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" METHOD="POST">
				<select name = "months" onchange="this.form.submit();">
					<?php echo get_months($selected);?>					
				</select>
			</form>
		</div>
	</body>
</html>