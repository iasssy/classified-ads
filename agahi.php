<?php 
session_start();
ini_set('display_errors', '0');
if (isset($_GET['province']) && !empty($_GET["province"])){
	$province=$_GET['province'];
} else {
	$province='';
}
if (isset($_GET['category']) && !empty($_GET["category"])){
	$category=$_GET['category'];
} else {
	$category='';
}
if (isset($_GET['table']) && !empty($_GET["table"])){
	$table=$_GET['table'];
} else {
	$table='';
}
if (isset($_GET['search']) && !empty($_GET["search"])){
	$search=$_GET['search'];
} else {
	$search='';
}
$array_json = array(
   "@context" => "https://schema.org",
   "@type" => "WebSite",
   "name" => "بازار جیبی",
   "alternateName" => array("bazarjibi",
   "bazar jibi",
   "بازارجیبی"
   ),   
   "url" => "https://bazarjibi.com",
  "sameAs" => array("https://twitter.com/bazarjibi",
  "https://www.linkedin.com/in/bazarjibi-com-80ab5115b/",
  "https://plus.google.com/",
  "https://t.me/"),
  "mainEntityOfPage" =>array( 
         "@type" => "WebPage",
         "@id" => "https://bazarjibi.com/index.php"
      ),
   "description" => "حراج لوازم خانگی دست دوم | لوازم دست دوم منزل | فروش لوازم منزل فوری | حراج لوازم منزل تهران | فروش وسایل منزل به علت مهاجرت | حراج لوازم منزل به علت مسافرت کرج | فروش یکجا لوازم منزل",
   "about" => "حراج لوازم خانگی دست دوم | لوازم دست دوم منزل | فروش لوازم منزل فوری | حراج لوازم منزل تهران | فروش وسایل منزل به علت مهاجرت | حراج لوازم منزل به علت مسافرت کرج | فروش یکجا لوازم منزل",
   "image" => "https://bazarjibi.com/images/logo-bazarjibi.png",
   "keywords" => "حراج لوازم خانگی دست دوم | لوازم دست دوم منزل | فروش لوازم منزل فوری | حراج لوازم منزل تهران | فروش وسایل منزل به علت مهاجرت | حراج لوازم منزل به علت مسافرت کرج | فروش یکجا لوازم منزل"
)?> 
<!DOCTYPE html>
<html lang="fa-IR" dir="rtl">
<head>
    
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />  
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>حراج لوازم خانگی دست دوم | لوازم دست دوم منزل | فروش لوازم منزل فوری | حراج لوازم منزل تهران | فروش وسایل منزل به علت مهاجرت | حراج لوازم منزل به علت مسافرت کرج | فروش یکجا لوازم منزل</title>
    <meta name="title" content="حراج لوازم خانگی دست دوم | لوازم دست دوم منزل | فروش لوازم منزل فوری | حراج لوازم منزل تهران | فروش وسایل منزل به علت مهاجرت | حراج لوازم منزل به علت مسافرت کرج | فروش یکجا لوازم منزل" /> 
    <meta name="keywords" content="حراج لوازم خانگی دست دوم | لوازم دست دوم منزل | فروش لوازم منزل فوری | حراج لوازم منزل تهران | فروش وسایل منزل به علت مهاجرت | حراج لوازم منزل به علت مسافرت کرج | فروش یکجا لوازم منزل" /> 
	<meta name="description" content="حراج لوازم خانگی دست دوم | لوازم دست دوم منزل | فروش لوازم منزل فوری | حراج لوازم منزل تهران | فروش وسایل منزل به علت مهاجرت | حراج لوازم منزل به علت مسافرت کرج | فروش یکجا لوازم منزل"/>     
	<meta name="abstract" content="حراج لوازم خانگی دست دوم | لوازم دست دوم منزل | فروش لوازم منزل فوری | حراج لوازم منزل تهران | فروش وسایل منزل به علت مهاجرت | حراج لوازم منزل به علت مسافرت کرج | فروش یکجا لوازم منزل"/>
	
	<link rel="shortcut icon" type="image/x-icon" href="images/fav-bazar-jibi.png" /> 
    <link rel="stylesheet" media="only screen and (min-width:992px)" href="css/styles.css?<?php echo time(); ?>">
	<link rel="stylesheet" media="only screen and (max-width:991px)" href="css/styles-mobile.css?<?php echo time(); ?>">   
	<link href="https://cdn.rawgit.com/rastikerdar/vazir-font/v16.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
	<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.js"  ></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2761796497324966",
    enable_page_level_ads: true
  });
</script>
<?php
echo '<script type="application/ld+json">';
echo json_encode($array_json, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);   
echo '</script>';
?> 	

<script> 
$(function(){
  $('.header').load('load/header.php', function() {
	  var province='<?php echo $province?>';
		if (province!=''){
			$("#province-select-header").val(province);
		}
		var category='<?php echo $category?>';
		if (category!=''){
			$("#category-select-header").val(category);
		}
		var search ='<?php echo $search?>';
		if (search!=''){
			$("#search").val(search);
		}
  });
});
</script>
</head>
<body>
<?php include_once("analyticstracking.php"); ?> 
<div class="header">
</div>
<div class="big_container">
<div class="right">	
	<div class="filters-div mobile-tablet">
		<span style="margin-left:10px;font-size:20px;"><i class="fa fa-filter"></i></span>
			جستجوی دقیق
		<span id="filter-down" style="margin-right:10px;font-size:20px;">
			<i class="fa fa-angle-down"></i></span>
		<span id="filter-up"  style="margin-right:10px;font-size:20px;">
			<i class="fa fa-angle-up"></i></span>
	</div>
	<div class="all-filters">	
	<div class="filters">	
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
function Desc($item1,$item2){
    if ($item1['number'] == $item2['number']) return 0;
    return ($item1['number'] < $item2['number']) ? 1 : -1;
}
mysqli_set_charset($link, "utf8");	
if ($category!=''){
	$sql_cat_array = "SELECT * FROM category WHERE parent is NULL AND name LIKE '%$category%'";
	if ($result_cat_array = mysqli_query($link, $sql_cat_array)) { 	
	if (mysqli_num_rows($result_cat_array ) > 0) {	
	while ($row_cat_array = mysqli_fetch_array($result_cat_array)) {
	$cat_number=$row_cat_array['number'];
	//echo $cat_number;
}}}	
} else {
	$cat_number='';
}	

if ($province!=''){
	mysqli_set_charset($link, "utf8");
	$sql_pr_ads = "SELECT * FROM ads  WHERE (status='1') AND (title LIKE '%$search%' OR description LIKE '%$search%') AND 
province LIKE '%$province%' AND SUBSTR(category_tree,1,1) LIKE '%$cat_number%'";
	if ($result_pr_ads = mysqli_query($link, $sql_pr_ads)) {
	if (mysqli_num_rows($result_pr_ads) > 0) {
		$row_pr_number = $result_pr_ads->num_rows;
		echo '<p class="filter-title">استان:</p>
		<div class="filter-item filter-clicked" id="filter-item-province-clicked">
			<span>'.$province.'</span>
			<span class="filter-number filter-number-clicked">&nbsp;('.$row_pr_number.')</span>							
			<i class="fa fa-times remove-filter-item" aria-hidden="true"></i>							
		</div>';
	}}

} else {
mysqli_set_charset($link, "utf8");	
$sql_pr_array = "SELECT * FROM provinces ORDER BY province_id ASC";
if ($result_pr_array = mysqli_query($link, $sql_pr_array)) { 	
if (mysqli_num_rows($result_pr_array ) > 0) {
$data=array();	
while ($row_pr_array = mysqli_fetch_array($result_pr_array)) {
	$province_name=$row_pr_array['province_name'];
	$province_id=$row_pr_array['province_id'];
	//echo $province_name;
	mysqli_set_charset($link, "utf8");
	$sql_ads = "SELECT * FROM ads  WHERE (status='1') AND (title LIKE '%$search%' OR description LIKE '%$search%') AND 
province LIKE '%$province_name%' AND (SUBSTR(category_tree,1,1) LIKE '%$cat_number%') ORDER BY date DESC";
	if ($result_ads = mysqli_query($link, $sql_ads)) {
	if (mysqli_num_rows($result_ads) > 0) {	
		$row_all_pr_number = $result_ads->num_rows;
		$province_all_pr_name=$row_pr_array['province_name'];
		$data[] = array('province_id'=>$province_id,'province'=>$province_all_pr_name,'number'=>$row_all_pr_number);	
	}}
	
}}}
usort($data,'Desc');
if (!empty($data)) {
	echo '<p class="filter-title">استان:</p>';
	foreach($data as $value){
		echo '<div class="filter-item" id="filter-item-province-'.$value['province_id'].'">
			<span class="filter-province-name" id="filter-province-name-'.$value['province_id'].'">'.$value['province'].'</span>
			<span class="filter-number">&nbsp;('.$value['number'].')</span>				
		</div>';
	}
}
}
mysqli_close($link);

?>	
	</div> 
	<div class="filters">	
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
if ($category!=''){
	mysqli_set_charset($link, "utf8");
	$sql_cat_ads = "SELECT * FROM ads  WHERE (status='1') AND (title LIKE '%$search%' OR description LIKE '%$search%') AND 
province LIKE '%$province%' AND (SUBSTR(category_tree,1,1) LIKE '%$cat_number%') ORDER BY date DESC";
	if ($result_cat_ads = mysqli_query($link, $sql_cat_ads)) {
	if (mysqli_num_rows($result_cat_ads) > 0) {
		$row_cat_number = $result_cat_ads->num_rows;
		echo '<p class="filter-title">گروه:</p>
		<div class="filter-item filter-clicked" id="filter-item-category-clicked">
			<span>'.$category.'</span>
			<span class="filter-number filter-number-clicked">&nbsp;('.$row_cat_number.')</span>							
			<i class="fa fa-times remove-filter-item" aria-hidden="true"></i>							
		</div>';
	}}
} else {
	$data_cat=array();
	mysqli_set_charset($link, "utf8");		
	$sql_cat_array = "SELECT * FROM category WHERE parent is NULL ORDER BY id ASC";
	if ($result_cat_array = mysqli_query($link, $sql_cat_array)) { 	
	if (mysqli_num_rows($result_cat_array ) > 0) {		
	while ($row_cat_array = mysqli_fetch_array($result_cat_array)) {
		$cat_id_filter=$row_cat_array['id'];
		//echo $cat_id_filter;
		$cat_number_filter=$row_cat_array['number'];
		//echo $cat_number_filter.' - number<br/>';
		$cat_name_filter=$row_cat_array['name'];
		//echo $cat_name_filter.' - name<br/>';
		mysqli_set_charset($link, "utf8");
		$sql_all_cat_ads = "SELECT * FROM ads  WHERE (status='1') AND (title LIKE '%$search%' OR description LIKE '%$search%') AND 
		province LIKE '%$province%' AND (SUBSTR(category_tree,1,1) LIKE '%$cat_number_filter%') ORDER BY date DESC";
		if ($result_all_cat_ads = mysqli_query($link, $sql_all_cat_ads)) {
		if (mysqli_num_rows($result_all_cat_ads) > 0) {	
		$row_all_cat_number = $result_all_cat_ads->num_rows;
		//echo $row_all_cat_number.' - num_rows<br/>';
		$data_cat[] = array('category_id'=>$cat_id_filter,'category'=>$cat_name_filter,'number'=>$row_all_cat_number);
		}}		
}}}
usort($data_cat,'Desc');
if (!empty($data_cat)) {
	echo '<p class="filter-title">گروه:</p>';
	foreach($data_cat as $value){
		echo '<div class="filter-item" id="filter-item-category-'.$value['category_id'].'">
			<span class="filter-category-name" id="filter-category-name-'.$value['category_id'].'">'.$value['category'].'</span>
			<span class="filter-number">&nbsp;('.$value['number'].')</span>				
		</div>';
	}
}
}
mysqli_close($link);
?>

	
	</div> 
	<div class="button-clear-div mobile-tablet"> 
		<a href="agahi.php"><div class="button-clear">
		<span class="glyphicon glyphicon-erase"></span>
		پاک کردن
		</div></a>
	</div> 	
   </div> 	
</div> 

<script>
$('.filters-div') 
 .click( 
   function(){ 
   $('.filters').toggleClass('show');
   $('.all-filters').toggleClass('show');
   $(this).toggleClass('filter-changed');
   $('#filter-down').toggleClass('hide');
   $('#filter-up').toggleClass('show');
   $('.button-clear-div').toggleClass('show');
 });    
</script> 
<script>
$('.filter-item') 
 .click( 
   function(e){     
	ItemID=$(this).attr("id");
	var word='filter-item-';	
	var subfilter = ItemID.substr(ItemID.indexOf(word) + word.length);
	//alert('subfilter = '+subfilter);
	var filter_name=subfilter.substring(0,8);
	//alert(filter_name);
	var province='<?php echo $province?>';
	var category='<?php echo $category?>';
	var search='<?php echo $search?>';
	if ($(window).width() < 1280) {
		//alert('Less than 1280');
		
	}
	else {
		//alert('More than 1280');
	}
	if (filter_name=='province'){
		if (subfilter=='province-clicked'){
		window.location.href ='agahi.php?province=&category='+category+'&search='+search+'&page=1';
		} else {
			var subfilter_id = subfilter.substring(9);
			var filter_province_name=$('#filter-province-name-'+subfilter_id).text();
			//alert(filter_province_name);
			window.location.href ='agahi.php?province='+filter_province_name+'&category='+category+'&search='+search+'&page=1';
		}
	} else if (filter_name=='category'){
		if (subfilter=='category-clicked'){
			window.location.href ='agahi.php?province='+province+'&category=&search='+search+'&page=1';
		} else {
			var subfilter_id = subfilter.substring(9);
			var filter_category_name=$('#filter-category-name-'+subfilter_id).text();
			//alert(filter_province_name);
			window.location.href ='agahi.php?province='+province+'&category='+filter_category_name+'&search='+search+'&page=1';
		}
	} else {
		//alert('another filter');
	}
	//window.location.href ='agahi.php?province='+province+'&category='+category+'&table='+subcategory+'&search='+search+'&page=1';
	 	
 }); 
</script>
<div class="left">
	<div class="print_array">
<?php
	//print_r($data);
	//print_r($data_cat);
?>			 
	</div>
	<div class="left-ads">

</div>
</div>
</div>
<div class="footer">
</div>
<script>
	var limit=10;
	var offset=0;
	var busy = false;	
	
	var search='<?php echo $search ?>';
	var cat_number='<?php echo $cat_number ?>';
	var province='<?php echo $province ?>';
	
function displayRecords(s,lim,off) {
        $.ajax({
          type: "GET",
          async: false,
          url:'ajax/ajax-ads.php?search'+search+'&cat_number='+cat_number+'&province='+province+"&limit="+lim+"&offset=" + off,
          cache: false,
          beforeSend: function() {
          },
          success: function(html) {
			//alert(html);			
			//alert('limit = '+ lim + ", offset= " + off);
            $(".left-ads").append(html);
            window.busy = false;
          }
        });
}

</script>
<script>
$(document).ready(function() { 
	$(window).scroll(function() {
          // make sure u give the container id of the data to be loaded in.
          if ($(window).scrollTop() + $(window).height() > $(".left-ads").height() && !busy) {
				busy = true;
				offset = limit + offset;
	var return_num0 = function () {
    var tmp = null;
    $.ajax({
        'async': false,
        'type': "POST",
        'global': false,
        'dataType': 'html',
        'url': 'ajax/ads-quantity.php?search='+search+'&cat_number='+cat_number+'&province='+province,
        'beforeSend':function(){
			
		},
        'success': function (data) {
            var json_x = $.parseJSON(data);
			var num=json_x.num;
			tmp=num;
        }
    });
    return tmp;
}();
	var return_num = parseInt(return_num0); 
	//alert(return_num);
				if (return_num>=offset){
					displayRecords(search,limit,offset);
				} else {
					//alert('no more');
				}
            
          }
	}); 
});
</script>

<script>
$(document).ready(function() {
if (busy == false) {
  busy = true;
  // alert(busy);
  // start to load the first set of data  
	displayRecords(search,limit,offset);

}
});
$(document).ready(function() {
	$(".footer").load("load/footer.php");
});
</script>
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
    var containerLog = $("#user-menu");
    if (!containerLog.is(e.target) && containerLog.has(e.target).length === 0){
        containerLog.hide();
    }
});
$("#user-menu").click(function (e) {
    e.stopPropagation();
});
</script>

</body>
</html> 