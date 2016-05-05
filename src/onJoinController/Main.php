<?php

namespace onJoinController;

use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener {

    public function onLoad(){
                $this->getLogger()->info("Loading onJoinController");
        }

        public function onEnable(){
                $this->getLogger()->info("OnJoinController has been enabled");
                $this->getServer()->getPluginManager()->registerEvents($this, $this);
                $this->saveDefaultConfig();
            }
        
            public function onJoin(PlayerJoinEvent $event) {
                    if($this->getConfig()->get("enablejoin") === "true"){
                    $player = $event->getPlayer();
                    foreach($this->getConfig()->get("JoinCommand") as $command){
                    $this->getServer()->dispatchCommand(new ConsoleCommandSender(), str_replace("{player}", $player->getName(), $command));   
                    }
                }
            }
    public function onDisable(){
            $this->getLogger()->info("OnJoinController has been disabled");
        }
            } 
