<?php


namespace Aufgecodet\WorldEditPE\naturalize;


use Aufgecodet\WorldEditPE\area\Area;
use Aufgecodet\WorldEditPE\Main;
use czechpmdevs\buildertools\commands\UndoCommand;
use pocketmine\block\Block;
use pocketmine\block\VanillaBlocks;
use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\types\inventory\stackrequest\MineBlockStackRequestAction;
use pocketmine\player\Player;
use pocketmine\world\World;
use Aufgecodet\WorldEditPE\undo\Undo;
class Naturalize
{

    /** @var Block */
    public $block;
    /** @var Vector3 */
    public $pos1;
    /** @var Vector3 */
    public $pos2;

    /** @var World */
    public $world;
    /** @var Player */
    public $player;

    public function __construct(Vector3 $pos1, Vector3 $pos2, World $world, Player $player)
    {

        $this->pos1 = $pos1;
        $this->pos2 = $pos2;
        $this->world = $world;

        $this->player = $player;
    }

    /** @var int */
    public static $count = 0;

    public function run()
    {
        $x = floor($this->pos1->x);
        $y = floor($this->pos1->y);
        $z = floor($this->pos1->z);
        $x2 = floor($this->pos2->x);
        $y2 = floor($this->pos2->y);
        $z2 = floor($this->pos2->z);
        $a = 0;
        $k = $y;
        $t = $z;
        $u = $x;
        self::$count = 0;
        $area = new Area($this->player,$this->pos1,$this->pos2);
        foreach ($area->getTerrain() as $value => $item){
            list($x,$y,$z) = explode(":",$value);
            if($this->world->getBlockAt($x,$y,$z)->getId() !== 0){
                if($this->world->getBlockAt($x,$y +1,$z)->getId() === 0) {
                    $this->world->setBlockAt($x, $y, $z,VanillaBlocks::GRASS());
                }else{
                    $this->world->setBlockAt($x,$y,$z,VanillaBlocks::DIRT());
                }
                $a++;


    }
            self::$count = $a;
}



        self::$count = $a;
    }
}