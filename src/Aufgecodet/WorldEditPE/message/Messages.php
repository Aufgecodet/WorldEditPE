<?php


namespace Aufgecodet\WorldEditPE\message;


use Aufgecodet\WorldEditPE\Main;

class Messages{
    /**
     * @author  Aufgecodet
     * @version 1.0
     */
    /** Get Message */
    public static function getMessage(string $key):string{
        $config = Main::getInstance()->getConfig();
        return $config->getNested("messages.".$key);
    }
}