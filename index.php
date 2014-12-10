<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
session_start();
require_once( 'Facebook/HttpClients/FacebookHttpable.php' );
require_once( 'Facebook/HttpClients/FacebookCurl.php' );
require_once( 'Facebook/HttpClients/FacebookCurlHttpClient.php' );

require_once( 'Facebook/Entities/AccessToken.php' );
require_once( 'Facebook/Entities/SignedRequest.php' );

require_once( 'Facebook/FacebookSession.php' );
require_once( 'Facebook/FacebookRedirectLoginHelper.php' );
require_once( 'Facebook/FacebookSignedRequestFromInputHelper.php' ); 
require_once( 'Facebook/FacebookRequest.php' );
require_once( 'Facebook/FacebookResponse.php' );
require_once( 'Facebook/FacebookSDKException.php' );
require_once( 'Facebook/FacebookRequestException.php' );
require_once( 'Facebook/FacebookOtherException.php' );
require_once( 'Facebook/FacebookAuthorizationException.php' );

// canvas och tab apps
require_once( 'Facebook/FacebookCanvasLoginHelper.php' );
require_once( 'Facebook/FacebookPageTabHelper.php' );

require_once( 'Facebook/GraphObject.php' );
require_once( 'Facebook/GraphSessionInfo.php' );

use Facebook\HttpClients\FacebookHttpable;
use Facebook\HttpClients\FacebookCurl;
use Facebook\HttpClients\FacebookCurlHttpClient;

use Facebook\Entities\AccessToken;
use Facebook\Entities\SignedRequest;

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookSignedRequestFromInputHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookOtherException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphSessionInfo;

//canvas och tab apps
use Facebook\FacebookCanvasLoginHelper;
use Facebook\FacebookPageTabHelper;

// this line has to be changed according to different app id
FacebookSession::setDefaultApplication('1386865751606193', 'fb13e2efd82e689be45668113dcaf054');
$pageHelper = new FacebookPageTabHelper();
 
// echo '<p>sida id: ' . $pageHelper->getPageId() . '</p>';
// echo '<p>admin: ' . $pageHelper->isAdmin() . '</p>';



$session = $pageHelper->getSession();

if ( isset( $session ) ) {
  
  //Visa user id
  // echo 'User Id: ' . $pageHelper->getUserId();
 
  // graph api call för att få user data
  // $request = new FacebookRequest( $session, 'GET', '/me' );
  // $response = $request->execute();
  
  // Hantera svaret
  // $graphObject = $response->getGraphObject()->asArray();
  
  // skriv ut användar objectet
  // echo '<pre>' . print_r( $graphObject, 1 ) . '</pre>';
  // echo "Hello Chen";
  include("functions.php");
  include("templates/header.php");

  // different page sections
  include("templates/start.php");
  include("templates/all.php");
  include("templates/top.php");
  include("templates/winners.php");
  include("templates/rules.php");

  include("templates/footer.php");

} else {
  // login url [installera app]
  $helper = new FacebookRedirectLoginHelper('https://www.facebook.com/nackaforumChen/app_1386865751606193');
  echo '<a href="' . $helper->getLoginUrl( array( 'email', 'user_friends' ) ) . '" target="_top">Login</a>';
}

?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>