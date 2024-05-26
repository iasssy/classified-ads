<?php 
session_start();
ini_set('display_errors', '0');
?> 
<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>    
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />  
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>	
	<title>صفحه کاربر | بازار جیبی</title>
	<meta name="title" content="صفحه کاربر | بازار جیبی" /> 
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
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
	
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
<br/>
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
$user_id=$_SESSION['user_id'];
mysqli_set_charset($link, "utf8");
$sql_info = "SELECT * FROM users WHERE id='$user_id'";
if ($result_info = mysqli_query($link, $sql_info)) {
if (mysqli_num_rows($result_info) > 0) {
while ($row_info = mysqli_fetch_array($result_info)) {
					$username=$row_info['username'];
}}}	
mysqli_close($link);
?>	
<div class="my-page-container">
<div class="modal fade" role="dialog"  id="dialog-question" aria-hidden="true">
	 <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
	  <div class="modal-content">
        <div class="modal-header" style="border-bottom:1px solid white;padding-bottom:0px;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
		 <p>آیا مطمئنید که می خواهید این آگهی را حذف کنید؟</p>
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
<div class="tab">
  <button class="tablinks active" onclick="openOption(event, 'agahi-man')" id="defaultOpen">
	<span>آگهی های من</span>
  </button>
  <button class="tablinks" onclick="openOption(event, 'favorite')">
	<span >مورد علاقه</span>
  </button>
  <button class="tablinks" onclick="openOption(event, 'settings')">
	<span>
		<span class="glyphicon glyphicon-cog"></span>
	</span>
  </button>
</div>

<div id="agahi-man" class="tabcontent">
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
$user_id=$_SESSION['user_id'];
mysqli_set_charset($link, "utf8");
$sql = "SELECT * FROM ads WHERE  user_id='$user_id' ORDER BY ad_id DESC";
if ($result = mysqli_query($link, $sql)) {
if (mysqli_num_rows($result) > 0) {
	echo '<div id="columns">';
while ($row = mysqli_fetch_array($result)) {				
	echo '<figure class="figure-div">
<div class="dropdown story-delete">
	<button type="button" class="btn btn-light" 
	data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="fa fa-ellipsis-v"></i>
	</button>			
  <div class="dropdown-menu dropdown-menu-custom">
  <a class="dropdown-item" href="edit.php?id='.$row['ad_id'].'"><i class="fa fa-pencil"></i>&nbsp;ویرایش</a>
    <br/>
    <br/>
	<a class="dropdown-item delete-story-icon" id="delete-story-icon'.$row['ad_id'].'"><i class="fa fa-times"></i>&nbsp;حذف</a>
  </div>
</div>';								
	if ($row['image']=="" || $row['image']=="[]"){
								echo ' 							
									<a href="show.php?id='.$row['ad_id'].'"> 
									<img src="images/icons/grow-9.svg" width="255"
									alt="'.$row['title'].'" 
									title="'.$row['title'].'"/>
									</a>';
							} else {
									$image_json=$row['image'];		
									$jsonOutput = json_decode($image_json, true);
								echo '									
									<a href="show.php?id='.$row['ad_id'].'"> 
									<img class="fig-img" 
				src="users/'.$row['user_id'].'/'.$row['ad_id'].'/'.$jsonOutput['0'].'"
									alt="'.$row['title'].'" 
									title="'.$row['title'].'"/>
									</a>';
							}
							echo '	
								<figcaption>
								<a href="show.php?id='.$row['ad_id'].'">
								<div class="post-name">'.$row['title'].'</div>
								</a>
								</figcaption>	
								</figure>';	
}
echo '</div>';
}}
mysqli_close($link);
?>
 
</div>

<div id="favorite" class="tabcontent">
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
$user_id=$_SESSION['user_id'];
mysqli_set_charset($link, "utf8");
$sql_fav="SELECT * FROM favorites ORDER by favorite_id ASC";
	if ($result_fav = mysqli_query($link, $sql_fav)) {
	if (mysqli_num_rows($result_fav) > 0) {
	while ($row_fav = mysqli_fetch_array($result_fav)) {				
		$favorite_ad_id=$row_fav['favorite_ad_id'];
		//echo $favorite_ad_id.'<br/>';
		mysqli_set_charset($link, "utf8");
		$sql_ad_fav = "SELECT * FROM ads WHERE  ad_id='$favorite_ad_id'";
if ($result_ad_fav = mysqli_query($link, $sql_ad_fav)) {
if (mysqli_num_rows($result_ad_fav) > 0) {
	echo '<div id="columns">';
while ($row_ad_fav = mysqli_fetch_array($result_ad_fav)) {				
									
	if ($row_ad_fav['image']=="" || $row_ad_fav['image']=="[]"){
								echo ' 
									<figure class="figure-div">
									<a href="show.php?id='.$row_ad_fav['ad_id'].'"> 
									<img src="images/icons/grow-9.svg" width="255"
									alt="'.$row_ad_fav['title'].'" 
									title="'.$row_ad_fav['title'].'"/>
									</a>';
							} else {
									$image_json=$row_ad_fav['image'];		
									$jsonOutput = json_decode($image_json, true);
								echo '
									<figure class="figure-div">
									<a href="show.php?id='.$row_ad_fav['ad_id'].'"> 
									<img class="fig-img" 
				src="users/'.$row_ad_fav['user_id'].'/'.$row_ad_fav['ad_id'].'/'.$jsonOutput['0'].'"
									alt="'.$row_ad_fav['title'].'" 
									title="'.$row_ad_fav['title'].'"/>
									</a>';
							}
		if (isset($_SESSION['user_id']) && $_SESSION['user_id']!=''){
		$user_id_session=$_SESSION['user_id'];
		$id=$row_ad_fav['ad_id'];
	echo '<div class="favorite-heart-div" id="favorite-heart-div-'.$row_ad_fav['ad_id'].'">';
		$sql_check="SELECT * FROM favorites WHERE favorite_ad_id='$favorite_ad_id' and favorite_user_id='$user_id_session'";
	if ($result_check = mysqli_query($link, $sql_check)) {
		if (mysqli_num_rows($result_check) > 0) {	
	echo '<span class="favorite-heart" id="favorite-heart-'.$row_ad_fav['ad_id'].'">
			<i class="fa fa-heart"></i>
		<span>';
	} else {
		echo '<span class="favorite-heart-empty" id="favorite-heart-empty-'.$row_ad_fav['ad_id'].'">
			<i class="fa fa-heart-o"></i>
		<span>';
	}
	}
	echo '</div>';
	}
							echo '	
								<figcaption>
								<a href="show.php?id='.$row_ad_fav['ad_id'].'">
								<div class="post-name">'.$row_ad_fav['title'].'</div>
								</a>
								</figcaption>	
								</figure>';	
}
echo '</div>';
}}
}}}
mysqli_close($link);
?>
 
</div>

<div id="settings" class="tabcontent">
	<div class="settings-container">		
		<span class="settings-icon">
			<i class="fa fa-user-circle-o"></i>
		</span>
		<span class="settings-title">نام کاربری:</span>
		<span class="settings-value"><?php echo $username?>
		</span>
		<span class="settings-icon">
			<i class="fa fa-pencil" aria-hidden="true"></i>
		</span>
	</div>
	<div class="button-settings-div"> 
		<div class="button-settings">
		<span class="settings-icon"><i class="fa fa-key"></i></span>
		Change password:
		</div>
	</div> 
	<div class="button-settings-div"> 
		<div class="button-settings">
		<span class="glyphicon glyphicon-erase settings-icon"></span>
		of userpage پاک کردن
		</div>
	</div> 

</div>

</div>
<div class="footer">
</div>
<script>	
$('.favorite-heart-div').click(function (){	
ItemID=$(this).attr('id');
//alert(ItemID);
var word='favorite-heart-div-';
var stringX = ItemID.substr(ItemID.indexOf(word) + word.length);
//alert(stringX);
   $.ajax({
                type:'POST',
                url:'ajax/ajax-favorites.php?id='+stringX,
                success:function(html){
                  // alert(html);
				   var json_x = $.parseJSON(html);
				   var status=json_x.status;
				   if (status=='inserted'){
						$('#favorite-heart'+stringX).css('display','block');
						$('#favorite-heart-empty'+stringX).css('display','none');
				   } else if (status=='deleted'){
						$('#favorite-heart-empty'+stringX).css('display','block');
						$('#favorite-heart'+stringX).css('display','none');
						$(".counter-likes").load(location.href + " .counter-likes");
				   } 
				   window.location.reload();
					//clearInput();
					
                }
            }); 
	
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
function openOption(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script>
$(".delete-story-icon").click( function() {	
  var thisID = $(this).attr('id');
	//alert(thisID);	
	var word='delete-story-icon';	
	var ad_id = thisID.substr(thisID.indexOf(word) + word.length);
	//alert(ad_id);
  $('#dialog-question').modal('show');
	$("#delete-confirmation").click( function() {	
	 $('#dialog-question').modal('hide');
	  $.ajax({
		type: 'post',
		url: 'ajax/ajax-delete-ad.php?ad_id='+ad_id,
		beforeSend:function(){                   
			//$('#dialog-loading').modal('show');	
		},
		success: function (html) {
			//alert(html);	
			//$('#dialog-loading').modal('hide');		
			var json_x = $.parseJSON(html);
			var error_string=json_x.error_string;	
			var error_string_en=json_x.error_string_en;	
			if (error_string!='' || error_string_en!=''){
				//alert(error_string);
				//alert(error_string_en);
				$('#dialog-default').modal('show');
				$('#dialog-default').text(error_string);
			} else{
				window.location.reload();
			}
		}
		});			
    return false;
	});
    return false;
});
</script>
</body>
</html>