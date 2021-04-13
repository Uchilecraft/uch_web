<?php
/*
    PHP Minecraft Query API
    https://github.com/MCServerStatus/PHP-Minecraft-Query-API
*/

namespace main;

use src\MinecraftPing;
use src\MinecraftPingException;

require_once __DIR__ . '/src/MinecraftPing.php';
require_once __DIR__ . '/src/MinecraftPingException.php';

function ApiPing($host, $port) {

    $Timer = MicroTime(true);

    $InfoPing = false;
    $QueryPing = null;

    try {
        $QueryPing = new MinecraftPing($host, $port, 1);

        $InfoPing = $QueryPing->Query();

        if($InfoPing === false) {
            $QueryPing->Close();
            $QueryPing->Connect();

            $InfoPing = $QueryPing->QueryOldPre17();
        }
    } catch(MinecraftPingException $e) {
        $Exception = $e;
    }

    if($QueryPing !== null) {
        $QueryPing->Close();
    }

    $Timer = Number_Format(MicroTime(true) - $Timer, 4, '.', '');

    return $InfoPing;
}
?>
