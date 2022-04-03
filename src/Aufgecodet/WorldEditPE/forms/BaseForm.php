<?php

namespace Aufgecodet\WorldEditPE\forms;

use Aufgecodet\API;
use jojoe77777\FormAPI\CustomForm;
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\player\Player;
use pocketmine\Server;

class BaseForm{
    public static function openBrushMenu(Player $player){
        $form = new CustomForm(function (Player $player,array $data = null){
             if($data === null){
                 return;
             }
             if($data[0]){
                 if($data[0] === null){
                     return;
                 }
                 Server::getInstance()->getCommandMap()->dispatch($player,"brush cube ".$data[0]);

             }
        });
        $form->setTitle("§6§lBrushes");
        $form->addInput("Size");
        $form->sendToPlayer($player);
    }
    public static function ui(Player $player){
        $form = new SimpleForm(function (Player $player,int $data = null){
           switch ($data){
               case 0:
                  Server::getInstance()->getCommandMap()->dispatch($player,"pos1");
                   break;
               case 1:
                   Server::getInstance()->getCommandMap()->dispatch($player,"pos2");
                   break;
               case 2:

                   break;
               case 3:
                   Server::getInstance()->getCommandMap()->dispatch($player,"snow");
                   break;
               case 4:
                   Server::getInstance()->getCommandMap()->dispatch($player,"naturalize");
                   break;
               case 5:

                   break;
               case 6:
                   Server::getInstance()->getCommandMap()->dispatch($player,"undo");
                   break;
               case 7:

                   break;
               case 8:
                   Server::getInstance()->getCommandMap()->dispatch($player,"wand");
                   break;
               case 9:
                   Server::getInstance()->getCommandMap()->dispatch($player,"clearinv");
                   break;
           }
        });
        $form->setTitle("§5§lWorldEditPE UI");
        $form->setContent("§7WorldEditPE© by Aufgecodet");
        $form->addButton("§aSet Position 1",0,"textures/items/wooden_pickaxe");
        $form->addButton("§aSet Position 2",0,"textures/items/wooden_pickaxe");
        $form->addButton("§aBrush",0,"textures/items/stick");
        $form->addButton("§aSnow a area","textures/items/snow_ball");
        $form->addButton("§aNaturalize a area","textures/blocks/grass");
        $form->addButton("§aFill a area","textures/items/stone");
        $form->addButton("§aUndo a action");
        $form->addButton("§aReplace a area","textures/items/stone_bricks");
        $form->addButton("§aGive wand axe","textures/items/wooden_pickaxe");
        $form->addButton("§aClear your inventory");
        $form->sendToPlayer($player);

    }
    public static function replaceUI(Player $player){
        $form = new CustomForm(function (Player $player,array $data = null){
            if($data === null){
                return;
            }
            if($data[0]){
              if($data[1])
                Server::getInstance()->getCommandMap()->dispatch($player,"replace ".$data[0]." ".$data[1]);

            }
        });
        $form->setTitle("§6§lBrushes");
        $form->addInput("Block which will replace");
        $form->addInput("Block");
        $form->sendToPlayer($player);
    }
}