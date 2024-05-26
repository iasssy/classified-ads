<?php 
session_start();
$array_json = array(
   "@context" => "https://schema.org",
   "@type" => "WebSite",
   "name" => "بازار جیبی",
   "alternateName" => array("bazarjibi",
   "bazar jibi",
   "بازارجیبی"
   ),   
   "url" => "https://bazarjibi.com",
   "sameAs" => array("https://twitter.com/bazarjibi",
  "https://www.linkedin.com/in/bazarjibi-com-80ab5115b/",
  "https://plus.google.com/",
  "https://t.me/"),
  "mainEntityOfPage" =>array( 
         "@type" => "WebPage",
         "@id" => "https://bazarjibi.com/index.php"
      ),
   "description" => "آگهی و نیازمندی رایگان | تبلیغات رایگان جارزدنی | درج آگهی رایگان | ثبت آگهی رایگان | ثبت رایگان آگهی لوازم خانگی | بهترین سایت های تبلیغاتی | ثبت رایگان آگهی | درج رایگان آگهی | تبلیغات رایگان تهران | سایت تبلیغاتی | درج آگهی رایگان در سایت های معتبر | تبلیغات در سایت های پر بازدید | سایت تبلیغاتی رایگان | سایت های تبلیغاتی رایگان پربازدید | سایت های تبلیغاتی پربازدید رایگان | بهترین سایت های تبلیغاتی | سایتهای رایگان تبلیغاتی | سایت های تبلیغاتی رایگان | درج آگهي رايگان در سايت هاي پربازديد | درج رایگان آگهی | سایت های تبلیغاتی پربازدید | آگهی رایگان اینترنتی",
   "about" => "آگهی و نیازمندی رایگان | تبلیغات رایگان جارزدنی | درج آگهی رایگان | ثبت آگهی رایگان | ثبت رایگان آگهی لوازم خانگی | بهترین سایت های تبلیغاتی | ثبت رایگان آگهی | درج رایگان آگهی | تبلیغات رایگان تهران | سایت تبلیغاتی | درج آگهی رایگان در سایت های معتبر | تبلیغات در سایت های پر بازدید | سایت تبلیغاتی رایگان | سایت های تبلیغاتی رایگان پربازدید | سایت های تبلیغاتی پربازدید رایگان | بهترین سایت های تبلیغاتی | سایتهای رایگان تبلیغاتی | سایت های تبلیغاتی رایگان | درج آگهي رايگان در سايت هاي پربازديد | درج رایگان آگهی | سایت های تبلیغاتی پربازدید | آگهی رایگان اینترنتی",
   "image" => "https://bazarjibi.com/images/logo-bazarjibi.png",
   "keywords" => "آگهی و نیازمندی رایگان | تبلیغات رایگان جارزدنی | درج آگهی رایگان | ثبت آگهی رایگان | ثبت رایگان آگهی لوازم خانگی | بهترین سایت های تبلیغاتی | ثبت رایگان آگهی | درج رایگان آگهی | تبلیغات رایگان تهران | سایت تبلیغاتی | درج آگهی رایگان در سایت های معتبر | تبلیغات در سایت های پر بازدید | سایت تبلیغاتی رایگان | سایت های تبلیغاتی رایگان پربازدید | سایت های تبلیغاتی پربازدید رایگان | بهترین سایت های تبلیغاتی | سایتهای رایگان تبلیغاتی | سایت های تبلیغاتی رایگان | درج آگهي رايگان در سايت هاي پربازديد | درج رایگان آگهی | سایت های تبلیغاتی پربازدید | آگهی رایگان اینترنتی"
)?> 
<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>   
	<meta charset="UTF-8"/>  
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>	
	<!--<title>نیازمندیهای رایگان | نیازمندیهای اینترنتی رایگان | نیازمندیها رایگان | خرید و فروش | بهترین سایت خرید و فروش | تبلیغات رایگان</title>-->
	<title>آگهی و نیازمندی رایگان | تبلیغات رایگان جارزدنی | درج آگهی رایگان | ثبت آگهی رایگان | ثبت رایگان آگهی لوازم خانگی</title>
	<meta name="google-site-verification" content="QhZiuTEIvplMOUnffS1VaRYfIvy8xN3ksDnWpBl3sr8" />
	<meta name="msvalidate.01" content="36F1377D2597401CF1F7AE81E2606F24" />
	<meta name="title" content="آگهی و نیازمندی رایگان | تبلیغات رایگان جارزدنی | درج آگهی رایگان | ثبت آگهی رایگان | ثبت رایگان آگهی لوازم خانگی" />
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

<?php
echo '<script type="application/ld+json">';
echo json_encode($array_json, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);   
echo '</script>';
?> 
<script> 
$(function(){
  $('.header').load('load/header.php');
});
</script>
</head>
<body>
<?php include_once("analyticstracking.php"); ?> 
<div class="header">		
</div>

<br/>
<div class="center-first-page">

<!-- =Slider Module PROVINCE= -->    
       <div class="window" id="window-province">

    </div><!-- .well .window -->             
<!-- =End Slider Module PROVINCE= -->

<!-- =Slider Module CITY= 
    <div class="window" id="window-city">           
    </div><!-- .well .window -->             
<!-- =End Slider Module CITY= -->
	
<!-- =Slider Module REGION=
    <div class="window" id="window-region">         
    </div><!-- .well .window -->             
<!-- =End Slider Module REGION= -->

<form id="post-form" action="" method="post">	
	<input type="hidden" title="" name="HiddenOstanID" id="HiddenOstanID"/>
	<input type="hidden" title="" name="HiddenOstanName" id="HiddenOstanName"/>	
	<input type="hidden" title="" name="HiddenShahrID" id="HiddenShahrID"/>		
	<input type="hidden" title="" name="HiddenShahrName" id="HiddenShahrName"/>	
	<input type="hidden" title="" name="HiddenRegionID" id="HiddenRegionID"/>
	<input type="hidden" title="" name="HiddenRegionName" id="HiddenRegionName"/>
<div class="submit-mobile-tablet-div">	
		<input type="submit"  title=""  id="next-index" name="submit_btn" value="ادامه"/>
	</div>
</form>
</div>
<div class="mobile-tablet"><br/></div>
<!--<div class="footer-first-page">
	<a href="index.php" alt="تمامی حقوق برای سایت بازارجیبی از ۱۳۹۵ محفوظ است."><h2>Copyright © 2018 bazarjibi.com</h2></a> 
</div>	-->
<div class="footer">
</div>
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
	if ($(window).width() < 1280) {
		//alert('Less than 1280');
		$('#slider-frame-wrapper').hScroll(60); // You can pass (optionally) scrolling amount
	}
	else {
		//alert('More than 1280');
	}
    
});
</script>
<script>	
$(document).ready(function() {
	$.ajax({
          type: "GET",
          async: false,
          url:'ajax/ajax-provinces.php',
          cache: false,
          beforeSend: function() {
          },
          success: function(html) {
            $("#window-province").append(html);
          }
        });
});
$(document).ready(function(){	
  $('.footer').load('load/footer.php');
});													
</script>	
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.js" ></script>
      <script>
         $('.center-first-page img').each(function() { 
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
													
<script>														<!--  PROVINCE!!!   -->
$('.slider-province-panel')  
  .click(
    function(){ 	 	
	ItemID=$(this).attr("id");
	var word='slider-province';	
	var province = ItemID.substr(ItemID.indexOf(word) + word.length);
	//alert('province = '+province);
	$(this).addClass("clicked");
	var hidden = $('input[name="HiddenOstanID"]:hidden');
	if (hidden.val().length != 0 && hidden.val()!=$(this).attr("id")){
		<!--  $('#'+hidden.val()).css('background', '#FFFF00');	 -->
		  var stringHidden = hidden.val().substr(hidden.val().indexOf(word) + word.length);
		  	<!-- alert('stringHidden ='+stringHidden); -->
		  $('#'+hidden.val()).removeClass("clicked");	   
	  }
	hidden.val($(this).attr("id"));
	//alert('HiddenOstanID=' + hidden.val());
	var HiddenOstanName = $('input[name="HiddenOstanName"]:hidden');
	HiddenOstanName.val($('#item-name-div-province'+province).text());
	//alert(HiddenOstanName.val());
	var HiddenShahrName = $('input[name="HiddenShahrName"]:hidden');
	//alert('HiddenShahrName before ='+HiddenShahrName.val());
	if (HiddenShahrName.val()!=''){
		HiddenShahrName.val('');
	}
	//alert('HiddenShahrName after ='+HiddenShahrName.val());
	var HiddenRegionName = $('input[name="HiddenRegionName"]:hidden');
	//alert('HiddenRegionName before ='+HiddenRegionName.val());
	if (HiddenRegionName.val()!=''){
		HiddenRegionName.val('');
	}
	//alert('HiddenRegionName after ='+HiddenRegionName.val());
    $.ajax({
        type:'POST',
        url:'load/cities_list.php',
        data:'province='+province,
        success:function(html){
        $('#window-city').html(html);
		//alert(html);		 
        }
    }); 
	}	
   );
</script>	
<script>																	<!--  CITY!!!   -->
$('#window-city')
.on('click', '.slider-city-panel', function (){
	ItemID=$(this).attr("id");
	//alert(ItemID);
	var word='slider-city';	
	var city = ItemID.substr(ItemID.indexOf(word) + word.length);
	//alert('city = '+city);
	$(this).addClass("clicked");
	var hidden = $('input[name="HiddenShahrID"]:hidden');
	if (hidden.val().length != 0 && hidden.val()!=$(this).attr("id")){
		<!--  $('#'+hidden.val()).css('background', '#FFFF00');	 -->
		  var stringHidden = hidden.val().substr(hidden.val().indexOf(word) + word.length);
		  	<!-- alert('stringHidden ='+stringHidden); -->
		  $('#'+hidden.val()).removeClass("clicked");	   
	  }
	hidden.val($(this).attr("id"));
	//alert('HiddenShahrID=' + hidden.val());
	var HiddenShahrName = $('input[name="HiddenShahrName"]:hidden');
	HiddenShahrName.val($('#item-name-div-city'+city).text());
	//alert(HiddenShahrName.val());
	var HiddenRegionName = $('input[name="HiddenRegionName"]:hidden');
	if (HiddenRegionName.val()!=''){
		HiddenRegionName.val('');
	}
	//alert('HiddenRegionName after ='+HiddenRegionName.val());
    $.ajax({
        type:'POST',
        url:'load/regions_list.php',
        data:'city='+city,
        success:function(html){
        $('#window-region').html(html);
		//alert(html);
        }
    }); 
	}	
  );
</script>
<script>																		<!--  REGION!!!   -->
$('#window-region')
.on('click', '.slider-region-panel', function (){
	ItemID=$(this).attr("id");
	//alert(ItemID);
	var word='slider-region';	
	var region = ItemID.substr(ItemID.indexOf(word) + word.length);
	//alert('region = '+region);
	$(this).addClass("clicked");
	var hidden = $('input[name="HiddenRegionID"]:hidden');
	if (hidden.val().length != 0 && hidden.val()!=$(this).attr("id")){
		<!--  $('#'+hidden.val()).css('background', '#FFFF00');	 -->
		  var stringHidden = hidden.val().substr(hidden.val().indexOf(word) + word.length);
		  	<!-- alert('stringHidden ='+stringHidden); -->
		  $('#'+hidden.val()).removeClass("clicked");	   
	  }
	hidden.val($(this).attr("id"));
	//alert('HiddenRegionID=' + hidden.val());
	var HiddenRegionName = $('input[name="HiddenRegionName"]:hidden');
	HiddenRegionName.val($('#item-name-div-region'+region).text());
	//alert(HiddenRegionName.val());
});
</script>
<script>
$('#next-index')
  .click(
    function(){ 
	  var ostan = $('input[name="HiddenOstanName"]:hidden').val();
	  var shahr = $('input[name="HiddenShahrName"]:hidden').val();
	  var region = $('input[name="HiddenRegionName"]:hidden').val();
	if (ostan=='' && shahr=='' && region==''){
		$("#post-form").attr("action", 'categories.php');
	} else if (ostan!='' && shahr=='' && region==''){
		$("#post-form").attr("action", 'categories.php?province='+ostan);
	} else if (ostan!='' && shahr!='' && region==''){
		$("#post-form").attr("action", 'categories.php?province='+ostan+'&city='+shahr);
	} else if (ostan!='' && shahr!='' && region!=''){
		$("#post-form").attr("action", 'categories.php?province='+ostan+'&city='+shahr+'&region='+region);
	}	 
    }
  );
</script>
</body>
</html>

 