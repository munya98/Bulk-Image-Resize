<?php

namespace Zozo\Classes;
use Intervention\Image\ImageManager as Image;

class Zozo {


	private $location;
	private $manager;
	private $height;
	private $width;

	public function __construct(Image $manager, $location)
	{
		$this->manager = $manager;
		$this->location = $location;
	}

	public function images(){
		$files = glob("$this->location\*.{jpg,png}", GLOB_BRACE);
		return $files;
	}

	//Set the height
	public function setHeight(int $height = 50){

		if ($height < 50) {
			die("Height provided is too low... Exiting now");
		}else if($height > 3840){
			die("Height provided is too high... Exiting now");
		}else{
			$this->height = $height;
		}

	}

	//Set the width
	public function setWidth(int $width = 50){
		if ($width < 50) {
			die("Width provided is too low... Exiting now");
		}else if($width > 2160){
			die("Width provided is too high... Exiting now");
		}else{
			$this->width = $width;
		}

	}

	/**	Resize an image
	*	@param img
	*/
	public function resize($img){
		$image = $this->manager->make($img)->resize($this->height, $this->width);
		$image->save($img, 100);
	}
}
