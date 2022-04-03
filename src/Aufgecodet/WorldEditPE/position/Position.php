<?php


namespace Aufgecodet\WorldEditPE\position;


use pocketmine\math\Vector3;
use pocketmine\player\Player;

class Position
{
    /**
     * @author  Aufgecodet
     * @version 1.0
     * @copyright
     */
    /** @var array */
    public static $pos1 = [];
    /** @var array */
    public static $pos2 = [];

    public static function setPositon(Player $player, Vector3 $vector3, int $type )
    {
        $x = floor($vector3->x);
        $y = floor($vector3->y);
        $z = floor($vector3->z);
        if ($type == 1) {
           self::$pos1[$player->getName() . "x"] = $x;
           self::$pos1[$player->getName() . "y"] = $y;
           self::$pos1[$player->getName() . "z"] = $z;

        }
      else  if ($type == 2) {
         self::$pos2[$player->getName() . "x"] = $x;
        self::$pos2[$player->getName() . "y"] = $y;
            self::$pos2[$player->getName() . "z"] = $z;

        }
    }

    public static function getPosition(string $cordinate, Player $player, int $type)
    {
        if($type === 1){
            if(empty(self::$pos1[$player->getName()."$cordinate"])){
                return null;
            }
        }  if($type === 2){
        if(empty(self::$pos1[$player->getName()."$cordinate"])){
            return null;
        }
    }
        if ($cordinate === "y") {
            if ($type === 1) {
                return self::$pos1[$player->getName() . "y"];
            }
            if ($type === 2) {
                return self::$pos2[$player->getName() . "y"];
            }
        }
        if ($cordinate === "x") {
            if ($type === 1) {
                return self::$pos1[$player->getName() . "x"];
            }
            if ($type === 2) {
                return self::$pos2[$player->getName() . "x"];
            }
        }
        if ($cordinate === "z") {
            if ($type === 1) {
                return self::$pos1[$player->getName() . "z"];
            }
            if ($type === 2) {
                return self::$pos2[$player->getName() . "z"];
            }
        }
    }

    public static function unsetPosition(Player $player)
    {
        foreach (self::$pos1 as $value => $item) {
            $a = strpos($value, $player->getName());
            if ($a === true) {
                unset(self::$pos1[$value]);
            }

            foreach (self::$pos2 as $value => $item) {
                $a = strpos($value, $player->getName());
                if ($a === true) {
                    unset(self::$pos2[$value]);
                }
            }

        }
    }
}