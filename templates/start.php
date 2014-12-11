<div class="page" id="section-start">
    <div class="background-image"></div>

    <section>
        <h2>Ladda upp din bästa matbild</h2>
        <h3>Vinn en matkasse med varor utvalda av kocken Tommy Myllymäki</h3>
        <p>Följ instruktionerna nedan för att delta i tävlingen. Här i appen presenteras
        alla tävlingsbidrag som laddats upp via Instagram, och här kan du också rösta på dina
        favoritbilder. Varje vecka utser en jury, som består av bland annat Tommy Myllymäki,
        4 vinnare. Dessa vinner en varsin lyxig matkasse med produkter utvalda av koken Tommy
        Myllymäki till ett värde av 1200 kr. Du kan delta med bild och rösta fram tom den 3
        november 2013. Läs mer om regler och priserna <a href="#">här</a>. Lycka till!</p>
    </section>

    <section>
        <div class="rules-grid row">
            <div class="small-6 columns rules-column">
                <div class="column-inner">
                    <div class="column-border"></div>
                    <div class="small-1 columns">
                        <span>1</span>
                    </div>
                    <div class="small-11 columns">
                        <h4>Fota din mat rätt</h4>
                        <p>Ta ett foto med din mobil på en maträtt du köpt i någon av Nacka Forums caféer eller restauranger eller som du tillagat hemma tex. till middag</p>
                    </div>
                </div>
            </div>
            <div class="small-6 columns rules-column">
                <div class="column-inner">
                    <div class="column-border"></div>
                    <div class="small-1 columns">
                        <span>2</span>
                    </div>
                    <div class="small-11 columns">
                        <h4>Ladda upp fotot på instagram</h4>
                        <p>Följ @nackaforum på Instagram och se till att ditt konto är publikt</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="rules-grid row">
            <div class="small-6 columns rules-column">
                <div class="column-inner">
                    <div class="column-border"></div>
                    <div class="small-1 columns">
                        <span>3</span>
                    </div>
                    <div class="small-11 columns">
                        <h4>Tagga</h4>
                        <p>Tagga bilden med: #nackaforummatochvin</p>
                    </div>
                </div>
            </div>
            <div class="small-6 columns rules-column">
                <div class="column-inner">
                    <div class="column-border"></div>
                    <div class="small-1 columns">
                        <span>4</span>
                    </div>
                    <div class="small-11 columns">
                        <h4>Rösta</h4>
                        <p>På ditt eller andra bidrag via Nacka Forums Facebooksida</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="section-header">
            <h3>Senaste bidragen</h3>
            <a data-target="allabidrag" class="pagelink">Se alla bidrag</a>
        </div>
        <div class="clearfix"></div>

        <div class="section-grid">
            <?php $photos =  getInstagramPhotosByTag('birditup2014', '9cd60ab846f743fcbc7a95d4c058dcc4', 9); ?>
            <?php foreach ($photos->data as $photo) { ?>
                <div class="small-4 columns contribution">
                    <div class="contribution-inner">

                        <h5><?php echo $photo->user->full_name; ?></h5>
                        <div class="contribution-image">
                            <a href="<?php echo $photo->link; ?>" target="_blank">
                                <img src="<?php echo $photo->images->low_resolution->url; ?>" alt="">
                            </a>
                        </div>

                        <div class="contribution-actions">
                            <!-- if likes->count = 0, addclass inactive to i -->
                            <div><i class="fi-heart <?php if($photo->likes->count == 0){echo 'inactive';} ?>"><span><?php echo $photo->likes->count;?></span></i></div>
                            <div><i class="fi-share"></i></div>
                            <!-- <button class="uppercase tiny vote-button">Rösta</button> -->
                            <a href="vote.php?contribution_id=<?php echo $photo->id;?>" class="uppercase tiny vote-button">Rösta</a>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>

        <div class="clearfix"></div>
    </section>

</div>
