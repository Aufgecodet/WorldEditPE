<?php


namespace Aufgecodet\WorldEditPE\commands;


use Aufgecodet\CityBuild\Loader;
use Aufgecodet\WorldEditPE\Main;
use pocketmine\block\BlockLegacyIds;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\ItemFactory;
use pocketmine\item\ItemIds;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;

class WandCommand extends Command{
    /**
     * @author  Aufgecodet
     * @version 1.0
     * @copyright
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if(!$sender->hasPermission(Main::getInstance()->getConfig()->get("perm")) and !$sender->getServer()->isOp($sender->getName())){
            return;
        }
        if($sender instanceof Player){
            $axe = ItemFactory::getInstance()->get(ItemIds::WOODEN_AXE);
            $axe->setCustomName("§4Wand Axe");
            $axe->setLore(["§7Touch for secound position\n§7Break for first position"]);
            $sender->getInventory()->addItem($axe);
        }
    }
    public function __construct()
    {
        parent::__construct("wand");
    }
}