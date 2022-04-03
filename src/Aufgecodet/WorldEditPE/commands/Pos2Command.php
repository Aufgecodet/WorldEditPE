<?php


namespace Aufgecodet\WorldEditPE\commands;



use Aufgecodet\CityBuild\Loader;
use Aufgecodet\WorldEditPE\Main;
use Aufgecodet\WorldEditPE\message\Messages;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use Aufgecodet\WorldEditPE\position\Position;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;
use pocketmine\math\Vector3;
class Pos2Command extends Command {
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

            $pos = new Position();
            $pos1x = Position::getPosition("x",$player,2);
            $pos1y = Position::getPosition("y",$player, 2);
            $pos1z = Position::getPosition("z",$player,2);
            $x = floor($player->getPosition()->asVector3()->x);
            $y = floor($player->getPosition()->asVector3()->y);
            $z = floor($player->getPosition()->asVector3()->z);
            if($pos1y !== null){
                if($pos1y > $player->getPosition()->asVector3()->y){
                    Position::setPositon($player,new Vector3($x,$y,$z),2);
                    $player->sendMessage(Main::getInstance()->prefix." §7You have been set §6pos2 §7at §a ".$x.";".$y.";$z");
                    Position::setPositon($player,new Vector3($pos1x,$pos1y,$pos1z),1);

                    return;
                }

            }
            $x = floor($player->getPosition()->asVector3()->x);
            $y = floor($player->getPosition()->asVector3()->y);
            $z = floor($player->getPosition()->asVector3()->z);


                Position::setPositon($player,new Vector3($x,$y,$z),1);

            $player->sendMessage(Main::getInstance()->prefix." §7You have been set §6pos2 §7at §a ".$x.";".$y.";$z");
        }
    }

    /** Register */
    public function __construct()
    {
        parent::__construct("pos2");
        $this->setDescription("Set Pos2");
    }

    /** @var string */
    public $command = null;

}