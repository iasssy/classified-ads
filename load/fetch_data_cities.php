<?php
session_start();
if(isset($_POST['province'])){
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
$province=$_POST['province'];
//echo 'province = '.$province;
mysqli_set_charset($link, "utf8");
 $sql = "SELECT * FROM provinces WHERE province_name='$province'";
			 if ($result = mysqli_query($link, $sql)) {
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_array($result)) {
						$province_number=$row['province_id'];
						//echo 'province_number = '.$province_number;
			 }}}


		 mysqli_set_charset($link, "utf8");
		 $sql_sub = "SELECT * FROM cities WHERE province_id='$province_number' ORDER BY city_id ASC";
			 if ($result_sub = mysqli_query($link, $sql_sub)) {
				if (mysqli_num_rows($result_sub) > 0) {
					echo '<option value="" style="display:none">لطفا یکی از موارد زیر را انتخاب کنید.</option>';						
					while ($row_sub = mysqli_fetch_array($result_sub)) {
						echo '<option value="'.$row_sub['city_name'].'">'.$row_sub['city_name'].'</option>';
						
					}		
					
			 }}
}	
mysqli_close($link);
		 
?>