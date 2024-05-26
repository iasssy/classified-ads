<?php    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
date_default_timezone_set('Asia/Tehran');
session_start();
session_unset(); 
session_destroy(); 
?> 
<!DOCTYPE HTML>
<html lang="fa-IR" dir="rtl">
<head>    
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />  
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>	
	<title>ثبت نام کاربر | بازار جیبی</title>
	<meta name="title" content="ثبت نام کاربر | بازار جیبی" /> 
    <meta name="keywords" content="" /> 
	<meta name="description" content=""/>     
    <link rel="shortcut icon" type="image/x-icon" href="images/fav-bazar-jibi.png" />
    <link rel="stylesheet" media="only screen and (min-width:992px)" href="css/styles.css?<?php echo time(); ?>">
	<link rel="stylesheet" media="only screen and (min-width:481px) and (max-width:991px)" href="css/styles-tablet.css?<?php echo time(); ?>">
	<link rel="stylesheet" media="only screen and (max-width: 480px)" href="css/styles-mobile.css?<?php echo time(); ?>">
	<meta name="abstract" content=""/>		
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
	<link href="https://cdn.rawgit.com/rastikerdar/vazir-font/v16.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script> 
$(function(){
	$('.header').load('load/header.php', function() {
  });
	$(".footer").load("load/footer.php"); 
});
</script>     
</head>


<body>
<?php include_once("analyticstracking.php"); ?> 
<div class="header">
</div>
<br/><br/><br/>

<div class="center-sign-up">  
	<div class="sign-up-container">
	<form id="form-sign-up" action="" method="post" enctype="multipart/form-data" autocomplete="off" accept-charset="utf-8">
		<input class="log-in-input" id="username-sign-up" type="text" name="username" 
		placeholder="نام کاربری" required />
		<input class="log-in-input" type="text" name="email" id="email" placeholder="ایمیل"  required />
		<div id="email-error"></div>
	<div class="password-container">
		<input class="log-in-input" id="password-field" 
		type="password" name="password" placeholder="رمز عبور" required />	
		<span id="show-hide-password" toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
	</div>
	<input type="submit" name="submit" id="submit" class="submit-sign-up" value="ثبت نام"/>
	<div id="other-options-log-in">
		<hr class="hr-line1">		
		<p class="log-in-text">قبلا ثبت نام کردید</p>
		<button id="go-to-log-in" class="submit-log-in">ورود</button>
	</div>
	<div id="dialog-error-log-in">
			<div class="dialog-title-div">
				<div id="to-close-error-log-in-div" class="dialog-close">
					<i class="fa fa-close"></i>
				</div>
			</div>			
			<div class="dialog-content-loading">	
					<img id="spinner" src="images/loading.gif" width=30"/>
					<p class="loading-text">بارگذاری...</p>
				</div>
				<div class="dialog-content-error">
					<p class="error-text"></p>
				</div>
				<div class="dialog-button-div">
					<button id="to-close-error-log-in-button" class="button-dialog active-button">Ok</button>	
				</div>			
	</div>

<script>
$('#form-sign-up').on('submit',function (e) {
	$.ajax({
        type: 'post',
        url: 'ajax/ajax-sign-up.php',
        data: $('#form-sign-up').serialize(),
		beforeSend:function(){                   
				   $(".dialog-content-error").css('display','none');
				   $('.error-text').text('');
				   $('#dialog-error-log-in').css('display','block'); 
				   $(".dialog-content-loading").css('display','block');
        },
        success: function (html) {
			//alert(html);			
			$(".dialog-content-loading").css('display','none');
			$(".dialog-content-error").css('display','block');		
			var json_x = $.parseJSON(html);
			//alert(json_x);
			var result=json_x.result;
			//alert('result' + result);
			var path=json_x.path;
			//alert('go on');
			if (result=='yes'){
				//alert('yes');				
				window.location = path;
			} else {
				//alert('no');			
				var error=json_x.error;
				$('#dialog-error-log-in').css('display','block');
				$('.error-text').text(error);
			}		
        }
    });          
   	e.preventDefault();		
});       
$('#to-close-error-log-in-button').on('click', function() {
	$('#dialog-error-log-in').css('display','none');
	return false;
});
$('#to-close-error-log-in-div').on('click', function() {
	$('#dialog-error-log-in').css('display','none');
	return false;
});
</script>	
<script>
$(document).mouseup(function(e){
    var containerLog = $("#dialog-error-log-in");
    if (!containerLog.is(e.target) && containerLog.has(e.target).length === 0){
        containerLog.hide();
    }
});
</script>		
<script>
$("#go-to-log-in").click(function(e) {
	window.location ='log-in.php';
	e.preventDefault();
});
</script>
<script>
$(".toggle-password").click(function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>

</form>
	
</div>
</div>
<div class="footer">
</div>
<script>
function checkPasswordMatch() {
    var password = $("#txtNewPassword").val();
    var confirmPassword = $("#txtConfirmPassword").val();
    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("Passwords do not match!");
    else
        $("#divCheckPasswordMatch").html("Passwords match.");		
}
$(document).ready(function () {
   $("#txtConfirmPassword").keyup(checkPasswordMatch);
});
</script>
</body>
</html>

 