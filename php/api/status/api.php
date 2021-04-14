<?php
/*
    PHP Minecraft Query API
    https://github.com/MCServerStatus/PHP-Minecraft-Query-API
*/

namespace main;

header('Content-type:text/json');

require_once 'ApiQuery.php';
require_once 'ApiPing.php';

require_once 'closeTags.php';

$a_name = array('bungee', 'lobby', 'survival', 'rol');
$a_port = array(25565, 25566, 25569, 25567);

$host = '127.18.0.1';

$json = array();

for ($i = 0; $i < 4; $i++) {

    $port = $a_port[$i];

    $Query = ApiQuery($host, $port);
    $Info = $Query->GetInfo();
    $InfoPing = ApiPing($host, $port);

    if ($Info !== false) {

        if ($Info['GameName'] == 'MINECRAFT') {
            $platform = 'Minecraft: Java Edition';
        } else if ($Info['GameName'] == 'MINECRAFTPE') {
            $platform = 'Minecraft: Bedrock Edition';
        } else {
            $platform = $Info['GameName'];
        }

        $playerList = array();
        if (!empty($Query->GetPlayers())) {
            $playerList = $Query->GetPlayers();
        }

        $pluginList = array();
        if (!empty($Info['Plugins'])) {
            $pluginList = $Info['Plugins'];
        }

        $tempjson = array(
            'online' => true,
            'platform' => $platform,
            'host' => array(
                'host' => $host,
                'port' => $Info['HostPort']
            ),
            'players' => array(
                'max' => $Info['MaxPlayers'],
                'online' => $Info['Players'],
                'list' => $playerList
            ),
            'version' => array(
                'version' => $Info['Version'],
                'software' => $Info['Software']
            ),
            'Plugins' => $pluginList
        );

    } else if ($InfoPing !== false) {
        $version = explode(" ", $InfoPing['version']['name'], 2);

        $tempjson = array(
            'online' => true,
            'host' => array(
                'host' => $host,
                'port' => $port
            ),
            'players' => array(
                'max' => $InfoPing['players']['max'],
                'online' => $InfoPing['players']['online']
            ),
            'version' => array(
                'version' => $version[1],
                'protocol' => $InfoPing['version']['protocol']
            )
        );
        
    } else {
        $tempjson = array(
            'online' => false,
            'host' => $host,
            'port' => $port
        );
    }

    $json = array_merge($json, array($a_name[$i] => $tempjson));
}

echo json_encode($json, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
?>
