<?php 
session_start();
?>
		
		<div class="header-top">
			<div class="header-top-right">
				<a href="index.php">
					<img class="logo" src="images/logo-bazar-jibi.svg" height="30"/>
					<div class="logo-word">بازار جیبی</div>
				</a>
			</div>
			
		
			<div class="header-top-center">
			<form id="searchForm" action="" method="post">					
				<select id="province-select-header" name="province_search" 
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
				</select>	
						
				<input id="search" title="" type="text" name="search" 
				placeholder="" autocomplete="off"/>  
				<input id="submit_search" type="submit" name="submit_search" value=""/>   
				</form>
			</div>
			
			<div class="header-top-left">
			<?php 					
		if (!isset($_SESSION['username'])) {	
			echo '<a href="log-in.php">
			<img id="menu1" class="icons" src="images/icons/user5.svg" height="20"/></a>';
		} else if (isset($_SESSION['username'])){
			echo '<div class="user-menu-div">
							<img class="icons" src="images/icons/user5.svg" height="20"/>
					</div>
						<div id="user-menu" class="user-menu">
						<div class="my-page">';
						if ($_SESSION['username']=='admin'){
							echo '<a href="admin-page.php">admin page</a>';
						} else {
							echo '<a href="my-page.php">صفحه کاربر</a>';
						}				
						echo '</div>
						<!--<div class="my-page"><a href="">settings</a></div>-->
						<div class="my-page"><a href="load/log-out.php">خروج</a></div>
						</div>';}
		if(!isset($_SESSION['username'])){
			echo '<a href="log-in.php"><img class="icons" src="images/icons/post3.svg" height="22"/></a>';
		} else {
			echo '<a href="form.php"><img class="icons" src="images/icons/post3.svg" height="22"/></a>';
		} 	
		

?>
			</div>	
<script>
$('#submit_search')
  .click(
    function(){ 
	  var search = $('#search').val();
	  //alert(search);
	  var province = $('#province-select-header').val();
	 // alert(province);
	 var category = $('#category-select-header').val();
	  //alert(category);
	  $("#searchForm").attr("action", 'agahi.php?province='+province+'&category='+category+'&table=&search='+search+'&page=1');
    }
  );
</script>

		</div>
		<!--<div class="header-bottom">
			<div class="all-categories">
					<a href="index.php">tags</a>
					<a href="index.php">tags</a>
					<a href="index.php">tags</a>					
					<a href="index.php?search=sport">tags</a>						
			</div>
		</div>-->
	
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
