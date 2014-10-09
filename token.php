<?php
// include our OAuth2 Server object
require_once __DIR__.'/server.php';
require_once 'util.php';

// Handle a request for an OAuth2.0 Access Token and send the response to the client

$request = OAuth2\Request::createFromGlobals();

//$server->handleTokenRequest($request)->send();
$response = new OAuth2\Response();
$server->handleTokenRequest($request, $response);

echo jsonResponse($server->getResponse()->getStatusCode(),$server->getResponse()->getParameters());

?>

