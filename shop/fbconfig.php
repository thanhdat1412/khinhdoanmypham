<?php
	$fb = new Facebook\Facebook([
	  'app_id' => '6248094781871942', // Replace {app-id} with your app id
	  'app_secret' => '724934ba452b666d1a10695254d7876f',
	  'default_graph_version' => 'v15.0',
	  ]);

	$helper = $fb->getRedirectLoginHelper();

	$permissions = ['email']; // Optional permissions
	$loginUrl = $helper->getLoginUrl('https://shop.com/fb-callback.php', $permissions);

	echo '<a href="' . htmlspecialchars($loginUrl) . '"></a>';
?>