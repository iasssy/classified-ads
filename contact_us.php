<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
?> 

<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
<meta charset="UTF-8"/>
<title>تماس با ما ـ بازارجیبی ـ نیازمندیهای رایگان</title>
<meta name="keywords" content="" /> 
<meta name="description" content="تماس با ما ـ بازارجیبی ـ نیازمندیهای رایگان"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link rel="shortcut icon" type="image/x-icon" href="images/logo-small-blue.svg.png"/>   
<link rel="stylesheet" media="only screen and (min-width:992px)" href="css/styles.css?<?php echo time(); ?>">
<link rel="stylesheet" media="only screen and (min-width:481px) and (max-width:991px)" href="css/styles-tablet.css?<?php echo time(); ?>">
<link rel="stylesheet" media="only screen and (max-width: 480px)" href="css/styles-mobile.css?<?php echo time(); ?>">
<link href="https://cdn.rawgit.com/rastikerdar/vazir-font/v16.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
	
<script> 
$(function(){
	$('.header').load('load/header.php', function() {
  });
	$(".footer").load("load/footer.php"); 
});
</script> 
</head>

<body>
<?php include_once("analyticstracking.php") ?>
<div class="header">
</div>


<div class="contact-us" >

<div class="post-comment">

<form method="post" accept-charset="utf-8">
<br/>
<textarea class="contact-message" id="contact-message" name="contact_message" placeholder="لطفا پیغام خود را بنویسید..."></textarea>
<br/><br/>
<div class="contact-name-div">
	<div class="contact-name-label">نام:</div>
	<div class="contact-name-content">
		<input class="contact-name" type="text" id="contact-name" name="contact_name"/>
	</div>	
</div>
<br/>
<div class="contact-email-submit-div">
	<div class="contact-email-label">ایمیل:</div>	
	<div class="contact-email-content">
		<input class="contact-email"  type="text" id="contact-email" name="contact_email"/>
	</div>	
	<div class="contact-submit-div">
		<input id="contact_submit" type="submit" name="contact_submit" value="ارسال"/>
	</div>	
</div>
<br/>
</form>
<?php 
if(isset($_POST['contact_submit'])){
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$db = parse_ini_file("../config_file_agahi.ini");
$host = $db['host'];
$user = $db['user'];
$pass = $db['pass'];
$name = $db['name'];
$link = mysqli_connect($host, $user, $pass, $name);
$contact_message = $_POST['contact_message'];
$contact_name = $_POST['contact_name'];
$contact_email = $_POST['contact_email'];

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
mysqli_set_charset($link, "utf8");
$sql = "INSERT INTO contact_us (contact_us_id, contact_message, contact_name, contact_email, date) 
VALUES ('', '$contact_message',  '$contact_name', '$contact_email', now())";
if (mysqli_query($link, $sql)) {  
    $inserted_id=mysqli_insert_id($link); 
    $subject = 'New contact us message';
    $message = $contact_message;

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
    $mail->setFrom($contact_email, $contact_name);
    $mail->addAddress('info@bazarjibi.com', 'bazarjibi');     // Add a recipient
  
    $mail->addReplyTo($contact_email, $contact_name);
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = $message;

    $mail->send();
    //echo '<script>alert("Message has been sent")</script>';
	echo '<div class="contact-success">پیغام شما با موفقیت ارسال شد.</div>';
} catch (Exception $e) {
   // echo 'Message could not be sent.';
    echo '<script>alert("Mailer Error: "' . $mail->ErrorInfo.')</script>';
}
	
    
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
}
?>	

</div>
<br/>
<div class="all-comments">

</div>



</div>
<br/>

<div class="footer">  
</div>
 
 
<script>
    document.getElementById('go_btn').onclick = function() {       
        var position_go = document.getElementById('position').value;
        var province_go = document.getElementById('province').value;
        document.getElementById('postForm').action = 'advs.php?position='+position_go+'&province='+province_go+'&page='+'1';
    };
</script>


<script>
$('.user-menu-div') 
 .click( 
   function(){  
	 $('#user-menu').toggle().toggleClass('show');	
	e.stopPropagation();	
 }); 
	
	 $('.user-menu-div').click(function (e) {
    $('#user-menu').toggle().toggleClass('show');
});
   
  $(document).click(function (e) {    <!--     CHECK!!!!!!-->
    if (!$(e.target).parents().andSelf().is("#user-menu")) {
        $("#user-menu").removeClass('show');
    }
});


$("#user-menu").click(function (e) {
    e.stopPropagation();
});

</script>

</body>
</html>