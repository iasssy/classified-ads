<?php 
session_start();
ini_set('display_errors', '0');
?> 
<!DOCTYPE HTML>
<html lang="fa-IR" dir="rtl">
<head>
    <title>بلاگ بازارجیبی ـ آگهی اینترنتی رایگان</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="title" content="بلاگ بازارجیبی ـ آگهی اینترنتی رایگان" /> 
    <meta name="keywords" content="بلاگ بازارجیبی ـ سایت خرید و فروش همه چی | خرید و فروش همه چی | بهترین سایت تبلیغاتی | بهترین سایت های تبلیغاتی | آگهی های رایگان | درج آگهی در سایت های رایگان اینترنتی | سایت تبلیغاتی پربازدید رایگان" /> 
	<meta name="description" content="بلاگ بازارجیبی ـ سایت خرید و فروش همه چی | خرید و فروش همه چی | بهترین سایت تبلیغاتی | بهترین سایت های تبلیغاتی | آگهی های رایگان | درج آگهی در سایت های رایگان اینترنتی | سایت تبلیغاتی پربازدید رایگان"/> 
   	<link rel="shortcut icon" type="image/x-icon" href="images/fav-bazar-jibi.png"/>
    <link rel="stylesheet" media="only screen and (min-width:992px)" href="css/styles.css?<?php echo time(); ?>">
	<link rel="stylesheet" media="only screen and (min-width:481px) and (max-width:991px)" href="css/styles-tablet.css?<?php echo time(); ?>">
	<link rel="stylesheet" media="only screen and (max-width: 480px)" href="css/styles-mobile.css?<?php echo time(); ?>">   
	<meta name="abstract" content="بلاگ بازارجیبی ـ آگهی اینترنتی رایگان"/>	  
	<link href="https://cdn.rawgit.com/rastikerdar/vazir-font/v16.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2761796497324966",
    enable_page_level_ads: true
  });
</script>	
<script> 
$(function(){
  $(".footer").load("load/footer.php"); 
  $(".introduction-social-links").load("load/icons.php");   
});
</script> 
</head>
<body>
<?php include_once("analyticstracking.php"); ?> 

<div class="header-blog"> 
	<a href="index.php" target="_blank">بازارجیبی</a>
</div>  
 <div class="all-blog-introduction">
	<a target="_blank" href="all-articles.php">
	<img id="blog-icon" alt="" src="images/bazarjibi-blog.svg" height="60"/>
	<h1>بلاگ بازارجیبی ـ مطالب مفید، راهنمای خرید و فروش</h1></a>
	<div class="introduction-social-links">		
	</div>
 </div>
<div class="blog-page-menu">

	<div class="nav">
      <ul>
       <!-- <li><a href="">Job search</a></li>
        <li><a href="">Resume</a></li>
        <li><a href="">Job interview</a></li>
        <li><a href="">At work</a></li>
        <li><a href="">Professional growth</a></li>
        <li><a href="">Specialities</a></li>-->
      </ul>
    </div>
</div>
<div class="all-blog-center-div">


  
	<div class="all-blog-text-links-div">  
	<div class="all-blog-text">
<?php 						
$db = parse_ini_file("../config_file_agahi.ini");
$host = $db['host'];
$user = $db['user'];
$pass = $db['pass'];
$name = $db['name'];
$link = mysqli_connect($host, $user, $pass, $name);
// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

mysqli_set_charset($link, "utf8");
$sql = "SELECT * FROM blog ORDER by blog_id DESC";
if ($result = mysqli_query($link, $sql)) {
	//echo 'connection established';
if (mysqli_num_rows($result) > 0) {
	//echo 'row not empty';
while ($row = mysqli_fetch_array($result)) {
	$main_image=$row['main_image'];
	$blog_topic=$row['blog_topic'];
	$text_smaller=$row['text_smaller'];
	$text_larger=$row['text_larger'];
	$image_teaser=$row['image_teaser'];
	echo '	<a href="article.php?id='.$row['blog_id'].'"><div class="all-blog-item">
			<div class="blog-item-image-div">
				<img class="blog-item-image" alt="'.$blog_topic.'" src="images/blog/'.$image_teaser.'" width="320"/>
			</div>
			<div class="blog-item-text-div">
				<div class="blog-item-text-topic">
					<h1>'.$blog_topic.'</h1>
				</div></a>
				<div class="blog-item-text-start">
				'.$row['teaser'].'
				</div>
			</div>
		</div>';
	
}}}	
mysqli_close($link);					
?>	

		
	</div> 
	<div class="all-blog-other-links">
		<div class="all-blog-agahi-links">
				<a href="https://bazarjibi.com/index.php" target="_blank">
					<img class="" src="images/logo-bazar-jibi.svg"
					alt="آگهی استخدام | ثبت آگهی | آگهی رایگان | آگهی فروش | آگهی کار | آگهی استخدامی | آگهی استخدام تهران | درج آگهی | آگهی روزنامه | آگهی استخدام امروز | آگهی های استخدام | آگهی تدریس خصوصی | آگهی ترحیم | آگهی خودرو | آگهی نامه | پروژه دانشجویی | آگهی رسمی | بازارجیبی | bazarjibi | bazar jibi"
					title="سایت نیازمندی های آنلاین"
					width="60"/>	
					<h1 class="">بازار جیبی</h1>			
				</a>				
				<p style="font-size:15px;">
					<span>به سایت بازارجیبی خوش آمدید. سایت بازارجیبی سایت نیازمندیهای رایگان، خرید و فروش وتبلیغات رایگان می باشد. برای ارسال آگهی رایگان به</span>
					<span><a href="https://bazarjibi.com/form.php">اینجا</a></span>
					<span>بروید.  برای دیدن نیازمندیهای رایگان اینترنتی به این</span>
					<span><a href="https://bazarjibi.com/agahi.php">لینک</a></span>
					<span>بروید.</span>
				</p>				
		</div> 
	</div> 
	</div>
</div>

<div class="footer">  

</div> 

</body>
</html>

 