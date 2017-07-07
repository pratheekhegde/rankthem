<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Victim Profile</title>
</head>
<body>
<?php  
	require_once './Core.fnc.php';
	$id=$_POST['id'];
	if($id==NULL){
		header("location: index.php");
		exit();
	}
	//connect to database
	$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
	mysql_select_db($mysql_database, $bd) or die("Could not select database");
	 $qry="SELECT * FROM `table 1` WHERE id='$id'";
	$res=mysql_query($qry);
	$victim = mysql_fetch_assoc($res);
	$name = $victim['name'];
	$usn = $victim['usn'];
	$vwon = $victim['vwon'];
    $vlost = $victim['vlost'];
	$usn=GetProperUSN($usn);
	$vicpic= 'images/'.$usn.'.jpg';
	?>

<center>
<?php GetMainLogo();?><br><br>
<DIV STYLE="font-family: 'Lucida Sans';"> 
<table rules=cols width="600" height="420" bgcolor=wheat>
  <tr>
    <th width="600" height=20 colspan=2><?php echo $name;?></th>
   </tr>
  <tr>
    <td height="300" colspan=2><center> <?php
									if (file_exists($vicpic)){
										echo ('<img src="images/'.$usn.'.jpg" />');
									}else {
										echo '<img src="images/noimg.jpg" />';
									}
								?>		
								</center> </td>
  </tr>
  <tr>  
    <td height="40" align=right><font color=green>Votes Won: <?php echo $vwon;?><font>&nbsp;&nbsp;</td>
	<td height="40" align=left><font color=red>&nbsp;&nbsp;Votes Lost: <?php echo $vlost;?></font></td>	
  </tr>
  <tr>
    <td height="40" colspan=2><center><?php echo GetYear($usn);?></center></td>
  </tr>
  <tr>
  <td height="40" colspan=2><center><?php	echo GetBranch($usn);?></center></td>
</tr>
  </table>
  </div>
  <br>
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
