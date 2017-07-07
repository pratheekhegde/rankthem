<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=Windows-1252"/>
 <title>Welcome to RankThem!</title>
</head>
<body style="background-color: #F6F6F6">
<?php
	require_once './Core.fnc.php';
	//connect database
	$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
	mysql_select_db($mysql_database, $bd) or die("Could not select database");
	//Start session          s
	session_start();	
	//Unset the variables stored in session
	unset($_SESSION['SESS_VICTIM_ID1']);
	unset($_SESSION['SESS_NAME1']);
	unset($_SESSION['SESS_USN1']);
    unset($_SESSION['SESS_vwon1']);
    unset($_SESSION['SESS_vwon2']);
    unset($_SESSION['SESS_VICTIM_ID2']);
	unset($_SESSION['SESS_NAME2']);
	unset($_SESSION['SESS_USN2']); 
	
	
	//generating random ids
generateid:
$id1=(mt_rand(1,$totalvictims));
$id2=(mt_rand(1,$totalvictims));
if($id1==$id2){
	goto generateid;
}
while(!(($id1!=$_SESSION['previd']) && ($id1!=$_SESSION['previd1']) && ($id1!=$_SESSION['previd2']) && ($id1!=$_SESSION['previd3']) && ($id1!=$_SESSION['previd4']) && ($id1!=$_SESSION['previd5']) && ($id1!=$_SESSION['previd6']) && ($id1!=$_SESSION['previd7']) && ($id1!=$_SESSION['previd8']) && ($id1!=$_SESSION['previd9']) && ($id1!=$_SESSION['previd10']))){
$id1=(mt_rand(1,$totalvictims));
}
while(!(($id2!=$_SESSION['previd']) && ($id2!=$_SESSION['previd1']) && ($id2!=$_SESSION['previd2']) && ($id2!=$_SESSION['previd3']) && ($id2!=$_SESSION['previd4']) && ($id2!=$_SESSION['previd5']) && ($id2!=$_SESSION['previd6']) && ($id2!=$_SESSION['previd7']) && ($id2!=$_SESSION['previd8']) && ($id2!=$_SESSION['previd9']) && ($id2!=$_SESSION['previd10']))){
$id2=(mt_rand(1,$totalvictims));
}

//Create query
	$qry1="SELECT * FROM `table 1` WHERE id='$id1'";
	$res1=mysql_query($qry1);
    $qry2="SELECT * FROM `table 1` WHERE id='$id2'";
	$res2=mysql_query($qry2);
    
    //retriving victims
	session_regenerate_id();
	$victim1 = mysql_fetch_assoc($res1);
    $victim2 = mysql_fetch_assoc($res2);
	$_SESSION["SESS_VICTIM_ID1"] = $victim1['id'];
	$_SESSION['SESS_NAME1'] = $victim1['name'];
	$_SESSION['SESS_USN1'] = $victim1['usn'];
	$_SESSION['SESS_vwon1'] = $victim1['vwon'];
    $_SESSION['SESS_vwon2'] = $victim1['vwon'];
    $_SESSION['SESS_VICTIM_ID2'] = $victim2['id'];
	$_SESSION['SESS_NAME2'] = $victim2['name'];
	$_SESSION['SESS_USN2'] = $victim2['usn'];

	$vic1usn=GetProperUSN($_SESSION['SESS_USN1']);
	$vic2usn=GetProperUSN($_SESSION['SESS_USN2']);
	$vic1pic= 'images/'.$vic1usn.'.jpg';
	$vic2pic= 'images/'.$vic2usn.'.jpg';
?>
<center><?php GetMainLogo();?><br><br>
<DIV STYLE="font-family: 'Lucida Sans';"> 
<table rules=cols height=20 bgcolor=#FFFF33 border=1><tr><td align=center>
															<b><font color=red>[NEW]</font></b> Please, submit your feedback from the About page.</td></tr></table>
<br><table rules=cols width="625" bgcolor=wheat>
  <tr>
    <th width="300" height="30"><u>Victim 1</u></th>
    <th width="300"><u>Victim 2</u></th>
  </tr>
  <tr>
    <td height="300"><center> <?php
									if (file_exists($vic1pic)){
										echo ('<img src="images/'.$vic1usn.'.jpg" />');
									}else {
										echo '<img src="images/noimg.jpg" />';
									}
								?>		
								</center> </td>
    <td><center>			<?php
									if (file_exists($vic2pic)){
										echo ('<img src="images/'.$vic2usn.'.jpg" />');
									}else{
										echo '<img src="images/noimg.jpg" />';
									}
								?>	
								</center></td>
  </tr>
  <tr>  
    <td height="20"><center><?php echo $_SESSION['SESS_NAME1'];?></center></td>
				<td><center><?php echo $_SESSION['SESS_NAME2'];?></center></td>
  </tr>
  <tr>
    <td height="20"><center><?php echo GetYear($_SESSION['SESS_USN1']);?></center></td>
				<td><center><?php echo GetYear($_SESSION['SESS_USN2']);?></center></td>
  </tr>
  <tr>
  <td height="25"><center><?php	echo GetBranch($_SESSION['SESS_USN1']);?></center></td>
			  <td><center><?php echo GetBranch($_SESSION['SESS_USN2']);?></center></td>
</tr>
  <tr>
  <td height="20"><center> <form action="hit.php" method="POST">
							 <input name=wonid type=Hidden id=wonid value="<?php echo $id1;?>" />
							 <input name=lostid type=Hidden id=lostid value="<?php echo $id2;?>" />
                             <input type="submit" name="victim1" id="victim1" value="Vote" /></center>
                             </form></td>
    <td><center><form action="hit.php" method="POST">
							<input name=wonid type=Hidden id=wonid value="<?php echo $id2;?>" />
							<input name=lostid type=Hidden id=lostid value="<?php echo $id1;?>" />
							<input type="submit" name="victim2" id="victim2" value="Vote" /></center></td></tr>
							</form>
  <tr> <form action="index.php" method="post">
				<td colspan=2 height=40><center><input type="submit" value="Skip" /></</center></td></tr>
</table>
</div>
<br>
<br>
<table bgcolor=#8FC1F3 width=760px;>
 <tr><td width=760 align=center><font size=3>
  				<span style="font-family:'Lucida Sans Typewriter Regular';"><br />
				<a href="ranking.php"> View Ranking</a> | <a href="index.php">Home</a> | <a href=faq.php >FAQ</a> | <a href=about.php >About</a><br />
							<font size=2>	Total victims :<?php echo $totalvictims;?><br>
											Total Victims with Pics :<?php GetPhotoUploadcount(); ?><br>
									Designed by humans like you.<br />
									garbage69,skinreaper<br />
									&copy;2014. All rights reserved.<br />
							This website is made purely for entertainment purpose.</font>
			</span></font>
				
		</td>
		</tr>
</t