<?php


namespace Aufgecodet\WorldEditPE\commands;


use Aufgecodet\CityBuild\Loader;
use Aufgecodet\WorldEditPE\filler\Filler;
use Aufgecodet\WorldEditPE\Main;
use Aufgecodet\WorldEditPE\plains\Plains;
use pocketmine\block\BlockFactory;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\Player;

class PlaneCommand extends  Command{
    /**
     * @author  Aufgecodet
     * @version 1.0
     * @copyright
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
      if($sender instanceof Player){

          if(!$sender->hasPermission(Main::getInstance()->getConfig()->get("perm")) and !$sender->getServer()->isOp($sender->getName())){
              return;
          }
          if(empty($args[0])){
              return;
          }
          if(empty($args[1])){
              return;
          }
                if($args[1] > 5){
                    $sender->sendMessage(Main::getInstance()->prefix." §7Max §6Plane §7are §35");
                }

          list($id_1, $id_2) = explode(":", $args[0]);

          $block = BlockFactory::getInstance()->get($id_1,$id_2);
          if(empty($args[2])) {


              $pyramid = new Plains($sender->getPosition()->asVector3()->x, $sender->getPosition()->asVector3()->y, $sender->getPosition()->asVector3()->z, $sender->getWorld(), $block, $sender, $args[1],0);
          }if(isset($args[2])) {


              $pyramid = new Plains($sender->getPosition()->asVector3()->x, $sender->getPosition()->asVector3()->y, $sender->getPosition()->asVector3()->z, $sender->getWorld(), $block, $sender, $args[1],$args[2]);
          }
           $pyramid->run();
          $sender->sendMessage(Main::getInstance()->prefix . " §7Placed §3Flats");
      }

    }
    public function __construct()
    {
        parent::__construct("plane");
        $this->setDescription("Create Planes");
    }
}