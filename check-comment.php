<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
?> 
<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Check and submit</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
     <link rel="shortcut icon" type="image/x-icon" href="images/"/>   
	<link rel="stylesheet" media="only screen and (min-width:992px)" href="css/styles.css?<?php echo time(); ?>">
	<link rel="stylesheet" media="only screen and (min-width:481px) and (max-width:991px)" href="css/styles-tablet.css?<?php echo time(); ?>">
	<link rel="stylesheet" media="only screen and (max-width: 480px)" href="css/styles-mobile.css?<?php echo time(); ?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="https://cdn.rawgit.com/rastikerdar/vazir-font/v16.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
	
</head>
<body>
<div style="font-size:16px; line-height:180%;padding:20px;text-align:center;padding-top:50px;">
 <?php
//ini_set('display_errors','0');
$db = parse_ini_file("../config_file_agahi.ini");
$host = $db['host'];
$user = $db['user'];
$pass = $db['pass'];
$name = $db['name'];

$link = mysqli_connect($host, $user, $pass, $name);

$comment=$_GET["comment"];
$article=$_GET["article"];

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
mysqli_set_charset($link, "utf8");
$sql = "SELECT * FROM blog where blog_id=$article";
if ($result = mysqli_query($link, $sql)) {
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_array($result)) {
   echo '<p><span style="font-size:25px;font-weight:bold;">'.$row['blog_topic'].'</span></p>
   <img src="images/blog/'.$row['image_teaser'].'" height="60"/></img>';	
}}}
echo '<br/>';
echo '<br/>';

mysqli_set_charset($link, "utf8");
$sql = "SELECT * FROM comments WHERE comment_id='$comment'";
if ($result = mysqli_query($link, $sql)) {
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_array($result)) {
   echo '<p>comment id: '.$comment.'</p>';
   echo '<p><span style="font-size:25px;font-weight:bold;">'.$row['comment'].'</span></p>';	
}}}
mysqli_close($link);

?>
<br/>
<br/>
<div class="checked-post">
	<form method="post">
		<div class="container-fluid text-center">
		<br/>
		<input type="submit" name="btn_submit" id="btn_accept" class="btn btn-info submit-btn" value="Accept"/>
		<br/>
		<br/>
		<br/>
		<!--<input type="submit" name="btn_refuse" id="btn_refuse" class="btn btn-default" value="Refuse"/>-->
		</div>
	</form>
</div>

<?php
						//     Accept!!
if(isset($_POST['btn_submit'])){
//ini_set('display_errors','0');

$db = parse_ini_file("../config_file_agahi.ini");
$host = $db['host'];
$user = $db['user'];
$pass = $db['pass'];
$name = $db['name'];

$link = mysqli_connect($host, $user, $pass, $name);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
mysqli_set_charset($link, "utf8");
$sql = "UPDATE comments SET status=1 WHERE comment_id='$comment'";
if (mysqli_query($link, $sql)) {   
	echo "<script>alert('Successfully updated');</script>";

} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 

mysqli_close($link);
}

?>


</div>

</body>
</html>
