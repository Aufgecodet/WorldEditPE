<?php


namespace Aufgecodet\WorldEditPE\brush\terraforming;


use Aufgecodet\WorldEditPE\brush\Brush;
use pocketmine\block\Block;
use pocketmine\block\VanillaBlocks;
use pocketmine\math\Vector3;
use pocketmine\player\Player;

class CliffForm {
    /** @var Player */
    public $player;
    /** @var Vector3 */
    public $vector3;
    /** @var Block */
    public $block;
    public function populate(Player $player,Vector3 $vector3):void{
        $this->player = $player;
        $this->vector3 = $vector3;


        if($vector3->y < 1){
            return;
        }
        $player->getWorld()->setBlockAt($this->vector3->x ,$this->vector3->y,$this->vector3->z ,$this->block);

        $player->getWorld()->setBlockAt($this->vector3->x +1 ,$this->vector3->y,$this->vector3->z +1 ,$this->block);
    }
    public function __construct(Block $block,Vector3 $vector3,Player $player){
        $this->block  = VanillaBlocks::AIR();
        $this->vector3 = $vector3;
        $this->player = $player;
    }

}