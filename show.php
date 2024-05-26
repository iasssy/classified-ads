<?php
session_start(); 
$db = parse_ini_file("../config_file_agahi.ini");
$host = $db['host'];
$user = $db['user'];
$pass = $db['pass'];
$name = $db['name'];
$link = mysqli_connect($host, $user, $pass, $name);
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$ad_id=$_GET['id'];
//echo $ad_id;
mysqli_set_charset($link, "utf8");
$sql_img = "SELECT * FROM ads WHERE ad_id='$ad_id'";
if ($result_img = mysqli_query($link, $sql_img)){
if (mysqli_num_rows($result_img) > 0) {		
while ($row_img = mysqli_fetch_array($result_img)){
	$relevant_user_id=$row_img['user_id'];
	$image_json=$row_img['image'];		
	$jsonOutput = json_decode($image_json, true);
	$json_count=count($jsonOutput);
	$title=$row_img['title'];
	$table=$row_img['category_tree'];
	$description=$row_img['description'];
	$image_error=$row_img['image_error'];
	$province=$row_img['province'];
	$email=$row_img['email'];
	$phone=$row_img['phone'];
	$website=$row_img['website'];
	$linkedin=$row_img['linkedin'];
	$date=$row_img['date'];
}}}
$category_number=substr($table,0,1);
$sql = "SELECT * FROM category WHERE parent IS NULL AND number LIKE '%$category_number%'";
if ($result = mysqli_query($link, $sql)) {
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_array($result)) {
	$category_name=$row['name'];
}}}
mysqli_close($link);
if (isset($_SESSION['user_id']) && $_SESSION['user_id']!=''){
$session_user_id=$_SESSION['user_id'];
if ($session_user_id==$relevant_user_id){	
	$user_comparison=true;
} else {
	$user_comparison=false;
}} else {
	$user_comparison=false;
}
?> 

<!DOCTYPE HTML>
<html lang="fa-IR" dir="rtl">
<head> 
	<meta http-equiv="content-type" content="text/html" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />  
	<title><?php echo $title ?> | <?php echo $category_name ?> | <?php echo $province ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="keywords" content="<?php echo $title ?> | <?php echo $category_name ?> | <?php echo $province ?> | نیازمندیهای رایگان | نیازمندیهای رایگان اینترنتی | نیازمندیها رایگان | خرید و فروش | بهترین سایت خرید و فروش | تبلیغات رایگان | خرید و فروش خودرو | آگهی رایگان | بهترین سایت خرید و فروش خودرو | سایت های خرید و فروش کالا" /> 
	<meta name="description" content="<?php echo $title ?> | <?php echo $category_name ?> | <?php echo $province ?> | <?php echo $description ?>"/>
    <link rel="stylesheet" media="only screen and (min-width:992px)" href="css/styles.css?<?php echo time(); ?>"/>
	<link rel="stylesheet" media="only screen and (min-width:481px) and (max-width:991px)" href="css/styles-tablet.css?<?php echo time(); ?>"/>
	<link rel="stylesheet" media="only screen and (max-width: 480px)" href="css/styles-mobile.css?<?php echo time(); ?>"/>   
	
	<link rel="shortcut icon" type="image/x-icon" href="images/fav-bazar-jibi.png" />
    <link rel="stylesheet" media="only screen and (min-width:992px)" href="css/styles.css?<?php echo time(); ?>">
	<link rel="stylesheet" media="only screen and (max-width: 991px)" href="css/styles-mobile.css?<?php echo time(); ?>">  	
	<link href="https://cdn.rawgit.com/rastikerdar/vazir-font/v16.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/darkbox.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>		
	<script src="js/darkbox.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2761796497324966",
    enable_page_level_ads: true
  });
</script>
<script> 
$(function(){
  $(".header").load("load/header.php"); 
  $(".footer").load("load/footer.php"); 
});
</script> 

</head>

<body>
<?php include_once("analyticstracking.php"); ?> 
<div class="header">
</div>

<div class="show-center">
	<div class="show-left">	
		<div class="item-image-big">
				<?php 
				if ($image_json=="" || $image_json=="[]" || $image_json=='null'){
					echo '<img src="images/icons/grow-10.svg" width="255"
					alt="'.$title.'" title="'.$title.'"/>';
				} else {
					echo '<img id="big-image" 
					src="users/'.$relevant_user_id.'/'.$ad_id.'/'.$jsonOutput[0].'" 
					data-darkbox="users/'.$relevant_user_id.'/'.$ad_id.'/'.$jsonOutput[0].'"
					data-darkbox-group="one"
					data-darkbox-description="'.$title.'"
					alt="'.$title.'" title="'.$title.'" width="360"/>';
				}
				/*if ($user_comparison==true){
					echo '	<label for="image-upload'.$jsonOutput[0].'" id="image-upload-label">
								<span style="font-size:35px;position:absolute;top:5px;left:10px;color:red;cursor:pointer;">
									<i class="fa fa-file-image-o"></i>
								</span>
							</label>
						<input id="image-upload'.$jsonOutput[0].'" class="sortpicture" accept=".png, .jpg, .jpeg, .gif" 
						type="file" name="sortpic" style="display:none;"/>';
				}*/
				?>
		</div>
<script>
$('#image-big-edit')
   .click(
    function(){    	 
		
    }
  );
</script>			
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
	var path='users/'+relevant_user_id+'/'+'/'+ad_id+'/'; 
	//alert(path);
	var stringY = file_url.substr(file_url.indexOf(path)+ path.length);
	//alert(stringY);
	$('#big-image').attr("src",'users/'+relevant_user_id+'/'+ad_id+'/'+stringY);	 
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
	<div class="show-right">
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
	echo '<img src="images/icons/website.svg" width="20"/>&nbsp;<a href="'.$website.'">'.$website.'</a><br/>';	
	if ($row['linkedin']!=''){
	echo '<img src="images/icons/linkedin.svg" width="20"/>&nbsp;'.$linkedin.'<br/>';
	}
/*if ($user_comparison==true){
					echo '	<span style="font-size:35px;position:absolute;top:5px;left:10px;color:red;cursor:pointer;">
									<i class="fa fa-edit"></i>
							</span>';
}*/
?>
					</div>
				</div>
				<div class="show-description"><?php echo nl2br($description) ?></div>
		
	</div>
	
</div> 
   
<div class="footer">
</div>

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
 $(document).click(function (e) {  
    if (!$(e.target).parents().andSelf().is("#user-menu")) {
    $("#user-menu").removeClass('show');
    }
});
$("#user-menu").click(function (e) {
    e.stopPropagation();
});
</script>


<script>
$('.small-images-div')
   .click(
    function(){    
	  ItemID=$(this).attr("id");
	 // alert('id ='+$(this).attr("id"));	  
	   var word='div-image';
	
	<!--taskThis.style.display = "none"; -->
	var stringX = ItemID.substr(ItemID.indexOf(word)+ word.length);
	// alert('stringX = '+stringX);
	 var file_url=$('#image'+stringX).attr('src');
	 alert(file_url);
	$('.big-image').attr("src",file_url);	 
    }
  )
  .hover(
    function(){
      $(this).css('border', '1px solid red');
    },
    function(){
      $(this).css('border', '1px solid silver');
    }
  );
</script>

</body>
</html>