<?php
session_start();
if(isset($_POST['city'])){
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
$city=$_POST['city'];
//echo 'province = '.$province;
mysqli_set_charset($link, "utf8");
$sql = "SELECT * FROM cities WHERE city_name='$city'";
	if ($result = mysqli_query($link, $sql)) {
	if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result)) {
						$city_number=$row['city_id'];
						//echo 'city_number = '.$city_number;
			 }}}


		 mysqli_set_charset($link, "utf8");
		 $sql_sub = "SELECT * FROM regions WHERE city_id='$city_number' ORDER BY region_id ASC";
			 if ($result_sub = mysqli_query($link, $sql_sub)) {
				if (mysqli_num_rows($result_sub) > 0) {
					echo '<option value="" style="display:none">لطفا یکی از موارد زیر را انتخاب کنید.</option>';						
					while ($row_sub = mysqli_fetch_array($result_sub)) {
						echo '<option value="'.$row_sub['region_name'].'">'.$row_sub['region_name'].'</option>';
						
					}		
					
			 }}
}
mysqli_close($link);
			 
?>