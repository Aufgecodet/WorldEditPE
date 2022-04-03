<?php


namespace Aufgecodet\WorldEditPE\brush;


use pocketmine\block\Block;
use pocketmine\item\Item;
use pocketmine\player\Player;

class Brush{

    /**
     * @author  Aufgecodet
     * @version 1.0
     * @copyright
     */
    /** @var array */
public static $brushsize = [];
/** @var array  */
public static $brushblock = [];
/** @var array  */
public static $brushtype = [];

    public function __construct(Player $player,int $size, string $type){
       self::$brushsize[$player->getName()] = $size;

       self::$brushtype[$player->getName()] = $type;
    }
    /** @var array */
public static $activate = [];
    public function activate(Player $player)
    {
         self::$activate[$player->getName()] = $player->getName();
    }
    public function deactivate(Player $player){
        if(isset(self::$activate[$player->getName()])){
            self::$activate[$player->getName()] = $player->getName();
        }
    }
}