<?php


namespace Aufgecodet\WorldEditPE\image;


use pocketmine\block\Block;
use pocketmine\block\BlockFactory;

class Image{
    /** @var string */
    public $name = "image";
    /**
     * @author  Aufgecodet
     * @version 1.0
     * @copyright
     */
    public function __construct(string $name){

    }
    public function transRGBInBlock(int $r,int $g,int $b):Block{
        if($r === 128 ){
            $block = BlockFactory::getInstance()->get(251,14);
            return $block;
        }    if($r === 139 ){
            $block = BlockFactory::getInstance()->get(251,14);
            return $block;
        }  if($r === 165 and $g === 42 and $b = 42){
            $block = BlockFactory::getInstance()->get(252,14);
            return $block;
        }if($r === 165 and $g === 42 and $b = 42){
            $block = BlockFactory::getInstance()->get(252,14);
            return $block;
        }if($r === 220 and $g === 20 and $b = 60){
            $block = BlockFactory::getInstance()->get(252,14);
            return $block;
        }if($r === 255 and $g === 0 and $b = 0){
            $block = BlockFactory::getInstance()->get(35,14);
            return $block;
        }if($r === 255 and $g === 99 and $b = 71){
            $block = BlockFactory::getInstance()->get(35,14);
            return $block;
        }if($r === 255 and $g === 127 and $b = 80){
            $block = BlockFactory::getInstance()->get(35,14);
            return $block;
        }if($r === 255 and $g === 99 and $b = 128){
            $block = BlockFactory::getInstance()->get(35,14);
            return $block;
        }
    }
    public function resizeImage(){
        $original = imagecreatefromjpeg ($this->name.".jpg");
        $resized = imagecreatetruecolor (100,100 );
        $size = getimagesize($original);
        $w = $size[0];
        $h = $size[1];
        imagecopyresampled($resized, $original, 0, 0, 0, 0, 100, 100, WIDTH, HEIGHT);
        imagejpeg($resized, "RESIZED.jpg");
    }
}