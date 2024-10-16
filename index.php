<?php 

require_once 'vendor/autoload.php';

use Lamhotsimamora\Watermark\WatermarkBuilder;

$watermark = new WatermarkBuilder();

// watermark and image must be png format
$watermark->loadWatermark('images/watermark.png');
$watermark->loadImage('images/car.png');

echo $watermark->processing();
