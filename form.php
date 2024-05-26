<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
date_default_timezone_set('Asia/Tehran');
ini_set('display_errors', '0');
if (!isset($_SESSION['user_id'])){
	echo '<script>window.location = "log-in.php";</script>';
} else {
$user_id=$_SESSION['user_id'];
$files = glob('users/'.$user_id.'/temp/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file)){
    unlink($file); // delete file
  }
}}
?> 
<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    
	<meta charset="UTF-8"/> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>	
	<title>ارسال آگهی | بازار جیبی | آگهی رایگان | آگهی فروش | ثبت آگهی</title>
	
    <meta name="title" content="ارسال آگهی | بازار جیبی | آگهی رایگان | آگهی فروش | ثبت آگهی" /> 
    <meta name="keywords" content="" /> 
	<meta name="description" content=""/>     
    <meta name="abstract" content=""/>

	<link rel="shortcut icon" type="image/x-icon" href="images/fav-bazar-jibi.png" />
	<link rel="stylesheet" media="only screen and (min-width:992px)" href="css/styles.css?<?php echo time(); ?>">
	<link rel="stylesheet" media="only screen and (min-width:481px) and (max-width:991px)" href="css/styles-tablet.css?<?php echo time(); ?>">
	<link rel="stylesheet" media="only screen and (max-width: 480px)" href="css/styles-mobile.css?<?php echo time(); ?>">
	<link href="https://cdn.rawgit.com/rastikerdar/vazir-font/v16.1.0/dist/font-face.css" rel="stylesheet" type="text/css" /> 	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
<script type="text/javascript">
$(document).ready(function(){
    $('#category-select').on('change',function(){		
        var category = $(this).val();
		//alert(category);
        if(category){
            $.ajax({
                type:'POST',
                url:'load/fetch_data_subcategories.php',
                data:'category='+category,
                success:function(html){
                    $('#new_select').html(html);
                }
            }); 
        }
    });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#province-select').on('change',function(){		
        var province = $(this).val();
		//alert(province);
        if(province){
            $.ajax({
                type:'POST',
                url:'load/fetch_data_cities.php',
                data:'province='+province,
                success:function(html){
                   $('#city-select').html(html);
				   // alert(html);
                }
            }); 
        }
    });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#city-select').on('change',function(){		
        var city = $(this).val();
		//alert(province);
        if(city){
            $.ajax({
                type:'POST',
                url:'load/fetch_data_regions.php',
                data:'city='+city,
                success:function(html){
                   $('#region-select').html(html);
				   // alert(html);
                }
            }); 
        }
    });
});
</script>
<script> 
$(function(){
	$(".footer").load("load/footer.php"); 
});
</script> 
<script> 
$(function(){
	$('.header').load('load/header.php', function() {
      $('#searchForm').hide();
    });
});
</script>
</head>
<body>
<?php include_once("analyticstracking.php") ?> 
<div class="header">
</div>
<br/>
<br/>
<br/>
<div class="title-form"><h1>لطفا کادرهای زیر را پر کنید.</h1></div>

<div class="form-div">
	<div class="form-div-right">
	<form id="main-form" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	
	<div class="input-container">	
            <div class="input-label">عنوان آگهی:</div>
			<input type="text" class="input-text" name="title" maxlength="200" required></input>
	</div>
	
	<div class="input-container">	
            <div class="input-label">گروه آگهی:</div>
			<select id="category-select" class="input-select-category" name="category" required="required">
				<option value="" style="display:none">لطفا یکی از موارد زیر را انتخاب کنید.</option>
<?php

ini_set('display_errors', '0');

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
	$sql = "SELECT * FROM category WHERE parent IS NULL ORDER BY id ASC";
	if ($result = mysqli_query($link, $sql)) {
	  if (mysqli_num_rows($result) > 0) {
		 while ($row = mysqli_fetch_array($result)) {
			 echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
	}}}	


mysqli_close($link);

?>  		
			</select>
	</div>		
	
	
	
	<div class="input-container-sub">	
            <div class="input-label-sub">زیرگروه:</div>			
			<select id="new_select" class="input-select-sub" name="subcategory" required="required">									
			</select> 
	</div>	
<script type="text/javascript">
$(document).ready(function(){
    $('#new_select').on('change',function(){		
        var subcategory = $(this).val();
		//alert(category);
        if(subcategory){
            $.ajax({
                type:'POST',
                url:'load/fetch_subcategory_description.php',
                data:'subcategory='+subcategory,
                success:function(html){
                    $('#description').html(html);
                }
            }); 
        }
    });
});
</script>	
	<!--<div class="subcategory-description-div" >
		<div class="subcategory-description-label">نمونه:</div>	
		<div class="subcategory-description" id="description"></div>		
	</div>-->
	<br/>	
	<div class="input-container">	
            <div class="input-label">توضیحات:</div>
			<textarea type="text" class="input-textarea" name="description" maxlength="1000"></textarea>
	</div>  
	<br/>
	
	<div class="input-container">	
            <div class="input-label">استان:</div>
			<select id="province-select" class="input-select-category" name="province" required="required">
				<option value="" style="display:none">لطفا یکی از موارد زیر را انتخاب کنید.</option>
<?php
ini_set('display_errors', '0');
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
	$sql = "SELECT * FROM provinces ORDER BY province_id ASC";
	if ($result = mysqli_query($link, $sql)) {
	  if (mysqli_num_rows($result) > 0) {
		 while ($row = mysqli_fetch_array($result)) {
			 echo '<option id="province'.$row['province_id'].'" value="'.$row['province_name'].'">'.$row['province_name'].'</option>';
	}}}	
mysqli_close($link);
?>  		
			</select>
	</div>	
	
	
	
	<!--<div class="input-container">	
            <div class="input-label">شهر:</div>
			<select id="city-select" class="input-select-sub" name="city">
			</select>
	</div>
	
	<div class="input-container">	
            <div class="input-label">منطقه:</div>
			<select id="region-select" class="input-select-sub" name="region">
			</select>
	</div>	-->
	<div class="input-container">	
            <div class="input-label">ایمیل:</div>
			<input type="text" class="input-text" name="email" maxlength="200"></input>
	</div>   
		
	<div class="input-container">	
            <div class="input-label">تلفن:</div>
			<input type="text" class="input-text" name="phone" maxlength="100"></input>
	</div> 
	
	<div class="input-container" id="website-div">	
            <div class="input-label">وبسایت:</div>
			<input type="text" class="input-text" name="website" maxlength="200"></input>
	</div>	
	
	<div class="input-container" id="linkedin-div">	
            <div class="input-label">لینکدین:</div>
			<input type="text" class="input-text" name="linkedin" maxlength="200"></input>
	</div>	
	
	<div class="btn-div btn-div-submit-desktop desktop"> 
	<br/>
		<input class="submit-form" title="" type="submit" name="submit" value="ارسال"/>
		<div id="dialog-loading">
				<div class="dialog-title-div">
					<div class="dialog-close to-close-dialog-loading">
						<i class="fa fa-close"></i>
					</div>
				</div>
					<p><span>در حال بارگذاری ...</span>
					<img src="images/loader.gif" width="40"/></p>	
					<button class="button-dialog to-close-dialog-loading">بستن</button>
									
		</div>
	</div>
	<br/>
	 <input type="hidden" id="image_error" name="image_error">

	</form>
  </div>  

<div class="form-div-left">
<form  id="form-image" action="" method="post" enctype="multipart/form-data">
	<div id="dialog-error-image">
			<div class="dialog-title-div">
				<div class="dialog-close to-close-dialog">
					<i class="fa fa-close"></i>
				</div>
			</div>								
					<div class="dialog-content-image-error">
						<p class="error-text"></p>
					</div>
				<div class="dialog-button-div">
					<button class="button-dialog active-button to-close-dialog">Ok</button>
				</div>			
	</div>
<?php 
for ($i=1;$i<=8;$i++){	
	echo	'<div class="thumbnails-div" id="thumbnails-div'.$i.'">
	<div class="loadingmessage" id="loadingmessage'.$i.'" style="display:none">	
		<img src="images/loader.gif" width="50"/>
	</div>
	<div class="remove-button" id="remove-button'.$i.'" style="display:none">	
		<span class="glyphicon glyphicon-remove remove-span" id="remove-span'.$i.'"></span>
	</div>
	<div class="thumbnail-upload-img-div" id="thumbnail-upload-img-div'.$i.'" style="display:none;">		
		<img class="thumbnail-upload-img" id="thumbnail-upload-img'.$i.'" src=""/>		
	</div>
	<label for="sortpicture'.$i.'" class="custom-file-upload" id="custom-file-upload'.$i.'">
				
	</label>
		<input id="sortpicture'.$i.'" class="sortpicture" accept=".png, .jpg, .jpeg, .gif" type="file" name="sortpic" style="display:none;"/>
	</div>';	
	}
?>

<script>
$('.to-close-dialog').on('click', function() {
	$('#dialog-error-image').css('display','none');
	return false;
});
</script>
<script>
$('.to-close-dialog-loading').on('click', function() {
	$('#dialog-loading').css('display','none');
	return false;
});
</script>
<script>
var array_error_image=[];
$('.sortpicture').on('change', function() {
	var ItemID=$(this).attr('id');
	word=$(this).attr('class');
	var number = ItemID.substr(ItemID.indexOf(word) + word.length);
	
	//alert(number);
    var file_data = $('#sortpicture'+number).prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
   // alert(form_data);   
    var position = $('#custom-file-upload'+number).position();
	var left=parseInt(position.left)+46;
	var top=parseInt(position.top)+25;
	$('#loadingmessage'+number).css('left', left+"px");
	$('#loadingmessage'+number).css('top', top+"px");
	$('#custom-file-upload'+number).css('background-image','none');				
	$('#loadingmessage'+number).show();  // show the loading message.   
    $.ajax({
                url: 'load/upload.php?number='+number, // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(html){
                    //alert(html); 
					var json_x = $.parseJSON(html);
					//alert(json_x);
					
					var error_string=json_x.error_string;
					var error_string_en=json_x.error_string_en;
					//alert('error_string_en = '+error_string_en);					
					var number=json_x.number;
					
					if (error_string_en==''){
						//alert('no error');
					var image_path=json_x.image_path;
						error_string='no errors';
						var position = $('#thumbnail-upload-img-div'+number).position();
					
					$('#loadingmessage'+number).hide();
					
					var position = $('#custom-file-upload'+number).position();
				    var left=parseInt(position.left)+5;
					//alert(left);
				    var top=parseInt(position.top)+5;
					$('#thumbnail-upload-img-div'+number).css('left', left+"px");
					$('#thumbnail-upload-img-div'+number).css('top', top+"px");					
					$('#thumbnail-upload-img-div'+number).show();
					var slash='../';
					var image_path_without_slash = image_path.substr(image_path.indexOf(slash) + slash.length);
					$('#thumbnail-upload-img'+number).attr("src", image_path_without_slash); 					
					
					var left_remove=parseInt(position.left)+55;
				    var top_remove=parseInt(position.top)+35;			
					$('#remove-button'+number).css('left', left_remove+"px");
					$('#remove-button'+number).css('top', top_remove+"px");		
					
					
					$('#thumbnail-upload-img-div'+number).hover(function(){
						$('#remove-button'+number).css('opacity','1');
						$('#remove-button'+number).show();
						$('#remove-span'+number).show();	
					},	function() {
						$('#remove-button'+number).css('opacity','0');
						$('#remove-button'+number).hide();
						$('#remove-span'+number).hide();
					});	
					$('#remove-button'+number).hover(function(){
						$('#remove-button'+number).css('opacity','1');
						$('#remove-button'+number).show();
						$('#remove-span'+number).show();
					},	function() {
						$('#remove-button'+number).css('opacity','0');
						$('#remove-button'+number).hide();
						$('#remove-span'+number).hide();
					});				
					} else {							
						$('.error-text').text(error_string);
						$('#dialog-error-image').css('display','block');
						$('#loadingmessage'+number).css('display','none');
						$('#custom-file-upload'+number).css('background-image','url("images/upload-icons/upload-icon.png")');
						$('input[name="image_error"]:hidden').val($('#image_error').val()+"#"+number+" error: "+error_string_en);
						//alert($('input[name="image_error"]:hidden').val());	
					}
					}
     });	 
});
</script>

<script>
$('.remove-button').click(function(){  
	//alert('clicked');
	ItemID=$(this).attr("id");
	//alert(ItemID);
	var word='remove-button';	
	var temp = ItemID.substr(ItemID.indexOf(word) + word.length);
	var src=$('#thumbnail-upload-img'+temp).attr('src');
	var user_id='<?php echo $user_id ?>';
	var word2='users/'+user_id+'/temp/';	
	var name = src.substr(src.indexOf(word2) + word2.length);
	//alert(name);
	$.ajax({  type:'POST',
              url:'ajax/delete_file_from_temp.php',
			  data: { var_name: name, var_number: temp},			  
              success:function(html){
				  //alert(html);
				  $('#thumbnail-upload-img'+html).attr('src','none');
				  $('#thumbnail-upload-img-div'+html).hide();
				  $('#remove-button'+html).hide(); 
				  $('#remove-span'+html).hide(); 				  
				  $('#custom-file-upload'+html).css("background-image","url('images/upload-icons/upload-icon.png')");					  
                }
            }); 
 });
</script>	
</form>	
<br/>		
<div id="all-errors"></div>

</div>

<script>
$(function () {
    $('#main-form').on('submit',function (e) {		
              $.ajax({
                type: 'post',
                url: 'form-submit.php',
                data: $('#main-form').serialize(),
				beforeSend:function(){                   
				   $('#dialog-loading').css('display','block');						
				},
                success: function (html) {
					//alert(html);
					location.href='form-success.php';
                }
              });
          e.preventDefault();
        });
});
</script>
		
	
</div>
<div class="false-button-div mobile-tablet">
	<br/>
	<input class="submit-form" title="" type="submit" name="submit" form="main-form" value="ارسال"/>	
	<div id="dialog-loading">
				<div class="dialog-title-div">
					<div class="dialog-close to-close-dialog-loading">
						<i class="fa fa-close"></i>
					</div>
				</div>
					<p><span>در حال بارگذاری ...</span>
					<img src="images/loader.gif" width="40"/></p>	
					<button class="button-dialog to-close-dialog-loading">بستن</button>
									
		</div>
</div>	
<br/>
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
$(document).mouseup(function(e){
    var container_menu = $("#user-menu");
    if (!container_menu.is(e.target) && container_menu.has(e.target).length === 0){
        container_menu.hide();
    }
});
$("#user-menu").click(function (e) {
    e.stopPropagation();
});
</script>
<script>	
$('.input-select-category').change(function(){
	//alert($(this).find('option:selected').val());
	if ($(this).find('option:selected').val() == 'استخدام'){
		$('#website-div').css('display','block');
		$('#linkedin-div').css('display','block');
	}
});	
</script> 
<script>
$(document).mouseup(function(e){
    var containerLog = $("#dialog-error-image");
    if (!containerLog.is(e.target) && containerLog.has(e.target).length === 0){
        containerLog.hide();
    }
});
</script>	
<script>
$(document).mouseup(function(e){
    var container_loading = $("#dialog-loading");
    if (!container_loading.is(e.target) && container_loading.has(e.target).length === 0){
        container_loading.hide();
    }
});
</script>	
<script>	
$(document).ready(function () {
    $(document).ajaxStart(function () {
        $("#loading").show();
    }).ajaxStop(function () {
        $("#loading").hide();
    });
});
</script>	
</body>
</html>

 