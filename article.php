<?php 
session_start();	
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
$blog_id=$_GET['id'];
//echo $blog_id;
mysqli_set_charset($link, "utf8");
$sql = "SELECT * FROM blog WHERE blog_id='$blog_id'";
if ($result = mysqli_query($link, $sql)) {
	//echo 'connection established';
if (mysqli_num_rows($result) > 0) {
	//echo 'row not empty';
while ($row = mysqli_fetch_array($result)) {
	$main_image=$row['main_image'];
	$blog_topic=$row['blog_topic'];
	$text=$row['article_text'];
	$text_all=$row['text'];
	$word_count=$row['word_count'];
	$teaser=$row['teaser'];
	$description=$row['description'];
	$keywords=$row['keywords'];
	$likes=(int)$row['likes'];
	$date=$row['date'];
	
}}}	

mysqli_set_charset($link, "utf8");
$sql_comments= "SELECT * FROM  comments WHERE article_id='$blog_id' AND status='1' ORDER by date DESC";
if ($result_comments = mysqli_query($link, $sql_comments)){
if (mysqli_num_rows($result_comments) > 0) {		
	$comment_quantity = $result_comments->num_rows;
}
else {
	$comment_quantity = '';
}}
mysqli_close($link);

$array_json = array(
"@context" => "https://schema.org",
"@type" => "Article",
"author" =>  "بازارجیبی ـ آگهی اینترنتی رایگان",
"datePublished" => "$date",
"datemodified" => "$date",
"mainEntityOfPage" => "True",
"headline" => "$blog_topic",
"articleSection" => "",
"image" => array(
"@type" => "imageObject",
"url" => "https://bazarjibi.com/images/blog/$main_image",
"height" => "480",
"width" => "240"
),
"publisher" => array(
"@type" => "Organization",
"name" => "بازارجیبی ـ آگهی اینترنتی رایگان",
"logo" => array(
"@type" => "imageObject",
"url" => "https://bazarjibi.com/images/logo-bazar-jibi.png"
)
),
"wordCount" => "$word_count",
"articleBody" => "$text_all"
);	
$array_json_BlogPosting = array(
"@context" => "https://schema.org", 
"@type" => "BlogPosting",
"headline" => "$blog_topic",
"alternativeHeadline" => "",
"image" => array(
"@type" => "imageObject",
"url" => "https://bazarjibi.com/images/blog/$main_image",
"height" => "480",
"width" => "240"
),
"editor" => "بازارجیبی ـ آگهی اینترنتی رایگان",
"genre" => "بازارجیبی ـ سایت خرید و فروش همه چی | خرید و فروش همه چی | بهترین سایت تبلیغاتی | بهترین سایت های تبلیغاتی | آگهی های رایگان | درج آگهی در سایت های رایگان اینترنتی | سایت تبلیغاتی پربازدید رایگان", 
"keywords" => "$keywords", 
"wordcount" => "$word_count",
"publisher" => array(
"@type" => "Organization",
"name" => "بازارجیبی ـ آگهی اینترنتی رایگان",
"logo" => array(
"@type" => "imageObject",
"url" => "https://bazarjibi.com/images/logo-bazar-jibi.png"
)
),
"url" => "https://bazarjibi.com/images/blog/$main_image",
"datePublished" => "2017-10-10",
"dateCreated" => "2017-10-09",
"dateModified" => "2017-10-10",
"description" => "$description",
"articleBody" => "$text_all",
"author" => array(
"@type" => "Organization",
"name" => "بازارجیبی ـ آگهی اینترنتی رایگان",
"logo" => array(
"@type" => "imageObject",
"url" => "https://bazarjibi.com/images/logo-bazar-jibi.png"
)
),
"mainEntityOfPage" =>array( 
         "@type" => "WebPage",
         "@id" => "https://bazarjibi.com/article.php"
      )
 );		
?>

<!DOCTYPE HTML>
<html lang="fa-IR" dir="rtl">
<head>
    <title><?php echo $blog_topic?></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />  
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="title" content="<?php echo $blog_topic?>" /> 
    <meta name="keywords" content="<?php echo $blog_topic?>" /> 
	<meta name="description" content="<?php echo $blog_topic?>"/> 
	<meta name="abstract" content="<?php echo $blog_topic?>"/>	  

	<link rel="shortcut icon" type="image/x-icon" href="images/fav-bazar-jibi.png"/>
    <link rel="stylesheet" media="only screen and (min-width:992px)" href="css/styles.css?<?php echo time(); ?>">
	<link rel="stylesheet" media="only screen and (min-width:481px) and (max-width:991px)" href="css/styles-tablet.css?<?php echo time(); ?>">
	<link rel="stylesheet" media="only screen and (max-width: 480px)" href="css/styles-mobile.css?<?php echo time(); ?>">   
	<link href="https://cdn.rawgit.com/rastikerdar/vazir-font/v16.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2761796497324966",
    enable_page_level_ads: true
  });
</script>
<?php
echo '<script type="application/ld+json">';
echo json_encode($array_json, JSON_UNESCAPED_UNICODE); // use json_encode($array, JSON_PRETTY_PRINT) for debugging   
echo '</script>';
echo '<script type="application/ld+json">';
echo json_encode($array_json_BlogPosting, JSON_UNESCAPED_UNICODE); // use json_encode($array, JSON_PRETTY_PRINT) for debugging   
echo '</script>';
?>
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
	<img id="blog-icon" alt="" src="images/bazarjibi-blog.svg" width="60"/>
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
			
 
<div class="center-articles-div">
		<!--Comments-->
			<button type="button" class="btn-likes go-comments">
				<span>نظرات</span>
				<span style="color:#337ab7;"><i class="fa fa-comments pr-1"></i></span>
				<span class="counter"><?php echo $comment_quantity?></span>
			</button>
			
		<!--Likes-->
			<button type="button" class="btn-likes add-likes">				
				<span>جالب بود</span>
				<span style="color:red"><i class="fa fa-heart pr-1"></i></span>
				<span class="counter counter-likes0"><?php if ($likes>0){ echo $likes;}?></span>
			</button>
	<h1><?php echo $blog_topic?></h1>
    <img src="images/blog/<?php echo $main_image?>"/></img>
   
	<div class="blog-text-links-div">  
	<div class="blog-text">
	<?php echo $text?><br/>
		<div style="font-size:14px;"><!--Comments-->
			<button type="button" class="btn-likes go-comments">
				<span>نظرات</span>
				<span style="color:#337ab7;"><i class="fa fa-comments pr-1"></i></span>
				<span class="counter"><?php echo $comment_quantity?></span>
			</button>
			&nbsp;
		<!--Likes-->
			<button type="button" class="btn-likes add-likes">				
				<span>جالب بود</span>
				<span class="likes-span" style="color:red"><i class="fa fa-heart pr-1"></i></span>
				<span class="counter counter-likes"><?php if ($likes>0){ echo $likes;}?></span>
			</button>
		</div>
			<br/>
			<br/>
<script>
$('.go-comments').on('click', function() {
	 $('html, body').animate({
        scrollTop: $(".all-comments").offset().top
    }, 2000);
	return false;
});			
</script>
<script>
$('.add-likes').on('click', function() {
	//var likes_counter=$('.counter-likes').text();
	//alert(likes_counter); 
	var article_id='<?php echo $_GET['id']?>';
	$.ajax({
		type: 'post',
		url: 'ajax/ajax-likes.php?article_id='+article_id,
		beforeSend:function(){  					
		},
		success: function (html) {
				//alert(html);
				$(".counter-likes0").load(location.href + " .counter-likes0");
				$(".counter-likes").load(location.href + " .counter-likes");
		}
	});
	return false;
});			
</script>				
	<div class="blog-comments-div">  		
					
					<div class="form-comment">
						<form id="comment-form" action="" method="post">
							<textarea class="text-comment" name="comment" placeholder="نظرات..."
							onfocus="this.placeholder = ''" onblur="this.placeholder = 'نظرات...'" ></textarea>
							<input class="submit-comment" style="font-size:14px;" type="submit" value="ارسال"/>
						</form>
						<div id="dialog-comment">
							<div class="dialog-title-div">
								<div id="dialog-comment-close" class="dialog-close to-close">
									<i class="fa fa-close"></i>
								</div>
							</div>
							<p>ورودی خالی است</p>
							<button id="to-cancel" class="btn-likes to-close">Ok</button>				
						</div>
						<div id="dialog-loading">
							<div class="dialog-title-div">
								<div class="dialog-close to-close-dialog-loading">
									<i class="fa fa-close"></i>
								</div>
							</div>
							<p><span>در حال بارگذاری ...</span>
							<img class="loading" src="images/loading.gif" width="10"/></p>	
							<button class="button-dialog to-close-dialog-loading">بستن</button>
									
						</div>
						
						<div id="dialog-success">
							<div class="dialog-title-div">
								<div class="dialog-close to-close-dialog-success">
									<i class="fa fa-close"></i>
								</div>
							</div>
							<p><span>کاربر گرامی نظر شما با موفقیت فرستاده شد و تا لحظاتی بعد بر روی سایت قرار می گیرد.</span></p>	
							<button class="button-dialog to-close-dialog-success">بستن</button>
									
						</div>
					</div>

	
		<div class="all-comments">
<?php 
$db = parse_ini_file("../config_file_agahi.ini");
$host = $db['host'];
$user = $db['user'];
$pass = $db['pass'];
$name = $db['name'];
$link = mysqli_connect($host, $user, $pass, $name);
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
mysqli_set_charset($link, "utf8");
$sql_comments= "SELECT * FROM  comments WHERE article_id='$blog_id' AND status='1' ORDER by date DESC";
if ($result_comments = mysqli_query($link, $sql_comments)){
if (mysqli_num_rows($result_comments) > 0) {		
while ($row_comments = mysqli_fetch_array($result_comments)){
	echo '<div class="each-comment">
		   <p id="comment-text">'.$row_comments['comment'].'</p>';	
require_once 'convert/persian_date.php';
		
			$date_entered=$row_comments['date'];
			$year = substr($date_entered, 0, 4);
			$month = substr($date_entered, 5, 2);
			$month_first_letter=substr($month, 0, 1);
			$month_second_letter=substr($month, 1, 1);
			if 	($month_first_letter=='0'){
				$month=$month_second_letter;
			}
			$day = substr($date_entered, 8, 2);
			$day_first_letter=substr($day, 0, 1);
			$day_second_letter=substr($day, 1, 1);
			if 	($day_first_letter=='0'){
				$day=$day_second_letter;
			}			
			//echo $year;
			//echo '<br/>';
			//echo 'first letter month = '.$month_first_letter;
			//echo '<br/>';
			//echo 'month = '.$month;
			//echo '<br/>';
			//echo 'day ='.$day;
			//echo '<br/>';
			//echo 'first letter day = '.$day_first_letter;
			//echo '<br/>';
			//echo jDateTime::date("Y/m/d", mktime(0,0,0,$month,$day,$year),  null, null, 'Asia/Tehran');
			//echo '<br/>';
			
 		   
	echo '	   <p id="comment-date">&nbsp;&nbsp;&nbsp;'.jDateTime::date("Y/m/d", mktime(0,0,0,$month,$day,$year),  null, null, 'Asia/Tehran').'</p>		   						
		</div>';
}}}
mysqli_close($link);
?>				

			</div>
					
		</div> 			
					
	</div> 
	
	<div class="blog-other-links desktop">
		<div class="blog-ads">
			<a href="contact-us.php">در اینجا می تواند آگهی شما باشد</a>
		</div>
		<div class="blog-ads">
			<a href="contact-us.php">در اینجا می تواند آگهی شما باشد</a>
		</div>
	</div> 
	</div>  	
</div>
	
<br/><br/>
<div class="footer">  
	
</div> 
<script>
$(function () {
    $('#comment-form').on('submit',function (e) {
			var article_id='<?php echo $_GET['id']?>';
			
				var comment=$('.text-comment').val();
				if (comment==''){
					//alert('empty');
					$('#dialog-comment').css('display','block');
					//$('.text-comment').css('border','1px solid red');
					$('.text-comment').click(function() {
						//alert('start typing');
						$('#dialog-comment').css('display','none');
						//$('.text-comment').css('border','1px solid #999');
					});
				} else {
					$.ajax({
						type: 'post',
						url: 'ajax/ajax-comments.php?article_id='+article_id,
						data: $('#comment-form').serialize(),
						beforeSend:function(){                   
							$('#dialog-loading').css('display','block');						
						},
						success: function (html) {
							//alert(html);
							$('#dialog-loading').css('display','none');	
							$('#dialog-success').css('display','block');	
							$(".all-comments").load(location.href + " .all-comments");
							$('.text-comment').val('');
						}
					});				
				}			
					            
          e.preventDefault();
        });
});
$('.to-close').on('click', function() {
	$("#dialog-comment").css('display','none');
	return false;
});

$('.to-close-dialog').on('click', function() {
	$('#dialog-error-image').css('display','none');
	return false;
});

$('.to-close-dialog-loading').on('click', function() {
	$('#dialog-loading').css('display','none');
	return false;
});
$('.to-close-dialog-success').on('click', function() {
	$('#dialog-success').css('display','none');
	return false;
});
</script>	
</body>
</html>

 