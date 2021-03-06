<?php
include ("credentials.inc");//inkluderar filen credentials.inc
include ("connection_db.php");//inkluderar koppling till databasen
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <title>Nacka Forum</title>

    <!-- META -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/vendor/foundation.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/foundation-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
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
