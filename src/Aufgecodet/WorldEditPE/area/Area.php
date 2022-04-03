<?php

namespace Aufgecodet\WorldEditPE\area;

use Aufgecodet\WorldEditPE\undo\Undo;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use pocketmine\world\World;

class Area
{

    /** @var array */
    public $area = [];
    /** @var Player */
    public $player;
    /** @var World */
    public $world;
    /** @var Vector3 */
    public $pos1;
    /** @var Vector3 */
    public $pos2;

    public function __construct(Player $player,Vector3 $pos1,Vector3 $pos2)
    {
        $this->player = $player;
        $this->world = $player->getWorld();
        $this->pos1 = $pos1;
        $this->pos2 = $pos2;

    }
   public function count():int
   {
       $arr = [];
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
       if ($y < $y2) {
           for ($y = $k; $y <= $y2; $y++) {
               if ($x < $x2) {
                   for ($x = $u; $x < $x2; $x++) {
                       if ($z < $z2) {
                           for ($z = $t; $z < $z2 + 1; $z++) {


                               $a++;



                               $a++;

                               $a++;



                               $a++;






                               $a++;

                           }
                       } else {
                           for ($z = $t; $z > $z2 - 1; $z--) {
                               $a++;



                               $a++;

                               $a++;



                               $a++;






                               $a++;

                           }
                       }

                   }

               } else {
                   for ($x = $u; $x > $x2 - 1; $x--) {
                       if ($z <= $z2) {
                           for ($z = $t; $z < $z2; $z++) {
                               $a++;



                               $a++;

                               $a++;



                               $a++;






                               $a++;
                           }
                       } else {
                           for ($z = $t; $z > $z2 - 1; $z--) {
                               $a++;



                               $a++;

                               $a++;



                               $a++;






                               $a++;

                           }
                       }

                   }
               }

           }

       } else {
           //y > y2
           $c = $y;
           $b = $y2;
           for ($y = $k; $y >= $y2; $y--) {
               //for ($y = $b; $c > $b; $y++) {


               if ($x < $x2) {
                   for ($x = $u; $x < $x2; $x++) {
                       if ($z < $z2) {
                           for ($z = $t; $z < $z2 + 1; $z++) {
                               $a++;



                               $a++;

                               $a++;



                               $a++;






                               $a++;

                           }
                       } else {
                           for ($z = $t; $z > $z2 - 1; $z--) {
                               $a++;



                               $a++;

                               $a++;



                               $a++;






                               $a++;

                           }
                       }

                   }

               } else {
                   for ($x = $u; $x > $x2 - 1; $x--) {
                       if ($z <= $z2) {
                           for ($z = $t; $z < $z2; $z++) {
                               $a++;



                               $a++;

                               $a++;



                               $a++;






                               $a++;
                           }
                       } else {
                           for ($z = $t; $z > $z2 - 1; $z--) {
                               $a++;



                               $a++;

                               $a++;



                               $a++;






                               $a++;


                           }
                       }

                   }
               }

           }

       }
       return $a;
   }
    public function getTerrain():array
    {
        $arr = [];
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
        if ($y < $y2) {
            for ($y = $k; $y <= $y2; $y++) {
                if ($x < $x2) {
                    for ($x = $u; $x < $x2; $x++) {
                        if ($z < $z2) {
                            for ($z = $t; $z < $z2 + 1; $z++) {
                                Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                $arr["$x:$y:$z"] = $this->player->getName();

                                $a++;

                                Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                $b = $y -1;
                                $arr["$x:".$b.":$z"] = $this->player->getName();

                                $a++;
                                Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                $b = $y -1;
                                $c = $z +1;
                                $arr["$x:".$b.":$c"] = $this->player->getName();
                                $a++;

                                Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                $b = $y -1;
                                $arr["$x:".$b.":$c"] = $this->player->getName();

                                $a++;

                                Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);

                                $b = $x -1;
                                $arr["$b:".$y.":$z"] = $this->player->getName();


                                Undo::saveBloks(new Vector3($x - 1, $y - 1 , $z), $this->world, $this->player);
                                $u = $y -1;
                                $arr["$b:".$u.":$z"] = $this->player->getName();

                                $a++;

                            }
                        } else {
                            for ($z = $t; $z > $z2 - 1; $z--) {
                                Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                $arr["$x:$y:$z"] = $this->player->getName();
                                $a++;



                                Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                $b = $y -1;
                                $arr["$x:".$b.":$z"] = $this->player->getName();
                                $a++;

                                Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                $b = $y -1;
                                $c = $z +1;
                                $arr["$x:".$b.":$c"] = $this->player->getName();


                                Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                $b = $y -1;
                                $arr["$x:".$b.":$c"] = $this->player->getName();
                                $a++;


                                Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);

                                $b = $x -1;
                                $arr["$b:".$y.":$z"] = $this->player->getName();

                                $a++;
                                Undo::saveBloks(new Vector3($x - 1, $y - 1 , $z), $this->world, $this->player);
                                $u = $y -1;
                                $arr["$b:".$u.":$z"] = $this->player->getName();
                                $a++;

                            }
                        }

                    }

                } else {
                    for ($x = $u; $x > $x2 ; $x--) {
                        if ($z <= $z2) {
                            for ($z = $t; $z < $z2; $z++) {
                                Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                $arr["$x:$y:$z"] = $this->player->getName();


                                $a++;
                                Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                $b = $y -1;
                                $arr["$x:".$b.":$z"] = $this->player->getName();
                                $a++;

                                Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                $b = $y -1;
                                $c = $z +1;
                                $arr["$x:".$b.":$c"] = $this->player->getName();
                                $a++;

                                Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                $b = $y -1;
                                $arr["$x:".$b.":$c"] = $this->player->getName();
                                $a++;


                                Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);

                                $b = $x -1;
                                $arr["$b:".$y.":$z"] = $this->player->getName();
                                $a++;

                                Undo::saveBloks(new Vector3($x - 1, $y - 1 , $z), $this->world, $this->player);
                                $u = $y -1;
                                $arr["$b:".$u.":$z"] = $this->player->getName();

                                $a++;
                            }
                        } else {
                            for ($z = $t; $z > $z2 - 1; $z--) {
                                Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                $arr["$x:$y:$z"] = $this->player->getName();
                                $a++;


                                Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                $b = $y -1;
                                $arr["$x:".$b.":$z"] = $this->player->getName();

                                $a++;
                                Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                $b = $y -1;
                                $c = $z +1;
                                $arr["$x:".$b.":$c"] = $this->player->getName();

                                $a++;
                                Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                $b = $y -1;
                                $arr["$x:".$b.":$c"] = $this->player->getName();

                                $a++;

                                Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);

                                $b = $x -1;
                                $arr["$b:".$y.":$z"] = $this->player->getName();
                                $a++;

                                Undo::saveBloks(new Vector3($x - 1, $y - 1 , $z), $this->world, $this->player);
                                $u = $y -1;
                                $arr["$b:".$u.":$z"] = $this->player->getName();
                                $a++;


                            }
                        }

                    }
                }

            }

        } else {
            //y > y2
            $c = $y;
         $b = $y2;
            for ( $y = $k; $y >= $y2; $y--) {
            //for ($y = $b; $c > $b; $y++) {


                    if ($x < $x2) {
                        for ($x = $u; $x < $x2; $x++) {
                            if ($z < $z2) {
                                for ($z = $t; $z < $z2 + 1; $z++) {
                                    Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                    $arr["$x:$y:$z"] = $this->player->getName();

                                    $a++;

                                    Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                    $b = $y -1;
                                    $arr["$x:".$b.":$z"] = $this->player->getName();

                                    $a++;
                                    Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                    $b = $y -1;
                                    $c = $z +1;
                                    $arr["$x:".$b.":$c"] = $this->player->getName();
                                    $a++;

                                    Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                    $b = $y -1;
                                    $arr["$x:".$b.":$c"] = $this->player->getName();

                                    $a++;

                                    Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);

                                    $b = $x -1;
                                    $arr["$b:".$y.":$z"] = $this->player->getName();


                                    Undo::saveBloks(new Vector3($x - 1, $y - 1 , $z), $this->world, $this->player);
                                    $u = $y -1;
                                    $arr["$b:".$u.":$z"] = $this->player->getName();

                                    $a++;

                                }
                            } else {
                                for ($z = $t; $z > $z2 - 1; $z--) {
                                    Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                    $arr["$x:$y:$z"] = $this->player->getName();
                                    $a++;



                                    Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                    $b = $y -1;
                                    $arr["$x:".$b.":$z"] = $this->player->getName();
                                    $a++;

                                    Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                    $b = $y -1;
                                    $c = $z +1;
                                    $arr["$x:".$b.":$c"] = $this->player->getName();


                                    Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                    $b = $y -1;
                                    $arr["$x:".$b.":$c"] = $this->player->getName();
                                    $a++;


                                    Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);

                                    $b = $x -1;
                                    $arr["$b:".$y.":$z"] = $this->player->getName();

                                    $a++;
                                    Undo::saveBloks(new Vector3($x - 1, $y - 1 , $z), $this->world, $this->player);
                                    $u = $y -1;
                                    $arr["$b:".$u.":$z"] = $this->player->getName();
                                    $a++;

                                }
                            }

                        }

                    } else {
                        for ($x = $u; $x > $x2 - 1; $x--) {
                            if ($z <= $z2) {
                                for ($z = $t; $z < $z2; $z++) {
                                    Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                    $arr["$x:$y:$z"] = $this->player->getName();


                                    $a++;
                                    Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                    $b = $y -1;
                                    $arr["$x:".$b.":$z"] = $this->player->getName();
                                    $a++;

                                    Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                    $b = $y -1;
                                    $c = $z +1;
                                    $arr["$x:".$b.":$c"] = $this->player->getName();
                                    $a++;

                                    Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                    $b = $y -1;
                                    $arr["$x:".$b.":$c"] = $this->player->getName();
                                    $a++;


                                    Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);

                                    $b = $x -1;
                                    $arr["$b:".$y.":$z"] = $this->player->getName();
                                    $a++;

                                    Undo::saveBloks(new Vector3($x - 1, $y - 1 , $z), $this->world, $this->player);
                                    $u = $y -1;
                                    $arr["$b:".$u.":$z"] = $this->player->getName();

                                    $a++;
                                }
                            } else {
                                for ($z = $t; $z > $z2 - 1; $z--) {
                                    Undo::saveBloks(new Vector3($x, $y, $z), $this->world, $this->player);
                                    $arr["$x:$y:$z"] = $this->player->getName();
                                    $a++;


                                    Undo::saveBloks(new Vector3($x, $y - 1, $z), $this->world, $this->player);
                                    $b = $y -1;
                                    $arr["$x:".$b.":$z"] = $this->player->getName();

                                    $a++;
                                    Undo::saveBloks(new Vector3($x, $y - 1, $z + 1), $this->world, $this->player);
                                    $b = $y -1;
                                    $c = $z +1;
                                    $arr["$x:".$b.":$c"] = $this->player->getName();

                                    $a++;
                                    Undo::saveBloks(new Vector3($x, $y, $z + 1), $this->world, $this->player);
                                    $b = $y -1;
                                    $arr["$x:".$b.":$c"] = $this->player->getName();

                                    $a++;

                                    Undo::saveBloks(new Vector3($x - 1, $y, $z), $this->world, $this->player);

                                    $b = $x -1;
                                    $arr["$b:".$y.":$z"] = $this->player->getName();
                                    $a++;

                                    Undo::saveBloks(new Vector3($x - 1, $y - 1 , $z), $this->world, $this->player);
                                    $u = $y -1;
                                    $arr["$b:".$u.":$z"] = $this->player->getName();
                                    $a++;


                                }
                            }

                        }
                    }

                }

                    }



        self::$count = $a;
        return $arr;


    }
/** @var int */
    public static $count = 0;
}