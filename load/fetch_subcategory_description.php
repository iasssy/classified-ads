<?php
session_start();
if(isset($_POST['subcategory'])){
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
$subcategory=$_POST['subcategory'];

mysqli_set_charset($link, "utf8");
 $sql = "SELECT * FROM category WHERE name LIKE '$subcategory'";
			 if ($result = mysqli_query($link, $sql)) {
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_array($result)) {
						$description=$row['description'];
						echo $description;
			 }}}


}		
mysqli_close($link);	 
?>