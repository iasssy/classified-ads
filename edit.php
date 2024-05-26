<?php 
session_start();
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
if (isset($_GET['id']) && $_GET['id']!=''){
$ad_id=$_GET['id'];
//echo $ad_id;
mysqli_set_charset($link, "utf8");
$sql_img = "SELECT * FROM ads WHERE ad_id='$ad_id'";
if ($result_img = mysqli_query($link, $sql_img)){
if (mysqli_num_rows($result_img) > 0) {		
while ($row_img = mysqli_fetch_array($result_img)){
	$relevant_user_id=$row_img['user_id'];
	$image_json=$row_img['image'];		
	if ($image_json!="" || $image_json!="[]" || $image_json!="null"){
		$jsonOutput = json_decode($image_json, true);
		$json_count=count($jsonOutput);
	}	
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
}} else {
	echo 'It is possible that the advertisement you are going to edit is no longer exists.';
}}
$parts = explode('_', $table);
$category_number=$parts['0'];
$subcategory_number=$parts['1'];
$sql = "SELECT * FROM category WHERE parent IS NULL AND number LIKE '%$category_number%'";
if ($result = mysqli_query($link, $sql)) {
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_array($result)) {
	$category_name=$row['name'];
}}}
$sql = "SELECT * FROM category WHERE number LIKE '%$table%'";
if ($result = mysqli_query($link, $sql)) {
if (mysqli_num_rows($result) > 0) {
while ($row = mysqli_fetch_array($result)) {
	$subcategory_name=$row['name'];
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
}
?> 
<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    
	<meta charset="UTF-8"/> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>	
	<title>ویرایش آگهی</title>
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
<div class="form-div">
<?php 
if (!isset($_GET['id']) || $_GET['id']==''){	
	echo '<div class="container-fluid text-center"><br/><br/><br/>
		<h3>مشکلی روی داده است. این مشکل ممکن است به یکی از دلایل زیر مربوط باشد:</h3>	
		<h4>۱. شما وارد حساب کاربری خود نشده اید.</h4>	
		<h4>۲. این آگهی دیگر وجود ندارد.</h4>	
		<h4>۳. شما اجازه ویرایش این آگهی را ندارید.</h4>	
	</div>';
} else {
	if ($user_comparison==false){
	echo '<div class="container-fluid text-center"><br/><br/><br/>
		<h3>مشکلی روی داده است. این مشکل ممکن است به یکی از دلایل زیر مربوط باشد:</h3>	
		<h4>۱. شما وارد حساب کاربری خود نشده اید.</h4>	
		<h4>۲. این آگهی دیگر وجود ندارد.</h4>	
		<h4>۳. شما اجازه ویرایش این آگهی را ندارید.</h4>
	</div>';
	} else {
	?>
<div class="title-form"><h1>لطفا کادرهای زیر را پر کنید.</h1></div>
<div class="modal fade" role="dialog"  id="dialog-question" aria-hidden="true">
	 <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
	  <div class="modal-content">
        <div class="modal-header" style="border-bottom:1px solid white;padding-bottom:0px;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
		 <p>آیا مطمئنید که می خواهید این تصویر را حذف کنید؟</p>
		 <!--<p>are you sure you want to delete this post?</p>-->
		 <button type="button" class="btn btn-secondary" id="delete-confirmation">بله</button>
		 <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
        </div>        
       </div>
	 </div>
</div>
<div class="modal fade" role="dialog"  id="dialog-default" aria-hidden="true">
	 <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
	  <div class="modal-content">
        <div class="modal-header" style="border-bottom:1px solid white;padding-bottom:0px;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
		 <p></p>
		 <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
        </div>        
       </div>
	 </div>
</div>
	<div class="form-div-right">
	<form id="main-form" action="" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<div class="input-container">	
        <div class="input-label">عنوان آگهی:</div>
		<input type="text" class="input-text" name="title" maxlength="200" required 
		value="<?php echo $title?>">	
		</input>
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
	<br/>
	<!--<div class="subcategory-description-div" >
		<div class="subcategory-description-label">نمونه:</div>	
		<div class="subcategory-description" id="description"></div>		
	</div>	-->
	<div class="input-container">	
        <div class="input-label">توضیحات:</div>
		<textarea type="text" class="input-textarea" name="description" maxlength="1000"><?php echo htmlspecialchars($description)?></textarea>
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
<div dir="ltr">
<?php 

/**
 * Checks if a folder exist and return canonicalized absolute pathname (sort version)
 * @param string $folder the path being checked.
 * @return mixed returns the canonicalized absolute pathname on success otherwise FALSE is returned
 */
function folder_exist($folder)
{
    // Get canonicalized absolute pathname
    $path = realpath($folder);

    // If it exist, check if it's a directory
    return ($path !== false AND is_dir($path)) ? $path : false;
}
$dir = 'users/'.$relevant_user_id.'/'.$ad_id;
if(FALSE !== ($path = folder_exist($folder))){
$a = scandir($dir);
$count = count($a);
//print_r($a);
unset($a[0]);
unset($a[1]);
$array_uploads=array_values($a);
$count_new = count($array_uploads);
//print_r($array_uploads);
}
?>
</div>
<div class="upload-div">
<?php 
require_once('convert/persian_numbers.php');
for ($i=1;$i<=8;$i++){	
	echo '<div class="uploading-div text-center">
	<div class="uploading-image-div ';
	if (!$array_uploads || (($i-1)>=$count_new)){
		echo 'upload-icon-div';
	}
	echo '" id="uploading-image-div'.$i.'">	
		  <img class="uploading-image" id="uploading-image'.$i.'" ';
	if ($array_uploads && (($i-1)<$count_new)){
		echo 'src="users/'.$relevant_user_id.'/'.$ad_id.'/'.$array_uploads[$i-1].'"/>
		<div class="image-remove" id="image-remove'.$i.'">	
		<i class="fa fa-times"></i>
		</div>';
	} else { 
	echo '/>';
	}
	if (!$array_uploads || (($i-1)>=$count_new)){
		echo '<label for="choose-picture'.$i.'" class="choose-picture-upload" id="choose-picture-upload'.$i.'">				
		</label>
		<input id="choose-picture'.$i.'" class="choose-picture" accept=".png, .jpg, .jpeg, .gif" type="file"
		style="display:none;"/>
		<i class="fa fa-spinner fa-pulse fa-3x fa-fw" id="fa-spinner'.$i.'"></i>';
	}
	echo '     </div>
		 <span class="image-number">'.trans($i).'</span>
	</div>
		 
';	
	}
?>
</div>
</form>	
<br/>		
<div id="all-errors"></div>
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
<?php 
}}
?>
</div>
<br/>
<div class="footer">
</div>
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
$(document).ready(function() {
	$("#category-select").val("<?php echo $category_name ?>");
	var category = $("#category-select").val();
		//alert(category);
        if(category){
            $.ajax({
                type:'POST',
                url:'load/fetch_data_subcategories.php',
                data:'category='+category,
                success:function(html){
                    $('#new_select').html(html);
					$("#new_select").val("<?php echo $subcategory_name ?>");
					var subcategory=$("#new_select").val();
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
                }
            }); 
        }	
});
</script> 
<script> 
$(document).ready(function() {
	$("#province-select").val("<?php echo $province?>");
	$('input[name="email"]').val("<?php echo $email?>");
	$('input[name="phone"]').val("<?php echo $phone?>");
	$('input[name="website"]').val("<?php echo $website?>");
	$('input[name="linkedin"]').val("<?php echo $linkedin?>");
});
</script> 
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
<script>
$('#form-image').on('change','.choose-picture',function(){
	var ItemID=$(this).attr('id');
	word=$(this).attr('class');
	var number = ItemID.substr(ItemID.indexOf(word) + word.length);
	//alert(number);
    var file_data = $('#choose-picture'+number).prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    //alert(form_data);    
	var src_image="<?php echo $relevant_user_id?>/<?php echo $ad_id?>";
    $.ajax({
        url: 'ajax/ajax-image-upload.php?number='+number+'&src_image='+src_image, // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
				beforeSend:function(){                   
				   $('#fa-spinner'+number).css('display','block');						
				},
                success: function(html){
                    //alert(html); 
					var json_x = $.parseJSON(html);
					//alert(json_x);					
					var error_string=json_x.error_string;
					var error_string_en=json_x.error_string_en;
					//alert('error_string_en = '+error_string_en);					
					var number=json_x.number;
					
					if (error_string_en=='' ){
						//alert('no error');
					var image_path=json_x.image_path;
					//alert(image_path);
						error_string='no errors';
						var position = $('#thumbnail-upload-img-div'+number).position();
					var slash='../';
					var image_path_without_slash = image_path.substr(image_path.indexOf(slash) + slash.length);
					//alert(image_path_without_slash);
					$("#form-image").load(location.href + " #form-image");	
					} else {
						$('#dialog-default').modal('show');
						$('#dialog-default').text(error_string);
						$('input[name="image_error"]:hidden').val($('#image_error').val()+"#"+number+" error: "+error_string_en);
					}
				
				}
     });	 
});
</script>
<script>
$('#form-image').on('click','.image-remove',function(){
	//alert('clicked');
	ItemID=$(this).attr("id");
	//alert(ItemID);
	var word='image-remove';	
	var image_number = ItemID.substr(ItemID.indexOf(word) + word.length);
	var src=$('#uploading-image'+image_number).attr('src');
	//alert(src);  
    $('#dialog-question').modal('show');
    $("#delete-confirmation").click(function() {	
		$('#dialog-question').modal('hide');	
		$.ajax({  
			type:'POST',
			url:'ajax/delete-image.php?src='+src,			  
			success:function(html){
				//alert(html);	
				$("#form-image").load(location.href + " #form-image");				  
			}
		});
	});
});
</script>
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
				  $('#custom-file-upload'+html).css("background-image","url('images/upload-icons/upload-icon.png')");					  
                }
            }); 
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
$('#main-form').on('submit',function (e) {	
    $.ajax({
		type: 'post',
		url: 'ajax/ajax-submit.php?ad_id='+'<?php echo $ad_id?>',
		data: $('#main-form').serialize(),
		beforeSend:function(){                   
			//$('#dialog-loading').css('display','block');						
			$('#dialog-default').modal('show');
			$('#dialog-default p').html("<span>در حال بارگذاری ...</span><img src='images/loader.gif' width='40'/>");
		},
        success: function (html) {
			//alert(html);
			$('#dialog-default').modal('hide');
			location.href='form-success.php';
         }
    });
    e.preventDefault();
});
</script>
</body>
</html>

 