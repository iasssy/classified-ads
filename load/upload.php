<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
session_start();
$user_id=$_SESSION['user_id'];
$error_string='';
$error_string_en='';
$number=$_GET['number'];
if (!file_exists("../users/")) {
					mkdir("../users", 0755);
				}	
if (!file_exists("../users/".$user_id)) {
					mkdir("../users/".$user_id, 0755);
				}	
if (!file_exists("../users/".$user_id."/temp")) {
					mkdir("../users/".$user_id."/temp", 0755);
				}
$max_post_size = ini_get('post_max_size');				
$content_length = $_SERVER['CONTENT_LENGTH'] / 1024 / 1024;
if ($content_length > $max_post_size ) 
{
  $error_string=$error_string. ' ' ."حجم این عکس خیلی زیاد است. بیشترین حجم مجاز ۵ مگا بایت می باشد.";		//File too large!
  $error_string_en=$error_string_en. ' ' ."File too large!";		//File too large!
} else {

$target_dir = '../users/'.$user_id.'/temp/';
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$data_error=array();
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $data_error[]="File is not an image.";
		$error_string=$error_string. ' ' ."این فایل عکس نمی باشد.";		//File is not an image.
		$error_string_en=$error_string_en. ' ' ."File is not an image.";		//File is not an image.
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
   // echo "Sorry, file already exists.";
    $data_error[]="Sorry, file already exists.";
	$error_string=$error_string. ' ' ."این عکس وجود دارد.";	//Sorry, file already exists.
	$error_string_en=$error_string_en. ' ' ."Sorry, file already exists.";	//Sorry, file already exists.
    $uploadOk = 0;
} 
// Check file size
if ($_FILES["file"]["size"] > 5000000) {
	$data_error[]="Sorry, your file is too large.";
	$error_string=$error_string. ' ' ."حجم این عکس خیلی زیاد است.";	//Sorry, your file is too large.
	$error_string_en=$error_string_en. ' ' ."Sorry, your file is too large.";	//Sorry, your file is too large.
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   // echo "Sorry, your file was not uploaded.";
   $data_error[]="Sorry, your file was not uploaded.";
   $error_string=$error_string . ' ' ."عکس بارگذاری نشد.";		//Sorry, your file was not uploaded.
   $error_string_en=$error_string_en . ' ' ."Sorry, your file was not uploaded.";		//Sorry, your file was not uploaded.
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
		$name=basename($_FILES["file"]["name"]);	
		$extension = pathinfo($name, PATHINFO_EXTENSION);
		//echo $extension;
		//echo $target_dir . basename($_FILES["file"]["name"]);
		$random=rand(10000, 99999);
		$NewName = $number.'img'.$random.'.'.$extension; 	
		//include('smart_resize_image.function.php');
		//echo $target_file;
		
		
		
		
		function smart_resize_image($file,
                              $width              = 0, 
                              $height             = 0, 
                              $proportional       = false, 
                              $output             = 'file', 
                              $delete_original    = true, 
                              $use_linux_commands = false ) {
      
    if ( $height <= 0 && $width <= 0 ) return false;
    # Setting defaults and meta
    $info                         = getimagesize($file);
    $image                        = '';
    $final_width                  = 0;
    $final_height                 = 0;
    list($width_old, $height_old) = $info;
    # Calculating proportionality
    if ($proportional) {
      if      ($width  == 0)  $factor = $height/$height_old;
      elseif  ($height == 0)  $factor = $width/$width_old;
      else                    $factor = min( $width / $width_old, $height / $height_old );
      $final_width  = round( $width_old * $factor );
      $final_height = round( $height_old * $factor );
    }
    else {
      $final_width = ( $width <= 0 ) ? $width_old : $width;
      $final_height = ( $height <= 0 ) ? $height_old : $height;
    }
    # Loading image to memory according to type
    switch ( $info[2] ) {
      case IMAGETYPE_GIF:   $image = imagecreatefromgif($file);   break;
      case IMAGETYPE_JPEG:  $image = imagecreatefromjpeg($file);  break;
      case IMAGETYPE_PNG:   $image = imagecreatefrompng($file);   break;
      default: return false;
    }
    
    
    # This is the resizing/resampling/transparency-preserving magic
    $image_resized = imagecreatetruecolor( $final_width, $final_height );
    if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
      $transparency = imagecolortransparent($image);
      if ($transparency >= 0) {
        $transparent_color  = imagecolorsforindex($image, $trnprt_indx);
        $transparency       = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
        imagefill($image_resized, 0, 0, $transparency);
        imagecolortransparent($image_resized, $transparency);
      }
      elseif ($info[2] == IMAGETYPE_PNG) {
        imagealphablending($image_resized, false);
        $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
        imagefill($image_resized, 0, 0, $color);
        imagesavealpha($image_resized, true);
      }
    }
    imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);
    
    # Taking care of original, if needed
    if ( $delete_original ) {
      if ( $use_linux_commands ) exec('rm '.$file);
      else @unlink($file);
    }
    # Preparing a method of providing result
    switch ( strtolower($output) ) {
      case 'browser':
        $mime = image_type_to_mime_type($info[2]);
        header("Content-type: $mime");
        $output = NULL;
      break;
      case 'file':
        $output = $file;
      break;
      case 'return':
        return $image_resized;
      break;
      default:
      break;
    }
    
    # Writing image according to type to the output destination
    switch ( $info[2] ) {
      case IMAGETYPE_GIF:   imagegif($image_resized, $output);    break;
      case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output);   break;
      case IMAGETYPE_PNG:   imagepng($image_resized, $output);    break;
      default: return false;
    }
    return true;
  }
		smart_resize_image($target_file,
                              $width              = 1280, 
                              $height             = 792, 
                              $proportional       = true, 
                              $output             = $target_file, 
                              $delete_original    = true, 
                              $use_linux_commands = false );
							  
		$full_local_path ='../users/'.$user_id.'/temp/'.$NewName;		
		rename($target_dir . basename($_FILES["file"]["name"]),$full_local_path);
			
    } else {
       // echo "Sorry, there was an error uploading your file.";
       $data_error[]="Sorry, there was an error uploading your file.";
	   $error_string=$error_string. ' ' ."در هنگام بارگذاری خطایی رخ داده است.";	//Sorry, there was an error uploading your file.
	   $error_string_en=$error_string_en. ' ' ."Sorry, there was an error uploading your file.";
    }
}

}
	$return['image_path'] =$full_local_path;
	$return['number'] = $number;
	$return['error_string'] =$error_string;
	$return['error_string_en'] =$error_string_en;
	echo json_encode($return);
?>