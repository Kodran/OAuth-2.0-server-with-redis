<?php
//include our OAuth2 Server object
require_once __DIR__.'/server.php';
require_once 'util.php';

// Handle a request for an OAuth2.0 Access Token and send the response to the client
$request = OAuth2\Request::createFromGlobals();


//$scopeRequired = 'postonwall';
if (!$server->verifyResourceRequest($request)) {
    echo jsonResponse($server->getResponse()->getStatusCode(),$server->getResponse()->getParameters());
    die;
}

$response = new OAuth2\Response();
echo json_encode(array('success' => true, 'message' => 'You have accessed to my APIs!'));

//This line will return token info
//echo jsonResponse($server->getResponse()->getStatusCode(),$server->getAccessTokenData($request,$response))

?>