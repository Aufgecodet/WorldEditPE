<?php


namespace Aufgecodet\WorldEditPE\filler;


use Aufgecodet\WorldEditPE\undo\Undo;
use Aufgecodet\WorldEditPE\Main;
use pocketmine\block\Block;
use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\types\inventory\stackrequest\MineBlockStackRequestAction;

use pocketmine\world\World;
use pocketmine\player\Player;
class Replacer
{

    /** @var Block */
    public $block1;
    /** @var Block */
    public $block;
    /** @var Vector3 */
    public $pos1;
    /** @var Vector3 */
    public $pos2;

    /** @var World */
    public $world;
    /** @var int */
    public $id;
    /** @var Player */
    public $player;

    public function __construct(Vector3 $pos1, Vector3 $pos2, World $world, Block $block, Block $block1, Player $player)
    {

        $this->pos1 = $pos1;
        $this->pos2 = $pos2;
        $this->world = $world;
        $this->block = $block;
        $this->block1 = $block1;
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
        Undo::resetAAll($this->player);
        if ($y < $y2) {
            for ($y = $k; $y <= $y2; $y++) {
                if ($x < $x2) {
                    for ($x = $u; $x < $x2; $x++) {
                        if ($z < $z2) {
                            for ($z = $t; $z < $z2; $z++) {
                                if ($this->world->getBlockAt($x, $y, $z)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                    $this->world->setBlockAt($x, $y, $z, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                    $this->world->setBlockAt($x, $y - 1, $z, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x, $y - 1, $z + 1)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x, $y - 1, $z + 1, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x, $y, $z + 1)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x, $y, $z + 1, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x, $y - 1, $z - 1)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x, $y - 1, $z - 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x, $y - 1, $z - 1, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x - 1, $y, $z)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);
                                    $this->world->setBlockAt($x - 1, $y, $z, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x - 1, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x - 1, $y - 1, $z), $this->world, $this->player);
                                    $this->world->setBlockAt($x - 1, $y - 1, $z, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x + 1, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x + 1, $y - 1, $z), $this->world, $this->player);
                                    $this->world->setBlockAt($x + 1, $y - 1, $z, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x + 1, $y, $z)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x + 1, $y, $z), $this->world, $this->player);
                                    $this->world->setBlockAt($x + 1, $y, $z, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x + 1, $y, $z - 1)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x + 1, $y, $z - 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x + 1, $y, $z - 1, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x - 1, $y, $z + 1)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x - 1, $y, $z + 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x - 1, $y, $z + 1, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x + 1, $y - 1, $z + 1)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x + 1, $y - 1, $z + 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x + 1, $y - 1, $z + 1, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x + 1, $y + 1, $z + 1)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x + 1, $y + 1, $z + 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x + 1, $y + 1, $z + 1, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x - 1, $y + 1, $z - 1)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x - 1, $y + 1, $z - 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x - 1, $y + 1, $z - 1, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x - 1, $y - 1, $z - 1)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x - 1, $y - 1, $z - 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x - 1, $y - 1, $z - 1, $this->block1);
                                    $a++;
                                }


                            }
                        } else {
                            for ($z = $t; $z > $z2; $z--) {
                                if ($this->world->getBlockAt($x, $y, $z)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                    $this->world->setBlockAt($x, $y, $z, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                    $this->world->setBlockAt($x, $y - 1, $z, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x, $y - 1, $z + 1)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x, $y - 1, $z + 1, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x, $y, $z + 1)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x, $y, $z + 1, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x, $y - 1, $z - 1)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x, $y - 1, $z - 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x, $y - 1, $z - 1, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x - 1, $y, $z)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);
                                    $this->world->setBlockAt($x - 1, $y, $z, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x - 1, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x - 1, $y - 1, $z), $this->world, $this->player);
                                    $this->world->setBlockAt($x - 1, $y - 1, $z, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x + 1, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x + 1, $y - 1, $z), $this->world, $this->player);
                                    $this->world->setBlockAt($x + 1, $y - 1, $z, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x + 1, $y, $z)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x + 1, $y, $z), $this->world, $this->player);
                                    $this->world->setBlockAt($x + 1, $y, $z, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x + 1, $y, $z - 1)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x + 1, $y, $z - 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x + 1, $y, $z - 1, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x - 1, $y, $z + 1)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x - 1, $y, $z + 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x - 1, $y, $z + 1, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x + 1, $y - 1, $z + 1)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x + 1, $y - 1, $z + 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x + 1, $y - 1, $z + 1, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x + 1, $y + 1, $z + 1)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x + 1, $y + 1, $z + 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x + 1, $y + 1, $z + 1, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x - 1, $y + 1, $z - 1)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x - 1, $y + 1, $z - 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x - 1, $y + 1, $z - 1, $this->block1);
                                    $a++;
                                }
                                if ($this->world->getBlockAt($x - 1, $y - 1, $z - 1)->getFullId() === $this->block->getFullId()) {
                                    Undo::saveBloks(new Vector3($x - 1, $y - 1, $z - 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x - 1, $y - 1, $z - 1, $this->block1);
                                    $a++;
                                }
                            }
                            $a++;
                        }

                    }
                }
                else {
                        for ($x = $u; $x > $x2; $x--) {
                            if ($z <= $z2) {
                                for ($z = $t; $z < $z2; $z++) {
                                    if ($this->world->getBlockAt($x, $y, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y - 1, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y - 1, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y - 1, $z + 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y, $z + 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y - 1, $z - 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y - 1, $z - 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y - 1, $z - 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y - 1, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y - 1, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x + 1, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y - 1, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y - 1, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x + 1, $y, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x + 1, $y, $z - 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y, $z - 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y, $z - 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y, $z + 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x + 1, $y - 1, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y - 1, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y - 1, $z + 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x + 1, $y + 1, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y + 1, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y + 1, $z + 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y + 1, $z - 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y + 1, $z - 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y + 1, $z - 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y - 1, $z - 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y - 1, $z - 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y - 1, $z - 1, $this->block1);
                                        $a++;
                                    }
                                }
                            } else {
                                for ($z = $t; $z > $z2; $z--) {
                                    if ($this->world->getBlockAt($x, $y, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y - 1, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y - 1, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y - 1, $z + 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y, $z + 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y - 1, $z - 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y - 1, $z - 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y - 1, $z - 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y - 1, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y - 1, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x + 1, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y - 1, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y - 1, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x + 1, $y, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x + 1, $y, $z - 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y, $z - 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y, $z - 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y, $z + 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x + 1, $y - 1, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y - 1, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y - 1, $z + 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x + 1, $y + 1, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y + 1, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y + 1, $z + 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y + 1, $z - 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y + 1, $z - 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y + 1, $z - 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y - 1, $z - 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y - 1, $z - 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y - 1, $z - 1, $this->block1);
                                        $a++;
                                    }

                                    $a++;

                                }
                            }

                        }
                    }

                }

            }

        else{
                for ($y = $k; $y >= $y2; $y--) {
                    if ($x < $x2) {
                        for ($x = $u; $x < $x2; $x++) {
                            if ($z < $z2) {
                                for ($z = $t; $z < $z2; $z++) {
                                    if ($this->world->getBlockAt($x, $y, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y - 1, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y - 1, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y - 1, $z + 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y, $z + 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y - 1, $z - 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y - 1, $z - 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y - 1, $z - 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y - 1, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y - 1, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x + 1, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y - 1, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y - 1, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x + 1, $y, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x + 1, $y, $z - 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y, $z - 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y, $z - 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y, $z + 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x + 1, $y - 1, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y - 1, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y - 1, $z + 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x + 1, $y + 1, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y + 1, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y + 1, $z + 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y + 1, $z - 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y + 1, $z - 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y + 1, $z - 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y - 1, $z - 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y - 1, $z - 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y - 1, $z - 1, $this->block1);
                                        $a++;
                                    }

                                }
                            }else {
                                for ($z = $t; $z > $z2; $z--) {
                                    if ($this->world->getBlockAt($x, $y, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y - 1, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y - 1, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y - 1, $z + 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y, $z + 1, $this->block1);
                                        $a++;
                                    } if ($this->world->getBlockAt($x, $y -1, $z - 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y -1, $z - 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y -1, $z - 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y - 1 , $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y - 1, $z, $this->block1);
                                        $a++;
                                    }  if ($this->world->getBlockAt($x + 1, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y  - 1, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y - 1, $z, $this->block1);
                                        $a++;
                                    }  if ($this->world->getBlockAt($x + 1, $y , $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y  , $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y , $z, $this->block1);
                                        $a++;
                                    }if ($this->world->getBlockAt($x + 1, $y , $z -1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y  , $z -1), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y , $z -1, $this->block1);
                                        $a++;
                                    }if ($this->world->getBlockAt($x - 1, $y , $z +1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y  , $z +1), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y , $z +1, $this->block1);
                                        $a++;
                                    }if ($this->world->getBlockAt($x + 1, $y -1, $z +1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y -1  , $z +1), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y -1 , $z +1, $this->block1);
                                        $a++;
                                    }if ($this->world->getBlockAt($x + 1, $y +1, $z +1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y +1  , $z +1), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y +1 , $z +1, $this->block1);
                                        $a++;
                                    }if ($this->world->getBlockAt($x - 1, $y +1, $z -1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y +1  , $z -1), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y +1 , $z -1, $this->block1);
                                        $a++;
                                    }if ($this->world->getBlockAt($x - 1, $y -1, $z -1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y -1  , $z -1), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y -1 , $z -1, $this->block1);
                                        $a++;
                                    }

                                }
                            }

                        }

                    } else {
                        for ($x = $u; $x > $x2; $x--) {
                            if ($z <= $z2) {
                                for ($z = $t; $z < $z2; $z++) {
                                    if ($this->world->getBlockAt($x, $y, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y - 1, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y - 1, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y - 1, $z + 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y, $z + 1, $this->block1);
                                        $a++;
                                    } if ($this->world->getBlockAt($x, $y -1, $z - 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y -1, $z - 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y -1, $z - 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y - 1 , $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y - 1, $z, $this->block1);
                                        $a++;
                                    }  if ($this->world->getBlockAt($x + 1, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y  - 1, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y - 1, $z, $this->block1);
                                        $a++;
                                    }  if ($this->world->getBlockAt($x + 1, $y , $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y  , $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y , $z, $this->block1);
                                        $a++;
                                    }if ($this->world->getBlockAt($x + 1, $y , $z -1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y  , $z -1), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y , $z -1, $this->block1);
                                        $a++;
                                    }if ($this->world->getBlockAt($x - 1, $y , $z +1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y  , $z +1), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y , $z +1, $this->block1);
                                        $a++;
                                    }if ($this->world->getBlockAt($x + 1, $y -1, $z +1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y -1  , $z +1), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y -1 , $z +1, $this->block1);
                                        $a++;
                                    }if ($this->world->getBlockAt($x + 1, $y +1, $z +1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y +1  , $z +1), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y +1 , $z +1, $this->block1);
                                        $a++;
                                    }if ($this->world->getBlockAt($x - 1, $y +1, $z -1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y +1  , $z -1), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y +1 , $z -1, $this->block1);
                                        $a++;
                                    }if ($this->world->getBlockAt($x - 1, $y -1, $z -1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y -1  , $z -1), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y -1 , $z -1, $this->block1);
                                        $a++;
                                    }
                                }
                            } else {
                                for ($z = $t; $z > $z2; $z--) {
                                    if ($this->world->getBlockAt($x, $y, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y - 1, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y - 1, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y - 1, $z + 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x, $y, $z + 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y, $z + 1, $this->block1);
                                        $a++;
                                    } if ($this->world->getBlockAt($x, $y -1, $z - 1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x, $y -1, $z - 1), $this->world, $this->player);
                                        $this->world->setBlockAt($x, $y -1, $z - 1, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y, $z, $this->block1);
                                        $a++;
                                    }
                                    if ($this->world->getBlockAt($x - 1, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y - 1 , $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y - 1, $z, $this->block1);
                                        $a++;
                                    }  if ($this->world->getBlockAt($x + 1, $y - 1, $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y  - 1, $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y - 1, $z, $this->block1);
                                        $a++;
                                    }  if ($this->world->getBlockAt($x + 1, $y , $z)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y  , $z), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y , $z, $this->block1);
                                        $a++;
                                    }if ($this->world->getBlockAt($x + 1, $y , $z -1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y  , $z -1), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y , $z -1, $this->block1);
                                        $a++;
                                    }if ($this->world->getBlockAt($x - 1, $y , $z +1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y  , $z +1), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y , $z +1, $this->block1);
                                        $a++;
                                    }if ($this->world->getBlockAt($x + 1, $y -1, $z +1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y -1  , $z +1), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y -1 , $z +1, $this->block1);
                                        $a++;
                                    }if ($this->world->getBlockAt($x + 1, $y +1, $z +1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x + 1, $y +1  , $z +1), $this->world, $this->player);
                                        $this->world->setBlockAt($x + 1, $y +1 , $z +1, $this->block1);
                                        $a++;
                                    }if ($this->world->getBlockAt($x - 1, $y +1, $z -1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y +1  , $z -1), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y +1 , $z -1, $this->block1);
                                        $a++;
                                    }if ($this->world->getBlockAt($x - 1, $y -1, $z -1)->getFullId() === $this->block->getFullId()) {
                                        Undo::saveBloks(new Vector3($x - 1, $y -1  , $z -1), $this->world, $this->player);
                                        $this->world->setBlockAt($x - 1, $y -1 , $z -1, $this->block1);
                                        $a++;
                                    }
                                }
                            }

                        }
                    }

                }


            }


            self::$count = $a;
        }

}

// if($this->world->getBlockAt($x,$y,$z)->getId() === $this->block->getId() or $this->world->getBlockAt($x,$y,$z)->getMeta() !== $this->block->getMeta()) {