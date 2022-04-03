<?php

declare(strict_types = 1);
namespace Aufgecodet\WorldEditPE\axe;


use pocketmine\scheduler\Task;

class CooldownTask extends Task{
    /**
     * @author  Aufgecodet
     * @version 2.0
     * @copyright
     */
    public function onRun(): void
    {
        AxeEvent::$cooldown = false;
        $this->getHandler()->cancel();
        return;
    }
}