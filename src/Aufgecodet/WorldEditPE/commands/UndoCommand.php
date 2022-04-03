<?php


namespace Aufgecodet\WorldEditPE\commands;


use Aufgecodet\CityBuild\Loader;
use Aufgecodet\WorldEditPE\undo\Undo;
use Aufgecodet\WorldEditPE\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;

class  UndoCommand extends Command{
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

            Undo::undo($sender);
            $sender->sendMessage(Main::getInstance()->prefix . " §7Undo §3" . Undo::$counter . " §6blocks");
            Undo::resetAAll($sender);
        }
    }
    public function __construct()
    {
        parent::__construct("undo");
    }
}