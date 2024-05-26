<?php 
session_start();
require_once("../../dbcontroller_agahi.php");
$db_handle = new DBController();


if(!empty($_POST["ID"])) {
	$province_id=$_POST["ID"];
	mysqli_set_charset($link, "utf8");
	$sql_city = "SELECT * FROM cities WHERE province_id=$province_id ORDER BY city_id ASC";
	$result = $db_handle->runQuery($sql_city);
	/*
foreach($result as $province) {

	echo '
<div class="shahr" id="shahr'.$province_id.'_'.$province['city_id'].'">'.$province['city_name'].'</div><br/>';
				
	}*/
		$data = array();
		foreach($result as $province) {
		$data[] = array('province_id'=>$province_id,'city_id'=>$province['city_id'],'city_name'=>$province['city_name']);

		}
	print json_encode($data, JSON_UNESCAPED_UNICODE);		
}
	
?>