<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '879069969702-1nn8rsbd7pluvtgddad89kiejc5a9o7j.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'Am4mfTMMxTZsQq4fY-lrkEMc'; //Google client secret
$redirectURL = 'http://localhost/blog/'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('HSBlogGoogleAPI');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
