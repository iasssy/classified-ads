<?php
session_start();
?>
<div class="slider-frame-wrapper" id="slider-frame-wrapper-region">    
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
$city_id=$_POST['city'];
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
mysqli_set_charset($link, "utf8");
$sql = "SELECT * FROM regions WHERE city_id='$city_id' ORDER BY region_id ASC";
if ($result = mysqli_query($link, $sql)) {
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result)) {
		echo '<li class="slider-region-panel" id="slider-region'.$row['region_id'].'">
				<div class="image-div">
					<img class="item-image" src="images/regions/'.$row['region_image'].'" width="90"/>
				</div>
				<div class="item-name-div" id="item-name-div-region'.$row['region_id'].'">'.$row['region_name'].'</div>
			</li>'; 
			}}}
mysqli_close($link);
?>		
				            						                           
            </ul><!-- .slider-window-frame -->
        </div><!-- .slider-window-frame-wrapper -->
<script>
$(document).ready(function() {
    $('#slider-frame-wrapper-region').hScroll(60); // You can pass (optionally) scrolling amount
});
</script>