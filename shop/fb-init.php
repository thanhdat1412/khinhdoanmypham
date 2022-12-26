<?php
	session_start();
require("Facebook/autoload.php");
if(isset($_SESSION['access_token']))
{
	header("Localtion:index.php");
}
$fb = new Facebook\Facebook([
	  'app_id' => '6248094781871942', // Replace {app-id} with your app id
	  'app_secret' => '724934ba452b666d1a10695254d7876f',
	  'default_graph_version' => 'v15.0',
	  ]);
$helper = $fb->getRedirectLoginHelper();
if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}
$login_Url = $helper->getLoginUrl('https://shop.com/fb-init.php');

try {
  $accessToken = $helper->getAccessToken();
	if(isset($accessToken)) {
		$_SESSION['access_token'] = (string)$accessToken;
		header("Localtion:index.php");
	}
}catch(Exceptions $e){
	echo $e->getTraceAsString();
}
if (isset($_SESSION['access_token']))
{

	try{
		$fb->setDefaultAccessToken($_SESSION['access_token']);
		$res = $fb->get('/me?locale=en_US&fields=name,email');
		$user = $res->getGraphUser();
	}catch(Exceptions $e){
		echo $e->getTraceAsString();
	}
}

?>