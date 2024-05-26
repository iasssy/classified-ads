<?php 
session_start();
?> 
<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />  
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>	
	<title>انتخاب دسته بندی | بازار جیبی | آگهی رایگان | آگهی فروش | ثبت آگهی</title>
	<meta name="title" content="انتخاب دسته بندی | بازار جیبی | آگهی رایگان | آگهی فروش | ثبت آگهی" /> 
	<meta name="description" content="آگهی و نیازمندی رایگان | تبلیغات رایگان جارزدنی | درج آگهی رایگان | ثبت آگهی رایگان | ثبت رایگان آگهی لوازم خانگی | بهترین سایت های تبلیغاتی | ثبت رایگان آگهی | درج رایگان آگهی | تبلیغات رایگان تهران | سایت تبلیغاتی | درج آگهی رایگان در سایت های معتبر | تبلیغات در سایت های پر بازدید | سایت تبلیغاتی رایگان | سایت های تبلیغاتی رایگان پربازدید | سایت های تبلیغاتی پربازدید رایگان | بهترین سایت های تبلیغاتی | سایتهای رایگان تبلیغاتی | سایت های تبلیغاتی رایگان | درج آگهي رايگان در سايت هاي پربازديد | درج رایگان آگهی | سایت های تبلیغاتی پربازدید | آگهی رایگان اینترنتی"/>     
	<meta name="keywords" content="آگهی و نیازمندی رایگان | تبلیغات رایگان جارزدنی | درج آگهی رایگان | ثبت آگهی رایگان | ثبت رایگان آگهی لوازم خانگی | بهترین سایت های تبلیغاتی | ثبت رایگان آگهی | درج رایگان آگهی | تبلیغات رایگان تهران | سایت تبلیغاتی | درج آگهی رایگان در سایت های معتبر | تبلیغات در سایت های پر بازدید | سایت تبلیغاتی رایگان | سایت های تبلیغاتی رایگان پربازدید | سایت های تبلیغاتی پربازدید رایگان | بهترین سایت های تبلیغاتی | سایتهای رایگان تبلیغاتی | سایت های تبلیغاتی رایگان | درج آگهي رايگان در سايت هاي پربازديد | درج رایگان آگهی | سایت های تبلیغاتی پربازدید | آگهی رایگان اینترنتی" /> 
	<meta name="abstract" content="آگهی و نیازمندی رایگان | تبلیغات رایگان جارزدنی | درج آگهی رایگان | ثبت آگهی رایگان | ثبت رایگان آگهی لوازم خانگی | بهترین سایت های تبلیغاتی | ثبت رایگان آگهی | درج رایگان آگهی | تبلیغات رایگان تهران | سایت تبلیغاتی | درج آگهی رایگان در سایت های معتبر | تبلیغات در سایت های پر بازدید | سایت تبلیغاتی رایگان | سایت های تبلیغاتی رایگان پربازدید | سایت های تبلیغاتی پربازدید رایگان | بهترین سایت های تبلیغاتی | سایتهای رایگان تبلیغاتی | سایت های تبلیغاتی رایگان | درج آگهي رايگان در سايت هاي پربازديد | درج رایگان آگهی | سایت های تبلیغاتی پربازدید | آگهی رایگان اینترنتی"/>
	   
	<link rel="shortcut icon" type="image/x-icon" href="images/fav-bazar-jibi.png" /> 
    <link rel="stylesheet" media="only screen and (min-width:992px)" href="css/styles.css?<?php echo time(); ?>">
	<link rel="stylesheet" media="only screen and (max-width:991px)" href="css/styles-mobile.css?<?php echo time(); ?>">   
	<link href="https://cdn.rawgit.com/rastikerdar/vazir-font/v16.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
	
<script> 
$(function(){
	$('.header').load('load/header.php', function() {
    });
});
</script> 
</head>
<body>
<?php include_once("analyticstracking.php"); ?> 
<div class="header">
</div>
<div class="center-categories" id="center-categories">
<form id="categories-form" action="" method="post">
<?php
ini_set('display_errors', '0');
$db = parse_ini_file("../config_file_agahi.ini");
$host = $db['host'];
$user = $db['user'];
$pass = $db['pass'];
$name = $db['name'];
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_set_charset($link, "utf8");
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
mysqli_set_charset($link, "utf8");
$sql = "SELECT * FROM category WHERE parent IS NULL ORDER BY id ASC";
if ($result = mysqli_query($link, $sql)) {
if (mysqli_num_rows($result) > 0) {
	$row_number = $result->num_rows;
	while ($row = mysqli_fetch_array($result)) {
		$number_category=$row['number'];																							
																										//mobile-tablet
		echo ' <div class="mobile-tablet"><div class="window"><p>'.$row['name'].'</p>
           <div class="slider-frame-wrapper" id="slider-frame-wrapper'.$row['id'].'">
             <ul class="slider-frame">';
	
		mysqli_set_charset($link, "utf8");
		$sql_sub = "SELECT * FROM category WHERE parent LIKE '$number_category' ORDER BY id ASC";
			if ($result_sub = mysqli_query($link, $sql_sub)) {
				if (mysqli_num_rows($result_sub) > 0) {
					while ($row_sub = mysqli_fetch_array($result_sub)) {
		echo '<li class="slider-category-panel" id="slider-category-panel'.$row_sub['id'].'">
				<div class="image-div" id="image-div">
					<img class="item-image" src="images/categories/'.$row_sub['icon'].'"
						alt="'.$row_sub['name'].'"
						title="'.$row_sub['name'].'"		
					width="90"/>
				</div>
				<div class="item-name-div" id="item-name-div'.$row_sub['id'].'">'.$row_sub['name'].'</div>
			</li>'; 
			}}}
		echo '</ul><!-- .slider-window-frame -->
			</div><!-- .slider-window-frame-wrapper -->					                           
			</div></div><!-- .well .window -->';
			
																											//desktop
		echo '<div class="desktop"><div class="window-categories"><p>'.$row['name'].'</p>';
		mysqli_set_charset($link, "utf8");
		$sql_sub = "SELECT * FROM category WHERE parent LIKE '$number_category' ORDER BY id ASC";
			if ($result_sub = mysqli_query($link, $sql_sub)) {
				if (mysqli_num_rows($result_sub) > 0) {
					while ($row_sub = mysqli_fetch_array($result_sub)) {
		echo '<div class="slider-category-panel" id="slider-category-panel'.$row_sub['number'].'">
				<div class="image-div" id="image-div'.$row_sub['number'].'">
					<img class="item-image" 
						id="item-image'.$row_sub['number'].'" 
						src="images/categories/'.$row_sub['icon'].'" 
						alt="'.$row_sub['name'].'"
						title="'.$row_sub['name'].'"
						width="90"/>
				</div>
				<div class="item-name-div" id="item-name-div'.$row_sub['number'].'">'.$row_sub['name'].'</div>
			</div>'; 
			}}}
			echo '</div></div>';
} 


}}	


mysqli_close($link);
?>  		
                           
        

	<input type="hidden" title="" name="HiddenRegionName" id="HiddenRegionName"/>

</form>
</div>
<div class="footer">  
</div>	

<script>	
$(document).ready(function(){
  $('.footer').load('load/footer.php');
});													
</script>	
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.js" ></script>
      <script>
         $('.center-categories img').each(function() { 
         if(!$(this).hasClass('updated')){
         	$(this).attr('class', 'lazy');
         	$(this).addClass('updated');
         	$(this).wrap('<div class="background text-center" data-image="X2xZnCkYJ4YXKqj3xTUVpKT15VjEr+AAAAEElEQVQI12NgYGRiYGZhBQAALgAQ2bAGGQ"/>'); 
         }
         }); 
         $('.background').each(function() {
         var $b64 = $(this).data("image");
         $(this).css("background", "url(data:image/png;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==) center/cover no-repeat");
         });
         
         $('.lazy').each(function() {
         if(!$(this).hasClass('loaded')){ 
         	var $object = $(this),
         	$parent = $object.parent();
         	$object.imagesLoaded()
         .always( function( instance ) {
         	 if(!$(this).hasClass('loaded')){ 
         		// console.log('all images loaded');
         	 }
         })
         .done( function( instance ) {
         	 if(!$(this).hasClass('loaded')){ 
         		//console.log('all images successfully loaded');
         	 }
         })
         .fail( function() {
         // console.log('all images loaded, at least one is broken');
         })
         .progress( function( instance, image ) {	
         	$object.addClass('loaded');
         $parent.removeAttr("data-image")
         setTimeout(function() {
         $parent.removeAttr("style");
         }, 2000);
         	
         });
         }
         });
      </script>
<script>
jQuery(function ($) {
    $.fn.hScroll = function (amount) {
        amount = amount || 120;
        $(this).bind("DOMMouseScroll mousewheel", function (event) {
            var oEvent = event.originalEvent, 
                direction = oEvent.detail ? oEvent.detail * -amount : oEvent.wheelDelta, 
                position = $(this).scrollLeft();
            position += direction > 0 ? -amount : amount;
            $(this).scrollLeft(position);
            event.preventDefault();
        })
    };
});

$(document).ready(function() {
	for (var i=1;i<=5;i++){
    $('#slider-frame-wrapper'+i).hScroll(60); // You can pass (optionally) scrolling amount
	}
});
</script>  
<script>
$('.slider-category-panel')
  .click(
    function(){	
	var ItemID=$(this).attr('id');
	//alert(ItemID);	
	var word=$(this).attr('class');
	var table = ItemID.substr(ItemID.indexOf(word) + word.length);
	//alert(table);
	var province='<?php echo $_GET['province']?>';
	//alert(province);
	var city='<?php echo $_GET['city']?>';
	//alert(city);
	var region='<?php echo $_GET['region']?>';
	//alert(region);
	var number=table.charAt(0);
	//alert(number);
	$.ajax({
        type:'POST',
        url:'ajax/ajax-category-name.php?number='+number,
        success:function(html){
			//alert(html);		
			var category=html;
			if (province=='' && city=='' && region==''){
				window.location='agahi.php?province=&category='+category+'&table='+table+'&page=1';
			} else if (province!='' && city=='' && region==''){
				window.location='agahi.php?province='+province+'&category='+category+'&table='+table+'&page=1';
			} else if (province!='' && city!='' && region==''){
				window.location='agahi.php?province='+province+'&city='+city+'&category='+category+'&table='+table+'&page=1';
			}  else if (province!='' && city!='' && region!=''){
				window.location='agahi.php?province='+province+'&city='+city+'&region='+region+'&category='+category+'&table='+table+'&page=1';
			}	
        }
    }); 
	  		
  });
</script>
<script>
$('.user-menu-div').click( function(){  
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

 