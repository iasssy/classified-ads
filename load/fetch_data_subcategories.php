<?php
session_start();
if(isset($_POST['category'])){
	ini_set('display_errors', '0');

$db = parse_ini_file("../../config_file_agahi.ini");
$host = $db['host'];
$user = $db['user'];
$pass = $db['pass'];
$name = $db['name'];

$link = mysqli_connect($host, $user, $pass, $name);
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$category=$_POST['category'];

mysqli_set_charset($link, "utf8");
 $sql = "SELECT * FROM category WHERE name LIKE '$category'";
			 if ($result = mysqli_query($link, $sql)) {
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_array($result)) {
						$number=$row['number'];
			 }}}


mysqli_set_charset($link, "utf8");
		 $sql_sub = "SELECT * FROM category WHERE parent LIKE '$number' ORDER BY id ASC";
			 if ($result_sub = mysqli_query($link, $sql_sub)) {
				if (mysqli_num_rows($result_sub) > 0) {
					echo '<option value="" style="display:none">لطفا یکی از موارد زیر را انتخاب کنید.</option>';						
					while ($row_sub = mysqli_fetch_array($result_sub)) {
						echo '<option value="'.$row_sub['name'].'">'.$row_sub['name'].'</option>';
						
					}		
					
			 }}
}
mysqli_close($link);			 
?>