<?php

namespace NoobMCBG\SimpleCommands;
 
use pocketmine\utils\Config; 
use pocketmine\event\Listener as L;
use pocketmine\plugin\PluginBase as PB;
use pocketmine\command\{Command, CommandSender};
use pocketmine\Player;

class Main extends PB implements L {

    private $cfg;

    public function onEnable() {
      @mkdir($this->getDataFolder());
      $this->getServer()->getPluginManager()->registerEvents($this,$this);
      $this->saveResource("config.yml");
      $cfg = new Config($this->getDataFolder() . "config.yml", Config::YAML);
      $cfg->save();
      $this->getLogger()->info("Enable Plugin");
    }

    public $fts;

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool {
        $fts = "[SimpleCommands]";
        $this->fts = $fts;

        if ($cmd->getName() == "day") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("simplecommand.command.day")) {
                    $sender->getLevel()->setTime(1000);
                    $sender->sendMessage($cfg->get("day-successfully"));
                    return true;
                } else {
                    $sender->sendMessage($cfg->get("no-permission"));
                    return true;
                }
            }
            return true;
        }
        if ($cmd->getName() == "night") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("simplecommand.command.night")) {
                    $sender->getLevel()->setTime(23000);
                    $sender->sendMessage($cfg->get("night-successfully"));
                    return true;
                } else {
                    $sender->sendMessage($cfg->get("no-permission"));
                    return true;
                }
            }
            return true;
        }
        if ($cmd->getName() == "gms") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("simplecommand.command.gms")) {
                    $sender->setGamemode(0);
                    $sender->sendMessage($cfg->get("gamemode-successfully"));
                } else {
                    $sender->sendMessage($cfg->get("no-permission"));
                }
            }
            return true;
        }
        if ($cmd->getName() == "gmc") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("simplecommand.command.gmc")) {
                    $sender->setGamemode(1);
                    $sender->sendMessage($cfg->get("gamemode-successfully"));
                } else {
                    $sender->sendMessage($cfg->get("no-permission"));
                }
            }
            return true;
        }
        if ($cmd->getName() == "gma") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("simplecommand.command.gma")) {
                    $sender->setGamemode(2);
                    $sender->sendMessage($cfg->get("gamemode-successfully"));
                } else {
                    $sender->sendMessage($cfg->get("no-permission"));
                }
            }
            return true;
		}
        if ($cmd->getName() == "heal") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("simplecommand.command.heal")) {
                    $sender->setHealth(999999);
                    $sender->sendMessage($cfg->get("heal-successfully"));
                } else {
                    $sender->sendMessage($cfg->get("no-permission"));
                }
            }
            return true;
        }
        if ($cmd->getName() == "food") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("simplecommand.command.food")) {
                    $sender->setFood(20);
                    $sender->sendMessage($cfg->get("food-successfully"));
                } else {
                    $sender->sendMessage($cfg->get("no-permission"));
                }
            }
            return true;
        }
        if ($cmd->getName() == "gmspc") {
            if ($sender instanceof Player) {
                if ($sender->hasPermission("simplecommand.command.gmspc")) {
                    $sender->setGamemode(3);
                    $sender->sendMessage($cfg->get("gamemode-successfully"));
                } else {
                    $sender->sendMessage($cfg->get("no-permission"));
                }
            }
            return true;
         }
        return true;
        }
    }