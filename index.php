<?php
require_once 'vendor/autoload.php';
use Zozo\Classes\Zozo;
use Intervention\Image\ImageManager;


// Example: php index.php [location]img [height]500 [width]500
// Full Command: php index.php images 500 500
$location = $argv[1];
$height = $argv[2];
$width = $argv[3];


// $location = "img"; //Relative folder called img
// $height = 500; //Height for the Image
// $width = 500; //Width for the Image


if (!file_exists($location)) {
	die("The location provided does not exist");
}
//Initialize ImageManager with gd because Imagick is a pain to install and gd seems to work fine
$manager = new ImageManager(array('driver' => 'gd'));

//Give Zozo an instance of manager and the location of the images
$zozo = new Zozo($manager, $location);
$zozo->setHeight($height);
$zozo->setWidth($width);


//Get The Collection of Images
$collection = $zozo->images();
//Resize the images
foreach ($collection as $img) {
	echo "$img" . " resized" . "\n\n" ;
	$zozo->resize($img, $height, $width);
}

echo "Hi... Done";
