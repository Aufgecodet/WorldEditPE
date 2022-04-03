<?php


namespace Aufgecodet\WorldEditPE\brush;


use Aufgecodet\WorldEditPE\brush\terraforming\CliffForm;
use pocketmine\block\VanillaBlocks;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerItemUseEvent;
use pocketmine\math\Vector3;

class BrushListener implements Listener{
    /**
     * @author  Aufgecodet
     * @version 1.0
     * @copyright
     */
    public function brushEvent(PlayerItemUseEvent $event){
        $player = $event->getPlayer();
        $targetBlock = $player->getTargetBlock(64);
        if($targetBlock === null) {
            return;
        }
         if(isset(Brush::$activate[$player->getName()])){


             if(Brush::$brushtype[$player->getName()] === "cube"){
                 $cube = new Cube($player->getInventory()->getItemInHand()->getBlock(),Brush::$brushsize[$player->getName()],$targetBlock->getPosition()->asVector3(),$player->getWorld(),$player);
                 $cube->populate();
             }if(Brush::$brushtype[$player->getName()] === "cliff"){
                 $cube = new CliffForm(VanillaBlocks::AIR(),$targetBlock->getPosition()->asVector3(),$player);
                 $cube->populate($player,$targetBlock->getPosition()->asVector3());
             }


         }
    } public function brushEventAir(PlayerInteractEvent $event){
    $player = $event->getPlayer();
    $targetBlock = $player->getTargetBlock(64);
    if($targetBlock === null) {
        return;
    }
    if(isset(Brush::$activate[$player->getName()])){
        if(Brush::$brushtype[$player->getName()] === "cube"){
            $cube = new Cube($player->getInventory()->getItemInHand()->getBlock(),Brush::$brushsize[$player->getName()],$targetBlock->getPosition()->asVector3(),$player->getWorld(),$player);
            $cube->populate();
        } if(Brush::$brushtype[$player->getName()] === "cliff"){
            $cube = new CliffForm(VanillaBlocks::AIR(),$targetBlock->getPosition()->asVector3(),$player);
            $cube->populate($player,$targetBlock->getPosition()->asVector3());
        }/*if(Brush::$brushtype[$player->getName()] === "sphere"){
            $cube = new Sphere($player->getInventory()->getItemInHand()->getBlock(),Brush::$brushsize[$player->getName()],$player->getWorld(),$targetBlock->getPosition()->asVector3(),$player);
            $cube->populate();
        }*/


    }
}
}