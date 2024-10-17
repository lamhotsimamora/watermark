<?php 

namespace Lamhotsimamora\Watermark;


class WatermarkBuilder 
{
    private $watermarkImage;
    private $image;

    public function loadWatermark($value){
        $this->watermarkImage = $value;
    }

    public function loadImage($value){
        $this->image = $value;
    }

    public function processing(){
        $watermark = imagecreatefrompng($this->watermarkImage);
        $image = imagecreatefrompng($this->image);

        // Set the margins for the watermark and get the height/width of the watermark image
        $marge_right = 0;
        $marge_bottom = 0;
        $sx = imagesx($watermark);
        $sy = imagesy($watermark);

        // Copy the watermark image onto our photo using the margin offsets and the photo 
        // width to calculate positioning of the watermark. 
        imagecopy($image, $watermark, 
                    imagesx($image) - $sx - $marge_right, 
                    imagesy($image) - $sy - $marge_bottom, 0, 0, 
                    imagesx($watermark), 
                    imagesy($watermark));

        // Output and free memory
        header('Content-type: image/png');
        imagepng($image);
        imagedestroy($image);
    }
}
