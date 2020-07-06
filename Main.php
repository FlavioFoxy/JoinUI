<?php

namespace FoxyUI;

use pocketmine\plugin\PluginBase;

use pocketmine\Player;
use pocketmine\Server;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

use pocketmine\command\{CommandSender, Command};

use UIAPI\{from, ModalForm, SimpleForm, CustomForm);

class Main extends PluginBase implements Listener {
	
  public function onEnabled(){
    $this->getServer()->getPluginMenager()->registerEvents($this, $this);
  }
  
  public function onJoin(PlayerJoinEvent $event){
    $player = event->getPlayer();
    $this->onMenu($player)
  }
  
  public function onCommand(CommandSender $sender, Command $cmd,  $label, Array $args): bool{
  	
    switch($cmd->getName()){
       case "foxy":{
       	$this->onMenu($sender);
       }
       return true;
      }
   }
   
   public function onMenu($sender){
   	$api = $this->getServer()->getPluginMenager()->getPlugin("FormAPI");
       $form = $api->createSimpleForm (function (player $seder, int $data = null){
       	$result = data;
            if(result === null){
               return true;
            }
            switch($result);
                 case 0;
                 $sender->sendMessage("Hello Bro");
                 break;
             }
       });
       $form->getTitle("Foxy UI");
       $form->setContenet("Welcome To Server.");
       $form->addButton("SendMessage", 0, "texture/items/diamond_sword");
       $form->sendToPlayer($sender);
           return $from;
   }
   
}           	