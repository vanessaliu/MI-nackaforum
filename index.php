<?php
include ("header.php");
include("functions.php");
?>

<div class="row start-title">
 <div class="small-12 columns uppercase">
   <h1>Ladda upp din bästa matbild</h1>
 </div>
</div>

<div class="row">
 <div class="small-9 columns uppercase">
   <h2>Vinn en matkasse med varor utvalda av kocken Tommy Myllymäki</h2>
 </div>
</div>

<div class="row">
 <div class="small-8 columns">
   <h5>Följ instruktionerna nedan för att delta i tävlingen. Här i appen presenteras alla tävlingsbidrag som laddats upp via Instagram, och här kan du också rösta på dina favoritbilder. Varje vecka utser en jury, som består av bland annat Tommy Myllymäki, 4 vinnare. Dessa vinner en varsin lyxig matkasse med produkter utvalda av koken Tommy Myllemäki till ettt värde av 1200 kr. Du kan delta med bild och rösta fram tom den 3 november 2013. Läs mer om regler och priserna här. Lycka till!</h5>
 </div>
</div>

<div class="row steps">
 <div class="small-6 columns">
   <div class="callout panel">
     <div class="row callout-inner">
       <div class="small-2 columns">
         <h2>1</h2>
       </div>
       <div class="small-10 columns">
           <h4>Fota din mat rätt</h4>
           <h5>Ta ett foto med din mobil på en maträtt du köpt i någon av Nacka Forums caféer eller restauranger eller som du tillagat hemma tex. till middag</h5>
       </div><!-- end of small-10 -->
     </div> <!-- end of row -->
   </div> <!-- callout panel -->
 </div><!-- end of small-5 push-1 columns -->
 <div class="small-6 columns">
   <div class="callout panel">
     <div class="row callout-inner">
       <div class="small-2 columns">
         <h2>2</h2>
       </div>
       <div class="small-10 columns">
           <h4>Ladda upp fotot på instagram</h4>
           <h5>Följ @nackaforum på Instagram och se till att ditt konto är publikt</h5>
       </div><!-- end of small-10 -->
     </div> <!-- end of row -->
   </div>
 </div><!-- end of small-5 pull-1 columns -->
</div><!-- end of row -->

<div class="row">
 <div class="small-6 columns">
   <div class="callout panel">
     <div class="row callout-inner">
       <div class="small-2 columns">
         <h2>3</h2>
       </div>
       <div class="small-10 columns">
           <h4>Tagga</h4>
           <h5>Tagga bilden med: #nackaforummatochvin</h5>
       </div><!-- end of small-10 -->
     </div> <!-- end of row -->
   </div>
 </div>
 <div class="small-6 columns">
   <div class="callout panel">
     <div class="row callout-inner">
       <div class="small-2 columns">
         <h2>4</h2>
       </div>
       <div class="small-10 columns">
           <h4>Rösta</h4>
           <h5>På ditt eller andra bidrag via Nacka Forums Facebooksida</h5>
       </div><!-- end of small-10 -->
     </div> <!-- end of row -->
   </div>
 </div>
</div>

<div class="row">
 <div class="small-4 columns">
     <h3 class="uppercase">Senaste bidarg</h3>
 </div>
 <div class="small-3 columns">
     <a href="#" class="uppercase">Se alla bidrag</a>
 </div>
</div>

<div class="row">
<?php
  
  // $photos =  getInstagramPhotosFromUser('vanessaliuchen2012','9cd60ab846f743fcbc7a95d4c058dcc4',0);
  $photos =  getInstagramPhotosByTag('birditup2014', '9cd60ab846f743fcbc7a95d4c058dcc4', 9);
    foreach ($photos->data as $photo) {
?>
      <div class="small-4 columns contribution">
      <?php
        echo "<h6>".$photo->user->full_name."</h6>";
        echo "<a href='" . $photo->link . "' target='_blank'><img src='" . $photo->images->low_resolution->url . "'></a><br />";
       ?> 
         <div class="row">
          <div class="small-4 medium-4 small-4 columns">     
              <p><i class="fi-heart"> <?php echo $photo->likes->count;?></i> </p> 
          </div>
          <div class="small-2 medium-2 small-2 columns">
              <p><i class="fi-share"></i></p>
          </div>
          <div class="small-6 medium-6 small-6 columns">  
              <button class="uppercase tiny vote-button">Rösta</button>
          </div>
        </div>

      </div><!-- end of small-4 columns -->

<?php 
// echo $photo->user->username;
   }
?>
</div>


<?php
include ("footer.php");
?>