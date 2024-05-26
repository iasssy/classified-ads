<?php 
session_start();
?> 
<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    <title>آگهی با موفقیت ارسال شد | بازار جیبی</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />  
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="title" content="آگهی با موفقیت ارسال شد. " /> 
    <meta name="keywords" content="" /> 
	<meta name="description" content=""/>   	
	<link rel="shortcut icon" type="image/x-icon" href="images/fav-bazar-jibi.png" /> 	
    <link rel="stylesheet" media="only screen and (min-width:992px)" href="css/styles.css?<?php echo time(); ?>">
	<link rel="stylesheet" media="only screen and (min-width:481px) and (max-width:991px)" href="css/styles-tablet.css?<?php echo time(); ?>">
	<link rel="stylesheet" media="only screen and (max-width: 480px)" href="css/styles-mobile.css?<?php echo time(); ?>">   
	<meta name="abstract" content=""/>
	<link href="https://cdn.rawgit.com/rastikerdar/vazir-font/v16.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
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
<?php include_once("analyticstracking.php"); ?> 
<div class="header">
</div>


<div class="records_success">
        <div  class="words_records_success">
			<div class="words_records1">کاربر گرامی، آگهی شما با موفقیت فرستاده شد. <img src="images/ok.svg" width="40" alt="اوکی"/></div>
			<div class="words_records2">و به زودی بر روی سایت قرار خواهد گرفت.</div>
		</div>		
		<div class="back-index"><a href="index.php">صفحه اصلی<a/></div>
</div>

<div class="footer">
</div>	

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
<script>
$('#submit_search')
  .click(
    function(){ 
	  var search = $('#search').val();
	/*   alert('advs.php?position='+position_go+'&province='+province_go+'&page='+'1');	*/
	 $("#searchForm").attr("action", 'agahi.php?search='+search+'&page=1');
    }
  );
</script>
</body>
</html>

 