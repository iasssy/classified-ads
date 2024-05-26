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
<div class="show-center-select">
 <?php
//ini_set('display_errors','0');
$db = parse_ini_file("../config_file_agahi.ini");
$host = $db['host'];
$user = $db['user'];
$pass = $db['pass'];
$name = $db['name'];

$link = mysqli_connect($host, $user, $pass, $name);

$select_id=$_GET["id"];
$ad_id=$select_id;

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
mysqli_set_charset($link, "utf8");
$sql = "SELECT * FROM ads where ad_id=$select_id";
if ($result = mysqli_query($link, $sql)) {
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_array($result)) {
    $relevant_user_id=$row['user_id'];
	$image_json=$row['image'];		
	$jsonOutput = json_decode($image_json, true);
	$json_count=count($jsonOutput);
	$image_error=$row['image_error'];
	$title=$row['title'];
	$table=$row['category_tree'];
	$description=$row['description'];
	$province=$row['province'];
	$email=$row['email'];
	$phone=$row['phone'];
	$website=$row['website'];
	$linkedin=$row['linkedin'];
	$date=$row['date'];
}
  } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$category_number=substr($table,0,1);
$sql = "SELECT * FROM category WHERE parent IS NULL AND number LIKE '%$category_number%'";
if ($result = mysqli_query($link, $sql)) {
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_array($result)) {
	$category_name=$row['name'];
}}}
mysqli_close($link);
?>

		<div class="select-up">	
		Advertisement id:<?php echo $select_id ?>
		<br/>
		<br/>
		<div class="item-image-big">
				<?php 
				if ($image_json=="" || $image_json=="[]"){
					echo '<img src="images/icons/grow-9.svg" width="255"
					alt="'.$title.'" title="'.$title.'"/>';
				} else {
					echo '<img id="big-image" 
					src="users/'.$relevant_user_id.'/'.$ad_id.'/'.$jsonOutput[0].'" 
					data-darkbox="users/'.$relevant_user_id.'/'.$ad_id.'/'.$jsonOutput[0].'"
					data-darkbox-group="one"
					data-darkbox-description="'.$title.'"
					alt="'.$title.'" title="'.$title.'" width="360"/>';
				}
				?>
		</div>
		<div class="item-image-small">
			<?php
				for($i=0;$i<$json_count;$i++){
				echo '<div class="small-pics-div" id="div-image'.$i.'">
				<img class="small-pics" 
				data-darkbox="users/'.$relevant_user_id.'/'.$ad_id.'/'.$jsonOutput[$i].'"
				data-darkbox-group="one"
				data-darkbox-description="'.$title.'"
				id="image'.$i.'"src="users/'.$relevant_user_id.'/'.$ad_id.'/'.$jsonOutput[$i].'" alt=""
				width="62">
				</div>';
				}

						?>
<script>
$('.small-pics')
   .click(
    function(){    	 
	 ItemID=$(this).attr("id");
	 //alert('id ='+$(this).attr("id"));	  
	 var word='div-image';	
	<!--taskThis.style.display = "none"; -->
	var stringX = ItemID.substr(ItemID.indexOf(word)+ word.length);
	// alert('stringX = '+stringX);
	 var file_url=$('#image'+stringX).attr('src');
	 //alert(file_url);
	var relevant_user_id='<?php echo $relevant_user_id?>';
	var ad_id='<?php echo $ad_id?>';
	var table='<?php echo $table?>';
	var path='users/'+relevant_user_id+'/'+table+'/'+'/'+ad_id+'/'; 
	//alert(path);
	var stringY = file_url.substr(file_url.indexOf(path)+ path.length);
	//alert(stringY);
	$('#big-image').attr("src",'users/'+relevant_user_id+'/'+table+'/'+ad_id+'/'+stringY);	 
    }
  )
  .hover(
    function(){
      $(this).css('border', '1px solid silver');
    },
    function(){
      $(this).css('border', 'none');
    }
  );
</script>						
		</div>	
	</div>
	<br/>
	<div class="select-down">
				<div class="show-title-container">
					<div class="show-title"><?php echo $title?></div>
					<div class="show-category">
						<img src="images/icons/categories-icon.svg" width="20"/>
						<?php echo $category_name?>
					<br/>
<?php	
	echo '<img 
	src="images/icons/location.svg" width="20"/>&nbsp;'.$province.'&nbsp;'.$row['city'].'&nbsp;'.$row['region'].'<br/>';
	echo '<img src="images/icons/email.svg" width="20"/>&nbsp;'.$email.'<br/>';
	echo '<img src="images/icons/phone.svg" width="20"/>&nbsp;'.$phone.'<br/>';
	echo '<img src="images/icons/website.svg" width="20"/>&nbsp;'.$website.'<br/>';	
	if ($row['linkedin']!=''){
	echo '<img src="images/icons/linkedin.svg" width="20"/>&nbsp;'.$linkedin.'<br/>';
	}
?>	
					</div>
				</div>
				<div class="show-description"><?php echo $description?></div>
				<div class="show-description"><?php echo $image_error?></div>
	</div>



<div class="checked-post">
	<form method="post">
		<div class="container-fluid text-center">
		
		<br/>
		<input type="submit" name="btn_submit" id="btn_accept" class="btn btn-info submit-btn" value="Accept"/>
		<br/>
		<br/>
		<br/>
		<!--<input type="submit" name="btn_refuse" id="btn_refuse" value="Refuse"/>-->
		</div>
	</form>
</div>
<br/>

<?php							//     Accept!!
if(isset($_POST['btn_submit'])){
$db = parse_ini_file("../config_file_agahi.ini");
$host = $db['host'];
$user = $db['user'];
$pass = $db['pass'];
$name = $db['name'];$link = mysqli_connect($host, $user, $pass, $name);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
mysqli_set_charset($link, "utf8");
$sql = "UPDATE ads SET status=1 WHERE ad_id='$select_id'";
if (mysqli_query($link, $sql)) {   
	echo "<script>alert('Successfully updated');</script>";
	$sql_user = "SELECT * FROM users WHERE id=$relevant_user_id";
	if ($result_user = mysqli_query($link, $sql_user)) { 
	 if (mysqli_num_rows($result_user ) > 0) {
		 while ($row_user = mysqli_fetch_array($result_user)) {
			 $user_email=$row_user['email'];
			 //ini_set('display_errors', '0');

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
	 }}	} 
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 

mysqli_close($link);
}
?>
</div>
</body>
</html>
