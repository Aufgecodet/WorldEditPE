<?php

namespace Aufgecodet\WorldEditPE\commands;


use Aufgecodet\CityBuild\Loader;
use Aufgecodet\WorldEditPE\filler\Filler;
use Aufgecodet\WorldEditPE\Main;
use Aufgecodet\WorldEditPE\message\Messages;
use pocketmine\block\Block;
use pocketmine\block\BlockFactory;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use Aufgecodet\WorldEditPE\position\Position;
use pocketmine\lang\Translatable;
use pocketmine\math\Vector3;
use pocketmine\player\Player;

class FillCommand extends Command
{
    /**
     * @author  Aufgecodet
     * @version 1.0
     * @copyright
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $player = $sender;
        if($player instanceof Player){
            if(!$sender->hasPermission(Main::getInstance()->getConfig()->get("perm")) and !$sender->getServer()->isOp($sender->getName())){
                return;
            }
            if(empty($args[0])){
                $sender->sendMessage("§cError! Usage: /fill (id:meta)");
                return;
            }
            if(strpos($args[0],":") === false){
                $sender->sendMessage("§cError! Usage: /fill (id:meta)");
                return;
            }





            $x = floor($player->getPosition()->asVector3()->x);
            $y = floor($player->getPosition()->asVector3()->y);
            $z = floor($player->getPosition()->asVector3()->z);
            $pos = new Position();
            $a = microtime(true);
            list($id_1, $id_2) = explode(":", $args[0]);
            if(is_int($id_1) === false and is_int($id_2)){
                $sender->sendMessage("§cError! Usage: /fill (id:meta)");
                return;
            }
            $filler = new Filler(new Vector3($pos->getPosition("x", $player, 1), Position::getPosition("y", $player, 1), Position::getPosition("z", $player, 1)), new Vector3(Position::getPosition("x", $player, 2), Position::getPosition("y", $player, 2), Position::getPosition("z", $player, 2)), $player->getWorld(),BlockFactory::getInstance()->get($id_1,$id_2),$player);

            $filler->run();
            $b = microtime(false);

            $player->sendMessage(Main::getInstance()->prefix . " §7Filled §3" . Filler::$count . "§e Blocks §7");


        }
    }

    /** Register */
    public function __construct()
    {
        parent::__construct("fill");
        $this->setAliases(["fill","set"]);
        $this->setDescription("Fill a area");
    }



}
