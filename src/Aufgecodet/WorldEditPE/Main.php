<?php


namespace Aufgecodet\WorldEditPE;


use Aufgecodet\WorldEditPE\brush\BrushListener;
use Aufgecodet\WorldEditPE\commands\BrushCommand;
use Aufgecodet\WorldEditPE\commands\CountCommand;
use Aufgecodet\WorldEditPE\commands\NaturalizeCommand;
use Aufgecodet\WorldEditPE\commands\PlaneCommand;
use Aufgecodet\WorldEditPE\commands\Pos1Command;
use Aufgecodet\WorldEditPE\commands\Pos2Command;
use Aufgecodet\WorldEditPE\commands\FillCommand;
use Aufgecodet\WorldEditPE\commands\ReplaceCommand;
use Aufgecodet\WorldEditPE\commands\SnowCommand;
use Aufgecodet\WorldEditPE\commands\UndoCommand;
use Aufgecodet\WorldEditPE\commands\WandCommand;
use Aufgecodet\WorldEditPE\commands\PlainsCommand;
use Aufgecodet\WorldEditPE\commands\IDCommand;
use Aufgecodet\WorldEditPE\commands\ClearInventoryCommand;
use Aufgecodet\WorldEditPE\commands\CopyCommand;
use Aufgecodet\WorldEditPE\commands\PasteCommand;
use Aufgecodet\WorldEditPE\filler\Naturalize;
use pocketmine\plugin\PluginBase;
use Aufgecodet\WorldEditPE\axe\AxeEvent;

class Main extends PluginBase{
    /**
     * @author  Aufgecodet
     * @version 1.0
     * @copyright
     */

    /** @var string */
    /** @var array */
    public $copy = [];
    /** @var array */
    public $max = [];
    public $prefix =  null;
    public $savedblocks = [];


    public function onEnable():void
    {
        $config = $this->getConfig();
        $config->save();
        $this->prefix = $config->get("prefix");

        self::$instance = $this;
        $this->registerCommands();
        $this->registerEvents();

    }
    public function registerCommands():void{
        $this->getServer()->getCommandMap()->register("fill",new FillCommand());
        $this->getServer()->getCommandMap()->register("replace",new ReplaceCommand());
        $this->getServer()->getCommandMap()->register("pos1",new Pos1Command());
        $this->getServer()->getCommandMap()->register("pos2",new Pos2Command());
        $this->getServer()->getCommandMap()->register("wand",new WandCommand());
        $this->getServer()->getCommandMap()->register("snow",new SnowCommand());
        $this->getServer()->getCommandMap()->register("plane",new PlaneCommand());
        $this->getServer()->getCommandMap()->register("id",new IdCommand());
        $this->getServer()->getCommandMap()->register("brush",new BrushCommand());
        $this->getServer()->getCommandMap()->register("clearinv",new ClearInventoryCommand());
        $this->getServer()->getCommandMap()->register("undo",new UndoCommand());
        $this->getServer()->getCommandMap()->register("naturalsize",new NaturalizeCommand());
        $this->getServer()->getCommandMap()->register("count",new CountCommand());

    }
    public function registerEvents():void{
        $this->getServer()->getPluginManager()->registerEvents(new AxeEvent(),$this);
        $this->getServer()->getPluginManager()->registerEvents(new BrushListener(),$this);
    }
    /** @var $this */
    public static $instance;
    public static function getInstance():self{
        return  self::$instance;
    }
}