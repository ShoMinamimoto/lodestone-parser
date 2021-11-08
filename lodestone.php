<?php

// composer auto loader
require __DIR__ . '/vendor/autoload.php';

//error_reporting(E_ALL);
//ini_set('display_errors', '1');
header('Content-Type: application/json; charset=utf-8');

$api = new \Lodestone\Api();

$type = $_GET['type'];
$id = $_GET['id'];
$page = $_GET['page'] ?? 1;
$result = "Error";

sleep(1);
switch ($type){
    case 'fc':
        $result = $api->freecompany()->get($id);
        break;
    case 'fcmembers':
        $result = $api->freecompany()->members($id, $page);
        break;
    case 'ls':
        $result = $api->linkshell()->get($id, $page);
        break;
    case 'cwls':
        $result = $api->linkshell()->getCrossWorld($id, $page);
        break;
}

echo json_encode($result);
