 <?php
require_once '../Core.fnc.php';
//connect to database
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");

$qry="UPDATE `table 1` SET vwon = 0";
$result=mysql_query($qry);
if($result) {
	echo "All voteswon reset to 0";
} else {
	echo "Something went wrong, I think query failed";
}
echo "<br>";
$qry="UPDATE `table 1` SET vlost = 0";
$result=mysql_query($qry);
if($result) {
	echo "All votelost reset to 0";
} else {
	echo "Something went wrong, I think query failed";
}
?>