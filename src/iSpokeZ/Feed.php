<?php

/*
* _  _____             _        ______
* (_)/ ____|           | |      |___  /
*  _| (___  _ __   ___ | | _____   / /
* | |\___ \| '_ \ / _ \| |/ / _ \ / /
* | |____) | |_) | (_) |   <  __// /__
* |_|_____/| .__/ \___/|_|\_\___/_____|
*          | |
*          |_|
*
*@author iSpokeZ (Umut Yıldırım)
*
*@RainzGG Tüm Hakları Saklıdır!
*
*@Eklenti Umut Yıldırım Tarafından Özel Olarak Kodlanmıştır. Dağıtılması Kesinlikle Yasaktır!
*
*@YouTube - iSpokeZ
*
*/

namespace iSpokeZ;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\plugin\Plugin;
use pocketmine\level\particle\HappyVillagerParticle;
use pocketmine\level\sound\ClickSound;
use pocketmine\math\Vector3;
use pocketmine\plugin\PluginBase;

class Feed extends PluginBase {

    public function onEnable(){
        $this->getLogger()->info("§7> §aAktif");
    }

    public function onDisable(){
        $this->getLogger()->info("§7> §cDe-Aktif");
    }

    public function onCommand(CommandSender $sender, Command $kmt, string $label, array $args): bool {
        switch($kmt->getName()){
            case "beslen":
                if($sender instanceof Player){
                    if($sender->hasPermission("feed.kmt")){
                        $sender->setFood(20);
                        $sender->getLevel()->addParticle(new HappyVillagerParticle($sender));
                        $sender->getLevel()->addSound(new ClickSound($sender));
                        $sender->sendPopup("§aAçlığın Giderildi");
                    }
                }
                break;
        }
        return true;
    }
}