<?php


namespace Aufgecodet\WorldEditPE\plains;


use Aufgecodet\WorldEditPE\filler\Filler;
use Aufgecodet\WorldEditPE\position\Position;
use pocketmine\block\Block;
use pocketmine\event\player\PlayerItemUseEvent;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use pocketmine\world\World;

class Plains{
    /**
     * @author  Aufgecodet
     * @version 1.0
     * @copyright
     */
    /** @var int */
    public $x;
    /** @var int */
    public $y;
    /** @var int */
    public $z;
    /** @var int */
    public $high ;
    /** @var World */
    public $world;
    /** @var Block */
    public $block;
    /** @var Player */
    public $player;
    /** @var string */
    public  $direction = 0;
    public function __construct(int $x,int $y,int $z,World $world,Block $block,Player $player,int $heigh,int  $direction)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
        $this->block = $block;

        $this->world = $world;
        $this->block = $block;
        $this->player = $player;
        $this->high = $heigh;
        $this->direction = $direction;
    }
    public function run()
    {

        /*
          $this->world->setBlockAt($this->x,$this->y,$this->z,$this->block);
          $this->world->setBlockAt($this->x,$this->y +4,$this->z,$this->block);
          $this->x = $this->x -4;
          $this->y = $this->y -4;
          Position::setPositon($this->player,new Vector3($this->x,$this->y,$this->z),1);
          $this->x = $this->x +8;
          $this->z = $this->z +8;
          Position::setPositon($this->player,new Vector3($this->x,$this->y,$this->z),2);
          $filler = new Filler(new Vector3(Position::getPosition("x",$this->player,1),Position::getPosition("y",$this->player,1),Position::getPosition("z",$this->player,1)),new Vector3(Position::getPosition("x",$this->player,2),Position::getPosition("y",$this->player,2),Position::getPosition("z",$this->player,2)),$this->world,$this->block,$this->player);
          $filler->run();
          $this->y = $this->y +1;
          $this->z = $this->z +1;
            $this->x = $this->x -1;
            Position::setPositon($this->player,new Vector3($this->x,$this->y,$this->z),1);
            $this->x = $this->x -6;
            $this->z = $this->z -6;
            Position::setPositon($this->player,new Vector3($this->x,$this->y,$this->z),2);
            $filler = new Filler(new Vector3(Position::getPosition("x",$this->player,1),Position::getPosition("y",$this->player,1),Position::getPosition("z",$this->player,1)),new Vector3(Position::getPosition("x",$this->player,2),Position::getPosition("y",$this->player,2),Position::getPosition("z",$this->player,2)),$this->world,$this->block,$this->player);
            $filler->run();
            $this->y = $this->y +1;
            $this->x = $this->x +1;
            $this->z =$this->z +1;
            Position::setPositon($this->player,new Vector3($this->x,$this->y,$this->z),1);
            $this->x = $this->x +4;
            $this->z = $this->z +4;
            Position::setPositon($this->player,new Vector3($this->x,$this->y,$this->z),2);
            $filler = new Filler(new Vector3(Position::getPosition("x",$this->player,1),Position::getPosition("y",$this->player,1),Position::getPosition("z",$this->player,1)),new Vector3(Position::getPosition("x",$this->player,2),Position::getPosition("y",$this->player,2),Position::getPosition("z",$this->player,2)),$this->world,$this->block,$this->player);
            $filler->run();
            $this->y = $this->y +1;
            $this->z = $this->z -1;
            $this->x = $this->x -1;
            Position::setPositon($this->player,new Vector3($this->x,$this->y,$this->z),1);
            $this->x = $this->x -2;
            $this->z = $this->z -2;
            Position::setPositon($this->player,new Vector3($this->x,$this->y,$this->z),2);
            $filler = new Filler(new Vector3(Position::getPosition("x",$this->player,1),Position::getPosition("y",$this->player,1),Position::getPosition("z",$this->player,1)),new Vector3(Position::getPosition("x",$this->player,2),Position::getPosition("y",$this->player,2),Position::getPosition("z",$this->player,2)),$this->world,$this->block,$this->player);
            $filler->run();
        */
        if ($this->direction === 0) {
            $plains = $this->high / 2;
            $high = $this->high;
            $x2 = $this->x;
            $y2 = $this->y;
            $z2 = $this->z;
            for ($y = $this->y; $y < $this->y + $high; $y++) {
                $high2 = $high - 1;
                for ($x = $this->x; $y < $y + $plains; $x++) {

                    if ($x > $this->x + 16) {
                        $this->x = $this->x - 1;
                        $x = $x2 - 1;

                        break;
                    }
                    for ($z = $this->z; $y < $y + $plains; $z++) {
                        if ($z > $this->z + 16) {
                            $this->z = $this->z + 1;
                            $z = $z2 + 1;
                            break;
                        }
                        $this->world->getOrLoadChunkAtPosition(new Vector3($x, $y, $z));

                        $this->world->setBlockAt($x, $y, $z, $this->block);


                    }
                }

            }
        }  if ($this->direction === 1) {
        $plains = $this->high / 2;
        $high = $this->high;
        $x2 = $this->x;
        $y2 = $this->y;
        $z2 = $this->z;
        for ($y = $this->y; $y < $this->y + $high; $y++) {
            $high2 = $high - 1;
            for ($x = $this->x; $y < $y + $plains; $x--) {

                if ($x < $this->x - 16) {
                    $this->x = $this->x - 1;
                    $x = $x2 - 1;

                    break;
                }
                for ($z = $this->z; $y < $y + $plains; $z--) {
                    if ($z < $this->z - 16) {
                        $this->z = $this->z - 1;
                        $z = $z2 - 1;
                        break;
                    }
                    $this->world->getOrLoadChunkAtPosition(new Vector3($x, $y, $z));

                    $this->world->setBlockAt($x, $y, $z, $this->block);


                }
            }

        }
    } if ($this->direction === 2) {
        $plains = $this->high / 2;
        $high = $this->high;
        $x2 = $this->x;
        $y2 = $this->y;
        $z2 = $this->z;
        for ($y = $this->y; $y < $this->y + $high; $y++) {
            $high2 = $high - 1;
            for ($x = $this->x; $y < $y + $plains; $x++) {

                if ($x > $this->x + 16) {
                    $this->x = $this->x + 1;
                    $x = $x2 + 1;

                    break;
                }
                for ($z = $this->z; $y < $y + $plains; $z--) {
                    if ($z < $this->z - 16) {
                        $this->z = $this->z - 1;
                        $z = $z2 - 1;
                        break;
                    }
                    $this->world->getOrLoadChunkAtPosition(new Vector3($x, $y, $z));

                    $this->world->setBlockAt($x, $y, $z, $this->block);


                }
            }

        }
    }if ($this->direction === 3) {
        $plains = $this->high / 2;
        $high = $this->high;
        $x2 = $this->x;
        $y2 = $this->y;
        $z2 = $this->z;
        for ($y = $this->y; $y < $this->y + $high; $y++) {
            $high2 = $high - 1;
            for ($x = $this->x; $y < $y + $plains; $x--) {

                if ($x < $this->x - 16) {
                    $this->x = $this->x - 1;
                    $x = $x2 - 1;

                    break;
                }
                for ($z = $this->z; $y < $y + $plains; $z++) {
                    if ($z > $this->z + 16) {
                        $this->z = $this->z + 1;
                        $z = $z2 + 1;
                        break;
                    }
                    $this->world->getOrLoadChunkAtPosition(new Vector3($x, $y, $z));

                    $this->world->setBlockAt($x, $y, $z, $this->block);


                }
            }

        }
    }
    }


}