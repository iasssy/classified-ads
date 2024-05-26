<!DOCTYPE HTML>
<html lang="fa-IR" dir="rtl">
<head>
    
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />  
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>	
	<title>ورود کاربر | بازار جیبی</title>
    <meta name="title" content="ورود کاربر | بازار جیبی" />
	<meta name="keywords" content="" /> 
	<meta name="description" content=""/>   
    <link rel="shortcut icon" type="image/x-icon" href="images/fav-bazar-jibi.png" />
	<link rel="stylesheet" media="only screen and (min-width:992px)" href="css/styles.css?<?php echo time(); ?>">
	<link rel="stylesheet" media="only screen and (min-width:481px) and (max-width:991px)" href="css/styles-tablet.css?<?php echo time(); ?>">
	<link rel="stylesheet" media="only screen and (max-width: 480px)" href="css/styles-mobile.css?<?php echo time(); ?>">
	<meta name="abstract" content=""/>
	<link href="https://cdn.rawgit.com/rastikerdar/vazir-font/v16.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
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


<div class="center-log-in">  
	<div class="log-in-container">
	<form id="form-log-in" action="" method="post" enctype="multipart/form-data" autocomplete="off">
		<input class="log-in-input" id="email-log-in" type="text" name="email" placeholder="ایمیل"/>
		<div class="password-container">
			<input class="log-in-input" id="password-field" type="password" name="password" 
			placeholder="رمز عبور" required />	
			<span id="show-hide-password" toggle="#password-field" class="fa fa-fw fa-eye-slash field-icon toggle-password"></span>
		</div>
	<input type="submit" name="submit" id="submit" class="submit-log-in" value="ورود"/>
	</form>
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
					<button id="to-close-error-log-in-button" class="btn btn-info button-dialog active-button">Ok</button>
				</div>			
	</div>
	
<script>
$('#form-log-in').on('submit',function (e) {
	$.ajax({
        type: 'post',
        url: 'ajax/ajax-log-in.php',
        data: $('#form-log-in').serialize(),
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
			var path=json_x.path;
			if (result=='yes'){
				//alert('yes');					
				window.location = path;				
			} else {
				//alert('no');			
				var error=json_x.error;
				$('.error-text').text(error);
				$('#dialog-error-log-in p').text(error);
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

	
	<div id="forgot-pass-link">
		<a href="" style="color:white;">فراموشی رمز عبور؟</a>
		<!--<a href="forgot-pass.php"><p>forget password</p></a>-->
	</div>
	<div id="other-options-log-in">
		<hr class="hr-line">		
		<p class="log-in-text">کاربر جدید هستید؟ ثبت نام کنید</p>
		<a href="sign-up.php"><button class="submit-log-in">ثبت نام</button></a>
	</div>
	
</div>	
</div>
<script>
$(".toggle-password").click(function() {

  $(this).toggleClass('fa-eye-slash').toggleClass('fa-eye');
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
<div class="footer">  
</div>
<script>
$(document).mouseup(function(e){
    var containerLog = $("#dialog-error-log-in");
    if (!containerLog.is(e.target) && containerLog.has(e.target).length === 0){
        containerLog.hide();
    }
});
</script>	
</body>
</html>

 