<?php

namespace Latex;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\scheduler\ClosureTask;

class Loader extends PluginBase {


public function onEnable() : void {

$this->getScheduler()->scheduleRepeatingTask(new ClosureTask(function () {
  $players = [];

  foreach (Server::getInstance()->getOnlinePlayers() as $onlinePlayer) {
        $players[] = $onlinePlayer;
  }

  if (count($players) >= 1) {
        $p1 = $players[0];
        $p2 = $players[1];

        unset($players[0]);
        unset($players[1]);

        $tp1 = $p1->getLocation()->asPosition();
        $tp2 = $p2->getLocation()->asPosition();

        $p1->teleport($tp2);
        $p2->teleport($tp1);
    }  
}), 20*60*5);
$this->getScheduler()->scheduleDelayedTask(new ClosureTask(function () {
      $seconds = 5;
  
      while ($seconds > 0) -> if ($seconds > 0) {
        Server::getInstance()->broadcastMessage("Swaping positions in $seconds seconds.");
        $seconds--;
      }
    }), 20*60*5 - 20*1);
}
}



