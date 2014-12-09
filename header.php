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
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="inner-contianer"> 
        <div class="row">
           <div class="small-12 columns">
             <nav>
               <section class="top-bar-section">
                 <!-- Left Nav Section -->
                 <ul class="left">
                   <li><a class="uppercase active" href="index.php">Tävla</a></li>
                   <li><a class="uppercase" href="allcontributions.php">Alla bidrag</a></li>
                   <li><a class="uppercase" href="#">Topplista</a></li>
                   <li><a class="uppercase" href="#">Vinnare</a></li>
                   <li><a class="uppercase" href="#">Regler & Priser</a></li>
                 </ul>
               </section>
             </nav>
           </div>
        </div>