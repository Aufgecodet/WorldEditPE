<?php


namespace Aufgecodet\WorldEditPE\undo;


use pocketmine\block\BlockFactory;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use Aufgecodet\WorldEditPE\position\Position;
use pocketmine\world\World;

class Undo {
    /**
     * @author  Aufgecodet
     * @version 1.0
     * @copyright
     */
    /** @var array  */
    public static $undo =[];
    public function __construct()
    {
    }

    public static function saveBloks(Vector3 $vector3,World $world,Player $player){
        $x =floor($vector3->x);
        $y = floor($vector3->y);
        $z = floor($vector3->z);

        self::$undo[$x.":".$y.":".$z.":".$player->getName()] = $world->getBlockAt($vector3->x,$vector3->y,$vector3->z)->getId().":".$world->getBlockAt($vector3->x,$vector3->y,$vector3->z)->getMeta();

    }
    public static function resetAAll(Player $player){
       foreach (self::$undo as $item => $item){
           unset(self::$undo[$item]);
       }
    }
    public static function undo(Player $player){
        $a = 0;

        foreach (self::$undo as $item => $value) {
            list($id_1,$id_2,$id_3,$finalplayer) = explode(":",$item);
            list($id,$meta) = explode(":",$value);
            if($finalplayer !== $player->getName()){
                return false;
            }
            $block = BlockFactory::getInstance()->get($id,$meta);
            $player->getWorld()->setBlockAt($id_1,$id_2,$id_3,$block);
            $a++;


        }
        unset(self::$undo[$player->getName()]);
        self::$counter =  $a;
    }
    /** @var int */
    public static $counter = 0;
}