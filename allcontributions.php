<?php
include ("header.php");
include("functions.php");
?>

<div class="row start-title">
 <div class="small-12 columns uppercase">
   <h1>Alla Bidrag</h1>
 </div>
</div>

<div class="row">
 <div class="small-8 columns">
   <h5>Här ser du  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam ex tempora, incidunt assumenda natus rem qui neque hic ipsam harum!  </h5>
 </div>
</div>


<div class="row"> 
  <div class="small-3 columns">
     <a href="#" class="uppercase">Nästa</a>
  </div>
</div>


<div class="row">
<?php
  
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
              <a href="vote.php?contribution_id=<?php echo $photo->user->id;?>" class="uppercase tiny vote-a">Rösta</a>
              
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