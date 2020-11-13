<?php

declare(strict_types=1);

namespace SubUrbanCradles\HypixelHalloweenPumplin;

use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\item\ItemIds;
use pocketmine\level\Explosion;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        Item::addCreativeItem(Item::get(ItemIds::PUMPKIN)->setCustomName('§o§cHalloween§6 Pumpkin'));
    }


    public function onPlacePumpkin (BlockPlaceEvent $event) {
        $player = $event->getPlayer();
        $pumpkin = $event->getBlock();
        if ($player->getInventory()->getItemInHand()->getCustomName() === '§o§cHalloween§6 Pumpkin') {
            $event->setCancelled(true);
            $explosion = new Explosion($pumpkin->asPosition(), 0.1, $this);
            $explosion->explodeB();
            $player->getInventory()->getItemInHand()->setCount($player->getInventory()->getItemInHand()->getCount() - 1);
        }
    }
}
