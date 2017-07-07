<?php
require_once './Core.fnc.php';
header("location: index.php");
session_start();
$wonid=$_POST['wonid'];
$lostid=$_POST['lostid'];
$_SESSION['curid']=$wonid;
if($_POST['wonid']==NULL){
	goto end;
}
 //connect to database
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");

if(($_SESSION['curid']!=$_SESSION['previd']) && ($_SESSION['curid']!=$_SESSION['previd1']) && ($_SESSION['curid']!=$_SESSION['previd2']) && ($_SESSION['curid']!=$_SESSION['previd3']) && ($_SESSION['curid']!=$_SESSION['previd4']) && ($_SESSION['curid']!=$_SESSION['previd5']) && ($_SESSION['curid']!=$_SESSION['previd6']) && ($_SESSION['curid']!=$_SESSION['previd7']) && ($_SESSION['curid']!=$_SESSION['previd8']) && ($_SESSION['curid']!=$_SESSION['previd9']) && ($_SESSION['curid']!=$_SESSION['previd10'])){
//Create query to update votes won
    $qry="SELECT * FROM `table 1` WHERE id='$wonid'";
	$res=mysql_query($qry);
	$victim = mysql_fetch_assoc($res);
	$vwon= $victim['vwon'];
	$vwon=$vwon+1;
	$query="UPDATE `table 1` SET vwon='".$vwon."' WHERE id='".$wonid."'";
	if(!mysql_query($query,$bd)){
		die ("An unexpected error occured while saving the record, Please try again!");
	}
//Create query to update votes lost
    $qry="SELECT * FROM `table 1` WHERE id='$lostid'";
	$res=mysql_query($qry);
	$victim = mysql_fetch_assoc($res);
	$vlost= $victim['vlost'];
	$vlost=$vlost+1;
	$query="UPDATE `table 1` SET vlost='".$vlost."' WHERE id='".$lostid."'";
	if(!mysql_query($query,$bd)){
		die ("An unexpected error occured while saving the record, Please try again!");
	}
}
$_SESSION['previd10']=$_SESSION['previd9'];
$_SESSION['previd8']=$_SESSION['previd7'];
$_SESSION['previd7']=$_SESSION['previd6'];
$_SESSION['previd6']=$_SESSION['previd5'];
$_SESSION['previd5']=$_SESSION['previd4'];
$_SESSION['previd4']=$_SESSION['previd3'];
$_SESSION['previd3']=$_SESSION['previd2'];
$_SESSION['previd2']=$_SESSION['previd1'];
$_SESSION['previd1']=$_SESSION['previd'];	
$_SESSION['previd']=$_SESSION['curid'];				

session_distroy();
end:
?>
