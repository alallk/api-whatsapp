<?php
/**
 * Created by PhpStorm.
 * User: alallk
 * Date: 16/06/17
 * Time: 17:58
 */
spl_autoload_register(); // don't load our classes unless we use them
require __DIR__ . '/vendor/jacwright/restserver/source/Jacwright/RestServer/RestServer.php';
require __DIR__ . '/src/controller/AutheticationController.php';
require __DIR__ . '/src/controller/ChatController.php';

use Jacwright\RestServer\RestServer;


$mode = 'debug'; // 'debug' or 'production'
$realm = 'Whatsapp API';

$server = new RestServer($mode,$realm);
//$server->refreshCache(); // uncomment momentarily to clear the cache if classes change in production mode

//API V1
$api_v1 = 'api/v1';
$server->addClass('Authentication',$api_v1.'/auth');
$server->addClass('ChatController',$api_v1.'/chat');

//API V2
//NONE


$server->handle();