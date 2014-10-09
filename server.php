<?php

require_once('lib/Predis/Autoloader.php');
$config = include 'config/config.php';

Predis\Autoloader::register();

$host = $config['REDIS_HOST'];
$port = $config['REDIS_PORT'];
$auth = $config['REDIS_AUTH'];
$db =   $config['REDIS_DB'];

//it takes default redis configuration
$predis = new Predis\Client();

//This lines init predis with custom configuration
/*
$predis = new Predis\Client(array(
    'host'     => $host, 
    'port'     => $port,
    'password' => $auth, 
    'database' => $db
));
*/

// error reporting
ini_set('display_errors',1);error_reporting(E_ALL);

// Autoloading (composer is preferred)
require_once('oauth2-server-php/src/OAuth2/Autoloader.php');

OAuth2\Autoloader::register();

//Redis connection
$storage = new OAuth2\Storage\Redis($predis);

// Pass a storage object or array of storage objects to the OAuth2 server class
$server = new OAuth2\Server($storage);

// Add all grant type desired
$server->addGrantType(new OAuth2\GrantType\ClientCredentials($storage));
$server->addGrantType(new OAuth2\GrantType\RefreshToken($storage));
$server->addGrantType(new OAuth2\GrantType\AuthorizationCode($storage));
$granttype = new OAuth2\GrantType\AuthorizationCode($storage);
$grantType = new OAuth2\GrantType\RefreshToken($storage);
$server->addGrantType($granttype);

?>
