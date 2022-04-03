<?php


namespace Aufgecodet\WorldEditPE\math;


use pocketmine\math\Vector3;

class Math{

    public static function drawCircleBase(Vector3 $base,int $size):array{

        $arr = [];
        /**
        for($x = $base->x;$x < $size +1;$x++){
          $arr[$x] = "x";
        } for($x = $base->x;$x > $x - $size -1;$x--){
            $arr[$x] = "x";
        }for($z = $base->z;$z > $z - $size -1;$z--){
            $arr[$x] = "z";
        }for($z = $base->z;$z < $size +1;$z++){
            $arr[$x] = "z";
        }
         */
        $subfloorsize = floor($size | 2);
      $i = 0;
            for($x = $base->x;$i < $subfloorsize;$x++){
                for($z = $base->z;$i<$subfloorsize;$z++){

                    $arr["$x:$z"] = $x.":".$z;
                    $i++;
                    $x--;
                    $z--;

                }
        }for($x = $base->z;$i > $subfloorsize;$x--){
            for($z = $base->z;$i>$subfloorsize;$z--){

                $arr["$x:$z"] = $x.":".$z;
                $i++;
                $x++;
                $z++;

            }
        }
      return $arr;


    }
}