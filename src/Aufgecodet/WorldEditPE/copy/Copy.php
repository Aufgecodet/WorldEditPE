<?php


namespace Aufgecodet\WorldEditPE\copy;

use Aufgecodet\WorldEditPE\area\Area;
use Aufgecodet\WorldEditPE\Main;
use Aufgecodet\WorldEditPE\undo\Undo;
use pocketmine\block\Block;
use pocketmine\block\BlockFactory;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use Aufgecodet\WorldEditPE\position\Position;
use pocketmine\world\World;

class Copy  {
    public function getCopyContent(Player $player):array{
        $arr = [];
        foreach (self::$copy[$player->getName()] as $value => $item){
            $arr[$value] = $item;
        }
        return $arr;
    }
    /** @var array  */
    public static $copy = [];
    /** @var Vector3 */
    public $pos1;
    /** @var Vector3 */
    public $pos2;
    /** @var Player */
    public $player;
    /** @var World */
    public $world;
    public function paste(Player $player)
    {
        $a = 0;

        foreach ($this->getCopyContent($player) as $value => $item){

            list($x,$y,$z) = explode(":",$value);
            list($id,$meta) = explode(":",$item);
                  $d = $player->getPosition()->asVector3()->getX() -intval($x);
                  $e = $player->getPosition()->asVector3()->getY() -intval($y);
                  $f = $player->getPosition()->asVector3()->getZ() -intval($z);
                  $player->getWorld()->setBlockAt($d,$e,$f,BlockFactory::getInstance()->get($id,$meta));
                  if(isset(self::$copy[$player->getName()])) {
                      unset(self::$copy[$player->getName()]);
                  }

                }
self::$count = $a;
            }






    /** @var array  */
    public  $max = [];
    public function saveAll(Player $player){
          $pos1x = Position::getPosition("x",$player,1);
        $pos1y = Position::getPosition("y",$player,1);
        $pos1z = Position::getPosition("z",$player,1);
        $pos2x = Position::getPosition("x",$player,2);
        $pos2y = Position::getPosition("y",$player,2);
        $pos2z = Position::getPosition("z",$player,2);
        $this->pos1 = new Vector3($pos1x,$pos1y,$pos1z);
        $this->pos2 = new Vector3($pos2x,$pos2y,$pos2z);
        $a = 0;
        $world = $player->getWorld();

        $x2 = 0;
        $y2 = 0;
        $z2 = 0;
        //
        $arr = [];
        $x = floor($this->pos1->x);
        $y = floor($this->pos1->y);
        $z = floor($this->pos1->z);
        $x2 = floor($this->pos2->x);
        $y2 = floor($this->pos2->y);
        $z2 = floor($this->pos2->z);
        $a = 0;
        $k = $y;
        $t = $z;
        $u = $x;





        $area = new Area($this->player,$this->pos1,$this->pos2);
        self::$copy[$player->getName()] = array();
        foreach ($area->getTerrain() as $value => $item){

            list($x,$y,$z) = explode(":",$value);
            if($pos1x < $pos2x){
                $a = $pos2x - $x;
            }
            else{
                $a = $pos1x - $x;
            } if($pos1y < $pos2y){
                $b = $pos2y - $y;
            }
            else{
                $b = $pos1y - $y;
            } if($pos1z < $pos2z){
                $c = $pos2z - $z;
            }
            else{
                $c = $pos1z - $z;
            }

            $block = $player->getWorld()->getBlockAt($x,$y,$z)->getId();
            $blockmeta = $player->getWorld()->getBlockAt($x,$y,$z)->getMeta();
            $a = $x ;
           self::$copy[$player->getName()] = array("$a:".":$b".":".$c => $block.":".$blockmeta);
            $a++;
        }
        self::$count = $a;
    }
    public function __construct(Player $player){
        $this->player = $player;
        $this->world = $player->getWorld();
    }
    /** @var int */
    public static $count = 0;
}