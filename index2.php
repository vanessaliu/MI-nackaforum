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


////////////////// welcome.php ////////////////////////////

$session = $pageHelper->getSession();

if ( isset( $session ) ) {

  include("functions.php");
  include("templates/header.php");

  // different page sections
  include("templates/start.php");
  include("templates/all.php");
  include("templates/top.php");
  include("templates/winners.php");
  include("templates/rules.php");

  include("templates/footer.php");

} else {?>

    <!doctype html>
    <html class="no-js" lang="en">
      <head>
        <title>Nacka Forum</title>

        <!-- META -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- CSS -->
        <link rel="stylesheet" href="css/vendor/foundation.min.css" />
        <link rel="stylesheet" href="css/vendor/foundation-icons.css">
        <link rel="stylesheet" href="css/style.css">

        <!-- FONTS -->
        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700|Raleway:400' rel='stylesheet' type='text/css'>

        <!-- MODERNIZR -->
        <script src="js/vendor/modernizr.js"></script>
      </head>

      <body>

        <div id="wrapper">
          <div class="container" id="container-welcome">
            <div class="page-welcome" id="section-welcome">
                <div class="background-image"></div>

                <section>
                    <h2>Ladda upp din bästa matbild</h2>
                    <h3>Vinn en matkasse med varor utvalda av kocken Tommy Myllymäki</h3>
                </section>
            </div>
            <div class="small-4 columns rules-column">
                <div class="column-inner">
                    <div class="column-border"></div>
                        <h4>Lägg till appen för att gå vidare</h4>
                        <?php
                          // login url [installera app]
                          $helper = new FacebookRedirectLoginHelper('https://www.facebook.com/nackaforumChen/app_1386865751606193');
                          echo '<a href="' . $helper->getLoginUrl( array( 'email', 'user_friends' ) ) . '" target="_top">KLICKA HÄR</a>';
                        ?>
                </div>
            </div>

            <footer id="welcome-footer">
                <div class="logo"></div>
            </footer>

          </div>
        </div>

        <script src="js/vendor/jquery-1.11.1.min.js"></script>
        <script src="js/vendor/foundation.min.js"></script>

        <script src="js/main.js"></script>

      </body>
    </html>

<?php } ?>
