<?php


namespace WebDevelopAgat;

use Yii;
use yii\base\Exception;

class FillColorPng
{
    private $imagePath;
    private $image;

    public function __construct($imagePath)
    {
        $this->imagePath = $imagePath;
        if (!file_exists($this->imagePath)) {
            throw new Exception('File not exists: ' . $this->imagePath);
        }
    }

    public function setColor($color)
    {
        $color = str_replace('#', '', $color);
        $colorRgbR = hexdec(substr($color, 0, 2));
        $colorRgbG = hexdec(substr($color, 2, 2));
        $colorRgbB = hexdec(substr($color, 4, 2));

        list($width, $height) = getimagesize($this->imagePath);

        $this->image = imagecreatetruecolor($width, $height);

        imageSaveAlpha($this->image, true);

        $t_color = imagecolorallocate($this->image,$colorRgbR, $colorRgbG, $colorRgbB);

        imagefill($this->image, 0, 0, $t_color);

        $image = imagecreatefrompng($this->imagePath);

        imagesavealpha($image, true);

        imagecopy(
            $this->image, $image, 0, 0, 0, 0,
            $width, $height
        );
        imagedestroy($image);
        return $this;
    }

    public function save($filePath = null)
    {
        imagepng($this->image, $filePath);
        imagedestroy($this->image);
    }
}