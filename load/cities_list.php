<?php
session_start();
?>
<div class="slider-frame-wrapper" id="slider-frame-wrapper-city">    
             <ul class="slider-frame">
<?php
ini_set('display_errors', '0');
$db = parse_ini_file("../../config_file_agahi.ini");
$host = $db['host'];
$user = $db['user'];
$pass = $db['pass'];
$name = $db['name'];
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_set_charset($link, "utf8");
$province_id=$_POST['province'];
//echo $province_id;
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM cities WHERE province_id='$province_id' ORDER BY city_id ASC";
if ($result = mysqli_query($link, $sql)) {
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result)) {
		echo '<li class="slider-city-panel" id="slider-city'.$row['city_id'].'">
				<div class="image-div">
					<img class="item-image" src="images/cities/'.$row['city_image'].'" 
						alt=" درج آگهی رایگان کانادا '.$row['city_name'].'  | آگهی های رایگان '.$row['city_name'].' | خرید و فروش '.$row['city_name'].'"
						title="آگهی های رایگان '.$row['city_name'].' | خرید و فروش '.$row['city_name'].'"							
					width="90"/>
				</div>
				<div class="item-name-div" id="item-name-div-city'.$row['city_id'].'">'.$row['city_name'].'</div>
			</li>'; 
			}}}
mysqli_close($link);
?>		
				            						                           
            </ul><!-- .slider-window-frame -->
        </div><!-- .slider-window-frame-wrapper -->
<script>
$(document).ready(function() {
    $('#slider-frame-wrapper-city').hScroll(60); // You can pass (optionally) scrolling amount
});
</script>