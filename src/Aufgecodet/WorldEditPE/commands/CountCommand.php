<?php


namespace Aufgecodet\WorldEditPE\commands;


use Aufgecodet\CityBuild\Loader;
use Aufgecodet\WorldEditPE\area\Area;
use Aufgecodet\WorldEditPE\Main;
use Aufgecodet\WorldEditPE\position\Position;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\math\Vector3;
use pocketmine\player\Player;

class CountCommand extends Command
{
    /**
     * @author  Aufgecodet
     * @version 1.0
     * @copyright
     */
    public function __construct()
    {
        parent::__construct("count");
        $this->setDescription("Count blocks in a area");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if (!$sender->hasPermission(Main::getInstance()->getConfig()->get("perm")) and !$sender->getServer()->isOp($sender->getName())) {
            return;
        }
        $player = $sender;

        if ($sender instanceof Player and $player instanceof Player) {
            if(Position::getPosition("x",$sender,1) === null){
                $sender->sendMessage(Main::getInstance()->prefix." §7You have not §3marked §7a §6position!");
                return;
            } if(Position::getPosition("x",$sender,2) === null){
                $sender->sendMessage(Main::getInstance()->prefix." §7You have not §3marked §7a §6position!");
                return;
            }
            $pos = new Position();
            $area = new Area($sender, new Vector3($pos->getPosition("x", $player, 1), Position::getPosition("y", $player, 1), Position::getPosition("z", $player, 1)), new Vector3(Position::getPosition("x", $player, 2), Position::getPosition("y", $player, 2), Position::getPosition("z", $player, 2)));
            $player->sendMessage(Main::getInstance()->prefix." §7Counted §3Blocks §7: §6".$area->count());
    }
    }
}