<?php 
/* All the core functions and configurations are listed here.
Author:garbage69
==========================================
*/
//Database connections
$mysql_hostname = "";
$mysql_user = "";
$mysql_password = "";
$mysql_database = "";
$prefix = "";
//Total Victims(Users)
$totalvictims=944;

//Studying year configurations
$year1st=13;
$year2nd=12;
$year3rd=11;
$year4th=10;

//Function to display the logo
function GetMainLogo(){
	echo '<a href=index.php><img src="images/logo.jpg"/ width=844 height=192 alt=RankThem></a>';
}

//Function to format usn
function GetProperUSN($usn){
	$formattedusn = preg_replace('/\s+/', '', $usn);
	$formattedusn = strtolower($formattedusn);
	return $formattedusn;
}
//Functions to fetch branchcode from usn eg; ec,cs,me
function GetBranch($usn){
	$formattedusn = preg_replace('/\s+/', '', $usn);
	$properusn = strtolower($formattedusn);
	$branch = ($properusn[5].$properusn[6]);
	if($branch==cs) {
        $branch="C.S.E.";
    }elseif ($branch==ec){
        $branch="E.C.E.";
	}elseif ($branch==me) {
        $branch="Mech Eng.";
    }elseif ($branch==cv){
        $branch="Civil Eng.";
    }else{
		$branch="No Branch set.";
	}
	return $branch;
}

//function to get year from the usn
function GetYear($usn){
	//to use the global variables
	global $year1st,$year2nd,$year3rd,$year4th;
	$formattedusn = preg_replace('/\s+/', '', $usn);
	$properusn = strtolower($formattedusn);
	$year = $properusn[3].$properusn[4];
	if($properusn[7] == 4){
		$year=$year-1;
	}
	if ($year == $year1st){
       return "1st Year.";
    }elseif($year == $year2nd){
        return "2nd Year.";
    }elseif($year == $year3rd){
        return "3rd Year.";
	}elseif($year == $year4th){
		return "4th Year.";
	}else return "No year set";
	
}
//function to count number of images uploaded
function GetPhotoUploadCount(){
	$directory = "./images/";
	$filecount = 0;
	$files = glob($directory . "4mw*.jpg");
	if ($files){
 		$filecount = count($files);
	}
	echo $filecount;
}
?>