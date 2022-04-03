<?php


namespace Aufgecodet\WorldEditPE\commands;


use Aufgecodet\CityBuild\Loader;
use Aufgecodet\WorldEditPE\copy\Copy;
use Aufgecodet\WorldEditPE\Main;
use Aufgecodet\WorldEditPE\position\Position;
use czechpmdevs\buildertools\editors\Copier;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;
class CopyCommand extends Command{
    /**
     * @author  Aufgecodet
     * @version 1.0
     * @copyright
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player) {
            if (!$sender->hasPermission(Main::getInstance()->getConfig()->get("perm")) and !$sender->getServer()->isOp($sender->getName())) {
                return;
            }
            if(Position::getPosition("x",$sender,1) === null){
                $sender->sendMessage(Main::getInstance()->prefix." §7You have not §3marked §7a §6position!");
                return;
            } if(Position::getPosition("x",$sender,2) === null){
                $sender->sendMessage(Main::getInstance()->prefix." §7You have not §3marked §7a §6position!");
                return;
            }
            $copy = new Copy($sender);
            $copy->saveAll($sender);
            $sender->sendMessage(Main::getInstance()->prefix." Copied §6".Copy::$count." §3Blocks");
        }
    }
    public function __construct()
    {
        parent::__construct("copy");
    }
}