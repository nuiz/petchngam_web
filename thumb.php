<?php
/**
 * Created by PhpStorm.
 * User: Papangping
 * Date: 6/29/14
 * Time: 9:39 PM
 */

// The file
$filename = $_GET['url'];

// Content type

$path = 'thumb/'.urlencode($filename);

if(!file_exists($path)){
    list($width, $height) = getimagesize($filename);
    $percent = 1;
    if($width > $height*(2/3)){
        $percent = 120/$width;
    }
    else {
        $percent = 80/$height;
    }

    $new_width = $width * $percent;
    $new_height = $height * $percent;

    $image_p = imagecreatetruecolor($new_width, $new_height);
    $image = imagecreatefromjpeg($filename);
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    // image resource to string
    // in variable source
    ob_start();
    imagejpeg($image_p, null, 100);
    $source = ob_get_contents();
    ob_end_clean();
    // end image resource to string

    $fp = fopen($path, "w");
    fwrite($fp, $source);
    fclose($fp);
}

$fp = fopen($path, "r");
$source = fread($fp, filesize($filename));
fclose($fp);

header('Content-type: image/jpeg');
echo $source;