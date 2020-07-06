<?php

namespace flaviofoxy\joinUI;

use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;
use pocketmine\player\PlayerJoinEvent;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\command\{CommandSender, Command};

use UIAPI\{Form, ModalForm, SimpleForm, CustomForm};

class Main extends PluginBase implements Listener{
  
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    
  }
  
  public function onJoin(PlayerEventJoin $event){
    $player = $event->getPlayer();
    $this->onMenu($player);
    
  }
  
  public function onCommand(CommandSender $sender, Command $cmd, $label, array $args): bool{
    switch($cmd->getName()){
      case "fox":{
        $this->onMenu($sender);
        
      }
      return true;
    }
  }
  
  public function onMenu($sender){
    $api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
    $form = $api->createSimpleForm (function (Player $sender, int $data = null){
      $result = $data;
      if($result === null){
        return true;
      }
      switch($result){
        case 0;
        $sender->sendMessage("Enjoy To Plays");
        break;
      }
    });
    $form->setTitle("FoxyUI");
    $form->setContent("Welcome In This Server.");
    $form->addButton("SendMessage", 0, "texture/items/sword_diamond");
    $form->sendToPlayer($sender);
     return $form;
  }
  
}
