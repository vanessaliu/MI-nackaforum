<?php
include ("credentials.inc");//inkluderar filen credentials.inc
include ("connection_db.php");//inkluderar koppling till databasen
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nacka Forum</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/foundation-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700|Raleway:400,600,800,900|Open+Sans' rel='stylesheet' type='text/css'>

    <script src="js/vendor/modernizr.js"></script>
  </head>

  <body>

    <div id="wrapper">
      <div class="container">

        <nav id="navigation">
            <ul>
                <li data-target="tavla" class="active"><a>Tävla</a></li>
                <li data-target="allabidrag"><a>Alla bidrag</a></li>
                <li data-target="topplista"><a>Topplista</a></li>
                <li data-target="vinnare"><a>Vinnare</a></li>
                <li data-target="reglerochpriser"><a>Regler &amp; Priser</a></li>
            </ul>
        </nav>
