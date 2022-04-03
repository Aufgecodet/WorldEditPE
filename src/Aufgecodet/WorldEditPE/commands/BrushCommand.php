<?php


namespace Aufgecodet\WorldEditPE\commands;

use Aufgecodet\CityBuild\Loader;
use Aufgecodet\WorldEditPE\brush\Brush;
use Aufgecodet\WorldEditPE\brush\Cube;
use Aufgecodet\WorldEditPE\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;
class BrushCommand extends Command{
    /**
     * @author  Aufgecodet
     * @version 1.0
     * @copyright
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $player = $sender;

        if ($player instanceof Player) {
            if (!$sender->hasPermission(Main::getInstance()->getConfig()->get("perm")) and !$sender->getServer()->isOp($sender->getName())) {
                return;
            }
            if (empty($args[0])) {
                $sender->sendMessage("§cError! Usage: /brush (type) (size)");
                return;
            }
            if(empty($args[1]) and $args[0] !== "off"){
                return;
            }


            if($args[0] === "off"){
                if(isset(Brush::$activate[$player->getName()])){
                  unset(Brush::$activate[$player->getName()]);
                }
                $player->sendMessage(Main::getInstance()->prefix." §3Brushtool §4deactivated!");
                return;
            }
            $brush = new Brush($sender,$args[1],$args[0]);
            $brush->activate($player);
            $player->sendMessage(Main::getInstance()->prefix." §3Brushtool §aaktivated");

        }
    }
    public function __construct()
    {
        parent::__construct("brush","Brush tool");
    }
}