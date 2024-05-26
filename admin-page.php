<?php 
session_start();
//print_r($_SESSION);
?> 
<!DOCTYPE HTML>
<html lang="fa-IR" dir="rtl">
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="" />
	<title>Admin page</title>
	<meta name="keywords" content=""/> 
	<meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" type="image/x-icon" href="images/fav-bazar-jibi.png" />   
	<link rel="stylesheet" media="only screen and (min-width:992px)" href="css/styles.css?<?php echo time(); ?>">
	<link rel="stylesheet" media="only screen and (min-width:481px) and (max-width:991px)" href="css/styles-tablet.css?<?php echo time(); ?>">
	<link rel="stylesheet" media="only screen and (max-width: 480px)" href="css/styles-mobile.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>
	<link href="https://cdn.rawgit.com/rastikerdar/vazir-font/v16.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />   
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
</head>
<body>
<div class="admin-page-container">
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

if( !isset($_SESSION['username']) ){
			echo '<div class="log-in"><a href="log-in.php">ورود کاربر</a></div>
			<!--<div class="link-all-advs"><a href="advs.php?position=&province=&page=1">همه آگهی ها</a>&nbsp;&nbsp;</div>
			<div class="link-articles"><a href="articles.php">بلاگ</a>&nbsp;&nbsp;&nbsp;</div>-->        ';
		} else {			
			echo '<div class="user-menu-div">'. $_SESSION['username'] .'</div>			
			<!--<div class="link-all-advs"><a href="advs.php?position=&province=&page=1">همه آگهی ها</a>&nbsp;&nbsp;</div>
			<div class="link-articles"><a href="articles.php">بلاگ</a>&nbsp;&nbsp;&nbsp;</div>-->
			<div id="user-menu" class="user-menu"><div class="my-page">';
				if ($_SESSION['username']=='admin'){
				echo '<a href="admin-page.php">صفحه کاربر</a>';
				} else {
					echo '<a href="my-page.php">صفحه کاربر</a>';
				}				
				echo '</div><div class="log-out"><a href="load/log-out.php">خروج</a>
				</div>
			</div>';
			} 
	echo '</div> 
</div>';		
		echo '<div class="container-fluid">
  <h2><a href="index.php">First page</a></h2>
    <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Unchecked advs</a></li>
    <li><a href="admin-page-checked.php">Checked</a></li>
    <li><a data-toggle="tab" href="#menu2">Refused advs</a></li>
    <li><a data-toggle="tab" href="#menu3">Other</a></li>
  </ul>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">';
	mysqli_set_charset($link, "utf8");
      	$sql = "SELECT * FROM ads ORDER BY ad_id DESC";
		if ($result = mysqli_query($link, $sql)) {
				if (mysqli_num_rows($result) > 0) {
					echo '<div id="columns">';
        while ($row = mysqli_fetch_array($result)) {
			if ($row['image']=="" || $row['image']=="[]"){
								echo ' 
									<figure class="figure-div">
									<a href="show.php?id='.$row['ad_id'].'"> 
									<img src="images/icons/grow-9.svg" width="255"
									alt="'.$row['title'].'" 
									title="'.$row['title'].'"/>
									</a>';
							} else {
									$image_json=$row['image'];		
									$jsonOutput = json_decode($image_json, true);
								echo '
									<figure class="figure-div">
									<a href="show.php?id='.$row['ad_id'].'"> 
									<img class="fig-img" 
				src="users/'.$row['user_id'].'/'.$row['category_tree'].'/'.$row['ad_id'].'/'.$jsonOutput['0'].'"
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
    } else {
        $boolean_no_record = true;
        echo '<div class="no_records_table">    
        <div  class="no_records_right"></div>
        <div  class="no_records">هیچ رکوردی یافت نشد.</div>
        <div  class="no_records_left"></div>
		</div>';
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}	  
   echo '</div>
    <div id="menu1" class="tab-pane fade">';		
    echo '</div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>';		

mysqli_close($link);

?>
</div>
<script>
$('.submit_edit')
  .click(
    function(event){ 
	$('.position_edit').val($('.position-name-div').text());
	<!--alert($('.position_edit').val());-->
	$('.companyname_edit').val($('.companyname-div').text());
	$('.quantity_edit').val($('.quantity-div').text());
	$('.province_edit').val($('.province-div').text());
	$('.city_edit').val($('.city-div').text());
	$('.experience_edit').val($('.experience-div').text());
	$('.salary_edit').val($('.salary-div').text());
	$('.requirements_edit').val($('.requirements-div').text());
	$('.email_edit').val($('.email-div').text());
	$('.phone_edit').val($('.phone-div').text());
	$('.address_edit').val($('.address-div').text());
    }
  );
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
    $(".page-remove").click( 
	function() {		
			//alert($(this).attr("id"));
			  var word='remove-';
	
			var id = $(this).attr("id").substr($(this).attr("id").indexOf(word) + word.length);
			//alert(id);
			var url_click='ajax-admin-remove-unchecked.php?id='+id;
			$("#form-adv-remove").attr("action", url_click);
			//alert(url_click);
        $.post( 
			$("#form-adv-remove").attr("action"),
            $("#form-adv-remove :input").serializeArray(),
            );
			window.location.reload();
        clearInput();
    }
	);
   $("#form-adv-remove").submit( function() {
        return false;
    });
    function clearInput() {
        $("#form-adv-remove :input").each( function() {
            $(this).val('');
        });
    }
</script>
</body>
</html>
