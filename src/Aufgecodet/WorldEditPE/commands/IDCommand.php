<?php


namespace Aufgecodet\WorldEditPE\commands;


use Aufgecodet\CityBuild\Loader;
use Aufgecodet\WorldEditPE\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;

class IDCommand extends Command{
    /**
     * @author  Aufgecodet
     * @version 1.0
     * @copyright
     */
    public  function __construct()
    {
        parent::__construct("id");
        $this->setDescription("See a id from a item");
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if (!$sender->hasPermission(Main::getInstance()->getConfig()->get("perm")) and !$sender->getServer()->isOp($sender->getName())) {
            return;
        }
        if ($sender instanceof Player) {
            $item = $sender->getInventory()->getItemInHand();
            $sender->sendMessage(Main::getInstance()->prefix . " §3Id: §6".$item->getId()." §3Meta: §6".$item->getMeta());
        }
    }
}