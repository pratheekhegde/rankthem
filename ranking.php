<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ranking</title>
</head>
<body>
<style>
button.link {
	-moz-user-select: text;
	background: none;
	border: none;
	color: blue;
	cursor: pointer;
	font-size: 1em;
	margin: 0;
	padding: 0;
	text-align: left;
}
 
button.link:hover span {
	text-decoration: underline;
}
</style>
<center><?php
				require_once './Core.fnc.php';
				GetMainLogo();
		?><br>
<DIV STYLE="font-family: 'Lucida Sans';"> 
<a href=index.php >Home</a><br><hr>
<table rules=cols height=20 bgcolor=#FFFF33 border=1><tr><td><b><font color=red>[TIP]</font></b> If you are browsing in a PC press Ctrl+F to search for a specific victim.</td></tr></table>
</center>
<?php  
	$link=mysql_connect($mysql_hostname,$mysql_user,$mysql_password) or die("Cannot Connect to the database!");
	  mysql_select_db($mysql_database,$link) or die ("Cannot select the database!");
	  $query="SELECT * FROM `table 1` ORDER BY vwon DESC";
	  $resource=mysql_query($query,$link);
	 
		echo "<b><DIV STYLE=\"font-family: 'Lucida Sans';\"> <center><b><u>Ranking</b></u></center></b>
			<table bgcolor=wheat align=\"center\" border=\"0\" width=\"50%\">
		<tr>
			<td><b><center>Rank</center><b></td>
			<td><b><center>Name</center><b></td>
			<td><b><center>Branch</b></center></td>
			<td><b><center>Year</b></center></td>
			<td><b><center>Votes Won</center></b></td>
			
			</tr> ";
		$rank=1;
	while($result=mysql_fetch_array($resource)){
		$branch = GetBranch($result[2]);
		$year = GetYear($result[2]);
        if (!$result[3]<=0){
		echo "<tr><form action=\"victim.php\" method=\"POST\"><input name=\"id\" type=\"Hidden\" id=\"id\" value=".$result[0].">
			<td><center>".$rank++."</center></td>
			<td><center><button type=submit class=link><span>".$result[1]."</span></button></form></center></td>
			<td><center>".$branch."</center></td>
			<td><center>".$year."</center></td>
			<td><center>".$result[3]."</center></td>
			
		</tr>";
		}
	}
	 echo "</div></table>";
?>	
<br>

<center>
<table bgcolor=#8FC1F3 width=760px;>
 <tr><td width=760 align=center><font size=3>
  				<span style="font-family:'Lucida Sans Typewriter Regular';"><br />
				<a href="ranking.php"> View Ranking</a> | <a href="index.php">Home</a> | <a href=faq.php >FAQ</a> | <a href=about.php >About</a><br />
							<font size=2>	Total victims :<?php echo $totalvictims;?><br>
											Total Victims with Pics :<?php GetPhotoUploadcount(); ?><br>
									Designed by humans like you.<br />
									garbage69,skinreaper<br />
									&copy;2014. All rights reserved<br />
							This website is made purely for entertainment purpose.</font>
			</span></font>
				
		</td>
		</tr>
</table>
</center>
</body>
</html>
