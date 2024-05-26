<?php 
session_start();
?>
		<div class="header-top" style="-webkit-transform: translate3d(0px, 0px, 0px);">
			<div class="header-top-right">
				<a href="index.php">
					<div class="svg-animation">	
					</div>

<script> 
$(function(){
  $('.svg-animation').load('images/logo-bazar-jibi-animated.svg');
});
</script>	
					<div class="logo-word">بازار جیبی</div>
				</a>
			</div>
			
		
			<div class="header-top-center">
			<form id="searchForm" action="" method="post">				  
			<!--<select id="province-select-header" name="province_search" 
				oninvalid="this.setCustomValidity('please select province')" 
				oninput="this.setCustomValidity('')" 
				>
					<option value="" style="display:none">استان</option>
<?php
//ini_set('display_errors', '0');
$db = parse_ini_file("../../config_file_agahi.ini");
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
				<select id="category-select-header" name="category_search" 
				oninvalid="this.setCustomValidity('please select category')" 
				oninput="this.setCustomValidity('')" 
				>
					<option value="" style="display:none">دسته بندی</option>
<?php
ini_set('display_errors', '0');
$db = parse_ini_file("../../config_file_agahi.ini");
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
				</select>	-->
						
				<input id="search" title="" type="text" name="search" 
				placeholder="جستجو کلمه مورد نظر"  onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'جستجو کلمه مورد نظر'" autocomplete="off"/>  
			  	
				<input id="submit_search" type="submit" name="submit_search" value=""/>   
				</form>

			</div>
			
			<div class="header-top-left">		
					
	<div id="menu-header-mobile-tablet" class="mobile-tablet">	
					<span style="color:#ff2c22;font-size:30px;" id="nav-toggle" 
					class="glyphicon glyphicon-menu-hamburger"></span>
					
<div id="sideNav" class="sidenav">
 <?php 
	if( !isset($_SESSION['username'])){
		echo '
		<a href="agahi.php">همه آگهی</a>
		<a href="log-in.php">ورود کاربر</a>
		<hr class="hr-user">
		<a  title="ارسال آگهی" href="form.php">ارسال آگهی</a>
		';
	} else if (isset($_SESSION['username'])) {			
		echo '
		<a href="agahi.php">همه آگهی</a>
		<a href="my-page.php">صفحه کاربر</a>	
		<a href="load/log-out.php">خروج</a>		
		<hr class="hr-user">		
		<a  title="ارسال آگهی" href="form.php">ارسال آگهی</a>
		';
	}
?>
</div>

<script>
$("#nav-toggle").click(function() {
  $(this).toggleClass("active");
  $("#sideNav").toggleClass("sidenav-actif");
});
$(".body").click(function() {
  var state = $("#sideNav").attr("class");
  if (state == "sidenav sidenav-actif") {
    $("#sideNav").attr("class", "sidenav");
    $("#nav-toggle").attr("class", "");
  }
});
</script>
  </div> 
	<div class="desktop">		

						<a href="agahi.php">
							<div class="agahi-button">همه آگهی</div>
						</a>
<?php 			
		if(!isset($_SESSION['username'])){
			echo '<a href="log-in.php"><div class="post-button">ارسال آگهی</div></a>';
		} else {
			echo '<a href="form.php"><div class="post-button">ارسال آگهی</div></a>';
		} 	
		

?>
		<div class="menu-external-div">						
			<span class="menu-external">
				<img class="" src="images/icons/external-link.svg" height="21"/>
			</span>
			<div class="menu-external-list">
				<h1>سایت های دیگر ما:</h1>
				<hr/>
				<a href="https://karostan.com/index.php" target="_blank">
					<img class="" src="https://karostan.com/images/karostan-logo-new.svg" 
					alt="درج آگهی رایگان استخدام | درج رایگان آگهی استخدام | درج آگهی استخدام رایگان | ثبت آگهی استخدام رایگان | ثبت آگهی رایگان استخدام | ثبت رایگان آگهی استخدام"
					title="سایت آگهی های استخدامی"
					width="40"/>
					<p class="">کاراستان</p>
					<p class="" style="font-size:13px;">سایت آگهی های استخدامی</p>
				</a>
			</div>
		</div>	
<?php 					
		if (!isset($_SESSION['username'])) {	
			echo '<a href="log-in.php">
			<img id="menu1" class="icons menu1" src="images/icons/user-9.svg" height="20"/></a>';
		} else if (isset($_SESSION['username'])){
			echo '<div class="user-menu-div">
							<img class="" src="images/icons/user-9.svg" height="20"/>
					</div>
						<div id="user-menu" class="user-menu">';
						if ($_SESSION['username']=='admin'){
							echo '<a href="admin-page.php">
									<img class="" src="images/icons/user-9.svg" height="20"/>
									&nbsp;&nbsp;صفحه کاربر
								  </a>';
						} else {
							echo '<a href="my-page.php">
									<img class="" src="images/icons/user-9.svg" height="20"/>
									&nbsp;&nbsp;صفحه کاربر
								  </a>';
						}				
						echo '
						<a href="load/log-out.php">
							<i class="fa fa-sign-out" style="margin-top:10px;"></i>&nbsp;&nbsp;خروج
						</a>
						</div>';
				}
?>						
	</div> 
	
			</div>	
			</div>	
<script>
$('#submit_search').click(
    function(){ 	
	  var search = $('#search').val();
	  $("#searchForm").attr("action", 'agahi.php?search='+search+'&page=1');
    }
  );
</script>

		</div>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script type="text/javascript">
$(function(){
    var lastScrollTop = 0, delta = 5;
    $(window).scroll(function(event){
       var st = $(this).scrollTop();
       
       if(Math.abs(lastScrollTop - st) <= delta)
          return;
       
if (st > lastScrollTop){
       // downscroll code
    $(".header-bottom").css("top","-120px")
       .hover(
           function() {
            $(".header-bottom").css("top","59px");
           }
       )
   } else {
      // upscroll code
      $(".header-bottom").css("top","59px");
   }
       lastScrollTop = st;
    });
});
</script>
<script>
$('.user-menu-div') 
 .click( 
   function(){  
	 $('#user-menu').css('display','block');	
 }); 	
</script>
<script>
$(document).mouseup(function(e){
    var containerLog1 = $("#sidenav");
    if (!containerLog1.is(e.target) && containerLog1.has(e.target).length === 0){
        containerLog1.css('display','');
    }
});
</script>	
<script>
$('.menu-external') 
 .click( 
   function(e){  
	$('.menu-external-list').css('display','block');	
	e.stopPropagation();	
 }); 
</script>
<script>
$(document).mouseup(function(e){
    var containerLog = $(".menu-external-list");
    if (!containerLog.is(e.target) && containerLog.has(e.target).length === 0){
        containerLog.hide();
    }
});
</script>		