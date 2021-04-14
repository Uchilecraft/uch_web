<?php
/*
    PHP Minecraft Query API
    https://github.com/MCServerStatus/PHP-Minecraft-Query-API
*/

namespace main;

use src\MinecraftQuery;
use src\MinecraftQueryException;

require_once __DIR__ . '/src/MinecraftQuery.php';
require_once __DIR__ . '/src/MinecraftQueryException.php';

function ApiQuery($host, $port) {

    $Timer = MicroTime(true);

    $Query = new MinecraftQuery();

    try {
        $Query->Connect($host, $port, 1);
    } catch(MinecraftQueryException $e) {
        $Exception = $e;
    }

    $Timer = Number_Format(MicroTime(true) - $Timer, 4, '.', '');

    return $Query;
}
?>
