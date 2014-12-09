<?php
include ("header.php");
include("functions.php");

$photos =  getInstagramPhotosByTag('birditup2014', '9cd60ab846f743fcbc7a95d4c058dcc4', 9);
?>

<div id="section-start">
    <section>
       <h1>Ladda upp din bästa matbild</h1>
       <h2>Vinn en matkasse med varor utvalda av kocken Tommy Myllymäki</h2>
       <p>Följ instruktionerna nedan för att delta i tävlingen. Här i appen presenteras
       alla tävlingsbidrag som laddats upp via Instagram, och här kan du också rösta på dina
       favoritbilder. Varje vecka utser en jury, som består av bland annat Tommy Myllymäki,
       4 vinnare. Dessa vinner en varsin lyxig matkasse med produkter utvalda av koken Tommy
       Myllymäki till ett värde av 1200 kr. Du kan delta med bild och rösta fram tom den 3
       november 2013. Läs mer om regler och priserna här. Lycka till!</p>
    </section>

    <section>
        <div class="row">
            <div class="small-6 columns">
                <div class="small-1 columns">1</div>
                <div class="small-11 columns">
                    <h4>Fota din mat rätt</h4>
                    <p>Ta ett foto med din mobil på en maträtt du köpt i någon av Nacka Forums caféer eller restauranger eller som du tillagat hemma tex. till middag</p>
                </div>
            </div>
            <div class="small-6 columns">
                <div class="small-1 columns">2</div>
                <div class="small-11 columns">
                    <h4>Ladda upp fotot på instagram</h4>
                    <p>Följ @nackaforum på Instagram och se till att ditt konto är publikt</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="small-6 columns">
                <div class="small-1 columns">3</div>
                <div class="small-11 columns">
                    <h4>Tagga</h4>
                    <p>Tagga bilden med: #nackaforummatochvin</p>
                </div>
            </div>
            <div class="small-6 columns">
            <div class="small-1 columns">4</div>
                <div class="small-11 columns">
                    <h4>Rösta</h4>
                    <p>På ditt eller andra bidrag via Nacka Forums Facebooksida</p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="section-header">
            <h3>Senaste bidragen</h3>
            <a href="">Se alla bidrag</a>
        </div>

        <div class="section-grid">
            <?php foreach ($photos->data as $photo) { ?>
                <div class="small-4 columns contribution">
                    <h3><?php echo $photo->user->full_name; ?></h3>
                    <div class="contribution-image">
                        <a href="<?php echo $photo->link; ?>" target="_blank">
                            <img src="<?php echo $photo->images->low_resolution->url; ?>" alt="">
                        </a>
                    </div>

                    <div class="row">
                        <div class="small-4 columns">
                          <p><i class="fi-heart"><?php echo $photo->likes->count;?></i> </p>
                        </div>
                        <div class="small-2 columns">
                          <p><i class="fi-share"></i></p>
                        </div>z
                        <div class="small-6 columns">
                          <button class="uppercase tiny vote-button">Rösta</button>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>
    </section>

</div>

<div id="section-all">

</div>

<div id="section-top">

</div>

<div id="section-winners">

</div>

<div id="section-rules">

</div>






<?php
include ("footer.php");
?>
