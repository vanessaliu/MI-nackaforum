<?php
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

<?php
}
?>

