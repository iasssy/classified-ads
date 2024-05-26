<?php
//ini_set('display_errors', '0');
error_reporting(E_ALL | E_STRICT);
session_start();
$user_id=$_SESSION['user_id'];

if (!file_exists("../users/")) {
					mkdir("../users", 0755);
				}	
if (!file_exists("../users/".$user_id)) {
					mkdir("../users/".$user_id, 0755);
				}	
if (!file_exists("../users/".$user_id."/temp")) {
					mkdir("../users/".$user_id."/temp", 0755);
				}
$error_string='';
$target_dir = '../users/'.$user_id.'/temp/';
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if ($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" 
&& $imageFileType != "jpeg" && $imageFileType != "gif"){
if ($_FILES["file"]["error"] > 0)
{
//echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
$error_string=$error_string. ' ' .$_FILES["file"]["error"] . "<br>";
}
else
{
echo "Upload: " . $_FILES["file"]["name"] . "<br>";
echo "Type: " . $_FILES["file"]["type"] . "<br>";
echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

if (file_exists("images/" . $_FILES["file"]["name"]))
{
//echo $_FILES["file"]["name"] . " already exists. ";
$error_string=$_FILES["file"]["name"] . " already exists. ";
}
if($_FILES['file']['size'] >  5000000 ){  //5mb

//echo 'File over 5MB';
$error_string='File over 5MB';
} else
{
move_uploaded_file($_FILES["file"]["tmp_name"],
"images/" . $_FILES["file"]["name"]);
echo "Stored in: " . "images/" . $_FILES["file"]["name"];
}
}
}
else
{
//echo "Invalid file";
$error_string="Invalid file";
}
$return['error_string'] =$error_string;
	echo json_encode($return);
?> 
