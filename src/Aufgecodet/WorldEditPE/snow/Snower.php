<?php


namespace Aufgecodet\WorldEditPE\snow;


use Aufgecodet\WorldEditPE\area\Area;
use pocketmine\block\VanillaBlocks;
use pocketmine\item\ItemIds;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use pocketmine\world\World;

class Snower {
    /** @var Player */
    public $player;
    /** @var World */
    public $world;
    /** @var Vector3 */
    public $pos1;
    /** @var Vector3 */
    public $pos2;
    /** @var int */
    public static $count = 0;
  public function __construct(Player $player,Vector3 $pos1,Vector3 $pos2)
  {
      $this->player = $player;
      $this->world = $player->getWorld();
      $this->pos1 = $pos1;
      $this->pos2 = $pos2;
  }
  public function populate(){
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
      self::$count = 0;
      $area = new Area($this->player,$this->pos1,$this->pos2);
      foreach ($area->getTerrain() as $value => $item){
          list($x,$y,$z) = explode(":",$value);
          if($this->world->getBlockAt($x,$y,$z)->getId() !== 0){
              if($this->world->getBlockAt($x,$y +1,$z)->getId() === 0) {
                  if($this->world->getBlockAt($x,$y,$z)->isSolid()) {
                      $this->world->setBlockAt($x, $y + 1, $z, VanillaBlocks::SNOW_LAYER());
                  }
              }
              if($this->world->getBlockAt($x,$y,$z)->getId() === ItemIds::WATER or $this->world->getBlockAt($x,$y,$z)->getId() === ItemIds::FLOWING_WATER or $this->world->getBlockAt($x,$y,$z)->getId() === ItemIds::STILL_WATER ){
                  $this->world->setBlockAt($x,$y,$z,VanillaBlocks::BLUE_ICE());
              }
              $a++;


          }
          self::$count = $a;
      }



      self::$count = $a;
  }
}