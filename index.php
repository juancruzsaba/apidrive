<?php
session_start();
$url_array = explode('?', 'http://'.$_SERVER ['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$url = $url_array[0];

require_once 'google-api-php-client/src/Google_Client.php';
require_once 'google-api-php-client/src/contrib/Google_DriveService.php';

$client = new Google_Client();
$client->setClientId('956173095927-ek64q6an24hidpqru7nl0djtnfi6p4f4.apps.googleusercontent.com');
$client->setClientSecret('ooyFYOg7zUh6Dz_cU5WVUgPi');
$client->setRedirectUri($url);
$client->setUseObjects(true);
$client->setScopes(array('https://www.googleapis.com/auth/drive'));

if (isset($_GET['code'])) {
    $_SESSION['accessToken'] = $client->authenticate($_GET['code']);
    header('location:'.$url);exit;
} elseif (!isset($_SESSION['accessToken'])) {
    $client->authenticate();
}

$resultados = array();
$param = array();
$pageToken = NULL;
$parameters = array();

$parameters['maxResults'] = 30;
$parameters['q'] = "";


$client->setAccessToken($_SESSION['accessToken']);
$service = new Google_DriveService($client);

$archivos = $service->files->listFiles($parameters);
$resultados = array_merge($resultados, $archivos->getItems());


include 'vista.php';
?>