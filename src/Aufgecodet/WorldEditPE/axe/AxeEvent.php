<?php

declare(strict_types = 1);
namespace Aufgecodet\WorldEditPE\axe;


use Aufgecodet\CityBuild\Loader;
use Aufgecodet\WorldEditPE\position\Position;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerItemUseEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\item\ItemIds;
use Aufgecodet\WorldEditPE\Main;

use pocketmine\math\Vector3;
class AxeEvent implements Listener{
    /**
     * @author  Aufgecodet
     * @version 1.0
     * @copyright
     */
    /** @var bool */
    public static $cooldown = false;
    public function onBreak(BlockBreakEvent $event){
     /** Secound position */
        $player = $event->getPlayer();
        $block = $event->getBlock();
        $item = $player->getInventory()->getItemInHand();
        if(self::$cooldown === true){
            return;
        }

        if($item->getId() == ItemIds::WOODEN_AXE){
            if(!$player->hasPermission(Loader::getInstance()->getConfig()->get("perm")) and !$player->getServer()->isOp($player->getName())){
                return;
            }   $event->cancel();
            self::$cooldown = true;
            $pos = new Position();
            $x = floor($block->getPosition()->asVector3()->x);
            $y = floor($block->getPosition()->asVector3()->y);
            $z = floor($block->getPosition()->asVector3()->z);
            $player->sendMessage(Main::getInstance()->prefix." §7You have been set §6pos1 §7at §a ".$x.";".$y.";$z");
            Position::setPositon($player,new Vector3($x,$y,$z),2);
             Main::getInstance()->getScheduler()->scheduleRepeatingTask(new CooldownTask(),3);
            self::$cooldown = true;
            return;
        }

        }
        /*
        public function onMove(PlayerMoveEvent $event){

        $player = $event->getPlayer();

            switch ($player->getDirectionVector()->getSide(1)){

                case 1:
                    $direction = "east";
                    $event->getPlayer()->sendPopup("§eDirtection §a".$direction);
                    break;
                case 2:
                    $direction = "south";
                    $event->getPlayer()->sendPopup("§eDirtection §a".$direction);
                    break;
                case 3:
                    $direction = "west";
                    $event->getPlayer()->sendPopup("§eDirtection §a".$direction);

                    break;
                case 4 :
                    $direction = "north";
                    $event->getPlayer()->sendPopup("§eDirtection §a".$direction);

                    break;
                default:
                    $direction = "no";
                    $event->getPlayer()->sendPopup("§eDirtection §a".$direction);
                    break;
            }
        }*/
        public function onInteract(PlayerInteractEvent $event)
        {
            /** First Position*/
            $player = $event->getPlayer();
            $item = $player->getInventory()->getItemInHand();
            $block = $event->getBlock();
            $sender = $player;

            if($event->getAction() !== PlayerInteractEvent::RIGHT_CLICK_BLOCK){
                return true;
            }
            if(self::$cooldown === true){
                return;
            }
            if ($item->getId() == ItemIds::WOODEN_AXE) {


                if (!$sender->hasPermission(Loader::getInstance()->getConfig()->get("perm")) and !$sender->getServer()->isOp($sender->getName())) {
                    return;
                }       self::$cooldown = true;
                $event->cancel();
                $pos = new Position();
                $x = floor($player->getPosition()->asVector3()->x);
                $y = floor($player->getPosition()->asVector3()->y);
                $z = floor($player->getPosition()->asVector3()->z);


                Position::setPositon($player, new Vector3($x, $y, $z), 1);

                $player->sendMessage(Main::getInstance()->prefix . " §7You have been set §6pos2 §7at §a " . $x . ";" . $y . ";$z");
                Main::getInstance()->getScheduler()->scheduleRepeatingTask(new CooldownTask(),3);
                return false;
            }
        }
}