<?php	
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
date_default_timezone_set('Asia/Tehran');
$user_id=$_SESSION['user_id'];
if (!file_exists("users/")) {
					mkdir("users", 0755);
				}	
if (!file_exists("users/".$user_id)) {
					mkdir("users/".$user_id, 0755);
				}	
if (!file_exists("users/".$user_id."/temp")) {
					mkdir("users/".$user_id."/temp", 0755);
				}	
ini_set('display_errors', '0');
$db = parse_ini_file("../config_file_agahi.ini");
$host = $db['host'];
$user = $db['user'];
$pass = $db['pass'];
$name = $db['name'];
$link = mysqli_connect($host, $user, $pass, $name);
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$title = $_POST['title'];
$description = $_POST['description'];
$category = $_POST['category'];
$province = $_POST['province'];
/*$city = $_POST['city'];
$region = $_POST['region'];*/
$email = $_POST['email'];
$phone = $_POST['phone'];
$image_error = $_POST['image_error'];
//echo 'image_error = '.$image_error;
if (isset($_POST['website'])){
	$website = $_POST['website'];
} else {
	$website ='';
}
if (isset($_POST['linkedin'])){
	$linkedin = $_POST['linkedin'];
} else {
	$linkedin ='';
}
//echo 'category = '.$category;
//echo '<br/>';
//$sub_hidden= $_POST['sub_hidden'];
//echo $sub_hidden;
$subcategory = $_POST['subcategory'];
//echo 'category = '.$subcategory;
//echo '<br/>';
$dir = 'users/'.$user_id.'/temp/';
$a = scandir($dir);
$count = count($a);
//print_r($a);
//echo '<br/>';
$key_desktop = array_search('desktop.ini', $a);
//echo $key_desktop;
//echo '<br/>';
unset($a[0]);
unset($a[1]);
unset($a[$key_desktop]);
//echo 'after:<br/>';
//print_r($a);
$array_uploads=array_values($a);
$count_new = count($array_uploads);
//echo 'count_new ='.$count_new;
//echo '<br/>';
//print_r($array_uploads);
//echo count($array_uploads);
//echo '<br/>';
$json=json_encode($array_uploads);
//echo $json;
//echo '<br/>';
mysqli_set_charset($link, "utf8");
$sql_subcat = "SELECT * FROM category WHERE name LIKE '$subcategory'";
if ($result_subcat = mysqli_query($link, $sql_subcat)) {
	if (mysqli_num_rows($result_subcat)>0) {
          while ($row_subcat = mysqli_fetch_array($result_subcat)) { 
			/*echo 'name='.$row_subcat['name'];
			echo '<br/>';
			echo 'number='.$row_subcat['number'];
			echo '<br/>';*/
			$table=$row_subcat['number'];
}}}		  
mysqli_set_charset($link, "utf8");	
$sql2 = "INSERT INTO ads (ad_id, user_id, status, category_tree, title, description, image, image_error,
 province, email, phone, website, linkedin, date) 
VALUES ('', '$user_id', '1', '$table', '$title', '$description', '$json', '$image_error',
'$province', '$email', '$phone', '$website', '$linkedin', now())";
if (mysqli_query($link, $sql2)) {  									     
$inserted_id=mysqli_insert_id($link);
//echo 'inserted_id = '.$inserted_id;
//echo '<br/>';
mkdir('users/'.$user_id.'/'.$inserted_id, 0755);

for ($i=0;$i<$count_new;$i++){
	try {
		copy('users/'.$user_id.'/temp/'.$array_uploads[$i],'users/'.$user_id.'/'.$inserted_id.'/'.$array_uploads[$i]);
	} catch (FileException $e) {
        error_log($e->getMessage());
    }
	try {
		unlink('users/'.$user_id.'/temp/'.$array_uploads[$i]);
	} catch (FileException $e) {
        error_log($e->getMessage());
    }		
}
	$subject = 'id = '.$inserted_id;
    $message = '<a href="https://bazarjibi.com/select.php?id='.$inserted_id.'">New Entry</a>';
	//Load composer's autoloader
	require 'phpmailer/vendor/autoload.php';

	$mail = new PHPMailer(true);         
	try {
    //Server settings
    
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = '	mail.bazarjibi.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'info@bazarjibi.com';                 // SMTP username
    $mail->Password = 'HzbfXVlvEL65';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
	$mail->CharSet = 'UTF-8';
	
    //Recipients
    $mail->setFrom('info@bazarjibi.com', 'bazarjibi');
    $mail->addAddress('info@bazarjibi.com');     // Add a recipient
    $mail->addAddress('moradi.amin1980@gmail.com');     // Add a recipient
	
    $mail->addReplyTo('info@bazarjibi.com', 'Reply');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = 'posted';

    $mail->send();
    //echo '<script>alert("Message has been sent")</script>'; 
	echo "<script> window.location.assign('index.php')</script>";		
} catch (Exception $e) {
   // echo 'Message could not be sent.';
    echo '<script>alert("Mailer Error: "' . $mail->ErrorInfo.')</script>';
} 

$sql_user = "SELECT * FROM users WHERE id=$user_id";
if ($result_user = mysqli_query($link, $sql_user)) { 
if (mysqli_num_rows($result_user ) > 0) {
while ($row_user = mysqli_fetch_array($result_user)) {
	$user_email=$row_user['email'];
}}}

$subject = 'نمایش آگهی';
$message = '
<html lang="fa-IR" dir="rtl">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link href="https://cdn.rawgit.com/rastikerdar/vazir-font/v16.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1 style="text-align: right;"><a style="text-decoration: none;" href="https://bazarjibi.com">بازار جیبی</a> &nbsp;<img src="https://bazarjibi.com/images/logo-bazar-jibi.svg" alt="" width="30" /></h1>
<div class="container" style="direction: rtl;"><hr />
<h1 class="header-title" style="font-size: 18px; font-weight: bold;">کاربر گرامی،</h1>
<p class="text" style="font-size: 16px;"><a style="font-size: 17px; color: #007af4;" title="آگهی شما" href="https://bazarjibi.com/show.php?id='.$select_id.'">آگهی شما</a>&nbsp;بر روی سایت&nbsp;بازار جیبی&nbsp; قرار گرفت.</p>
<p class="text" style="font-size: 16px;">از اینکه از سایت ما بازدید کردید متشکریم و برای شما آرزوی موفقیت در کارهایتان را داریم.</p>
<hr />
<p style="font-size: 13px;"><span style="color: #333333;">این ایمیل برای شما به صورت اتوماتیک فرستاده شده است و شما آگهی خود را بر روی سایت&nbsp;</span> <span style="color: #3366ff; font-size: 17px;"> <a style="color: #007af4;" title="bazarjibi" href="https://bazarjibi.com">بازار جیبی</a></span> &nbsp;قرار دادید.&nbsp;</p>
<p style="font-size: 13px;">&nbsp;</p>
<p style="font-size: 13px;">اگر این ایمیل به اشتباه برای شما فرستاده شده است آنرا&nbsp;<span style="color: #3366ff; font-size: 17px;"><a style="color: #007af4;" href="https://bazarjibi.com/contact-us.php">اینجا</a></span> &nbsp;گزارش دهید.</p>
<p style="font-size: 13px;">&nbsp;</p>
<p style="font-size: 13px;">&nbsp;</p>
</div>
</body>
</html>';
//Load composer's autoloader
require 'phpmailer/vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
       
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.bazarjibi.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'info@bazarjibi.com';                 // SMTP username
    $mail->Password = 'HzbfXVlvEL65';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
	$mail->CharSet = 'UTF-8';
	
    //Recipients
    $mail->setFrom('info@bazarjibi.com', 'bazarjibi');
    $mail->addAddress('info@bazarjibi.com');     // Add a recipient
	$mail->addAddress($user_email); 
	
    $mail->addReplyTo('info@bazarjibi.com', 'Reply');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = 'کاربر گرامی، آگهی شما بر روی سایت بازار جیبی قرار گرفت. از اینکه از سایت ما بازدید کردید متشکریم و برای شما آرزوی موفقیت در کارهایتان را داریم.
';

    $mail->send();
    echo '<script>alert("Message has been sent")</script>'; 
} catch (Exception $e) {
   // echo 'Message could not be sent.';
    echo '<script>alert("Mailer Error: "' . $mail->ErrorInfo.')</script>';
} 		
			} else {
				echo "ERROR: Could not able to execute INSERT INTO" . mysqli_error($link);
			} 			
mysqli_close($link);    
?>