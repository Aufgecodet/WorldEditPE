<?php


namespace Aufgecodet\WorldEditPE\filler;


use Aufgecodet\WorldEditPE\Main;
use czechpmdevs\buildertools\commands\UndoCommand;
use pocketmine\block\Block;
use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\types\inventory\stackrequest\MineBlockStackRequestAction;
use pocketmine\player\Player;
use pocketmine\world\World;
use Aufgecodet\WorldEditPE\undo\Undo;
class Filler{

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
    public function __construct(Vector3 $pos1,Vector3 $pos2,World $world,Block $block,Player $player){

        $this->pos1 = $pos1;
        $this->pos2 = $pos2;
        $this->world = $world;
        $this->block = $block;
        $this->player = $player;
    }
    /** @var int */
   public static $count = 0;
    public function run(){
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


        if ($y < $y2) {
            for ( $y = $k; $y <= $y2; $y++) {
                if ($x < $x2) {
                    for ($x = $u; $x < $x2; $x++) {
                        if($z < $z2){
                            for($z = $t;$z < $z2 +1;$z++){
                                Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y - 1, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y - 1, $z + 1, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y, $z + 1, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x - 1, $y, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x - 1, $y - 1 - 1, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x - 1, $y - 1, $z, $this->block);
                                $a++;


                            }
                        }else{
                            for($z = $t;$z  > $z2 -1;$z--){
                                Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y - 1, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y - 1, $z + 1, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y, $z + 1, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x - 1, $y, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x - 1, $y - 1 - 1, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x - 1, $y - 1, $z, $this->block);
                                $a++;

                            }
                        }

                    }

                }else{
                    for ($x = $u; $x  > $x2 -1; $x--) {
                        if($z <= $z2){
                            for($z = $t;$z < $z2;$z++){
                                Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y - 1, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y - 1, $z + 1, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y, $z + 1, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x - 1, $y, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x - 1, $y - 1 - 1, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x - 1, $y - 1, $z, $this->block);
                                $a++;


                            }
                        }else{
                            for($z = $t;$z > $z2 -1;$z--){
                                Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y - 1, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y - 1, $z + 1, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y, $z + 1, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x - 1, $y, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x - 1, $y - 1 - 1, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x - 1, $y - 1, $z, $this->block);
                                $a++;


                            }
                        }

                    }
                }

            }

        }else{
            for ( $y = $k; $y >= $y2; $y--) {
                if ($x < $x2) {
                    for ($x = $u; $x < $x2; $x++) {
                        if($z < $z2){
                            for($z = $t;$z < $z2 +1;$z++){



                                    Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                    $this->world->setBlockAt($x, $y, $z, $this->block);
                                    $a++;


                                    Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                    $this->world->setBlockAt($x, $y - 1, $z, $this->block);
                                    $a++;


                                    Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x, $y - 1, $z + 1, $this->block);
                                    $a++;


                                    Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                    $this->world->setBlockAt($x, $y, $z + 1, $this->block);
                                    $a++;


                                    Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);
                                    $this->world->setBlockAt($x - 1, $y, $z, $this->block);
                                    $a++;


                                    Undo::saveBloks(new Vector3($x - 1, $y - 1 - 1, $z), $this->world, $this->player);
                                    $this->world->setBlockAt($x - 1, $y - 1, $z, $this->block);
                                    $a++;





                            }
                        }else{
                            for($z = $t;$z -1 > $z2;$z--){
                                Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y - 1, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y - 1, $z + 1, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y, $z + 1, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x - 1, $y, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x - 1, $y - 1 - 1, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x - 1, $y - 1, $z, $this->block);
                                $a++;

                            }
                        }

                    }

                }else{
                    for ($x = $u; $x > $x2; $x--) {
                        if($z <= $z2){
                            for($z = $t;$z < $z2 +1;$z++){
                                Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y - 1, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y - 1, $z + 1, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y, $z + 1, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x - 1, $y, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x - 1, $y - 1 - 1, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x - 1, $y - 1, $z, $this->block);
                                $a++;


                            }
                        }else{
                            for($z = $t;$z -1 > $z2;$z--){
                                Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y - 1, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y - 1, $z + 1, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                $this->world->setBlockAt($x, $y, $z + 1, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x - 1, $y, $z, $this->block);
                                $a++;


                                Undo::saveBloks(new Vector3($x - 1, $y - 1 - 1, $z), $this->world, $this->player);
                                $this->world->setBlockAt($x - 1, $y - 1, $z, $this->block);
                                $a++;


                            }
                        }

                    }
                }

            }


        }



        self::$count = $a;
    }
}