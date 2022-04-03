<?php


namespace Aufgecodet\WorldEditPE\commands;


use Aufgecodet\CityBuild\Loader;
use Aufgecodet\WorldEditPE\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;

class ClearInventoryCommand extends Command{
    /**
     * @author  Aufgecodet
     * @version 1.0
     * @copyright
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player){
            if (!$sender->hasPermission(Main::getInstance()->getConfig()->get("perm")) and !$sender->getServer()->isOp($sender->getName())) {
                return;
            }
            $sender->getInventory()->clearAll();
            $sender->sendMessage(Main::getInstance()->prefix." §7Cleared §3Inventory§7!");
        }
    }
    public function __construct()
    {
        parent::__construct("clearinv");
        $this->setAliases(["cinv"]);
        $this->setDescription("Clearinventory");
    }
}