<?php


namespace Aufgecodet\WorldEditPE\brush;


use Aufgecodet\WorldEditPE\undo\Undo;
use pocketmine\block\Block;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use pocketmine\world\World;

class Cube{

    /**
     * @author  Aufgecodet
     * @version 1.0
     * @copyright
     */
    /** @var int */
    public $size = 5;

    /** @var Block */
    public $block;
    /** @var Vector3 */
    public $vector3;
    /** @var World */
    public $world;
    /** @var Player*/
    public $player;
    public function __construct(Block $block,int $size = null,Vector3 $vector3,World $world,Player $player)
    {
        $this->size = $size;
        $this->player = $player;
        $this->block = $block;
        $this->vector3 = $vector3;
        $this->world = $world;
    }
    public function populate(){
        Undo::resetAAll($this->player);
        for($y = $this->vector3->y;$y < $this->vector3->y + $this->size ;$y++){
            for($x = $this->vector3->x;$x < $this->vector3->x + $this->size;$x++){
                for($z = $this->vector3->z; $z < $this->vector3->z + $this->size;$z++){
                    if($y < 1){
                        return;
                    }
                    Undo::saveBloks(new Vector3($x,$y,$z),$this->world,$this->player);
                    $this->world->setBlockAt($x,$y,$z,$this->block);
                }
            }
        }
    }
}