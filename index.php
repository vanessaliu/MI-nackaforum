<?php
include ("header.php");
include("functions.php");

?>

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
            <a href="">Se alla bidrag</a>
        </div>
        <div class="clearfix"></div>

        <div class="section-grid">
            <?php $photos =  getInstagramPhotosByTag('pony', '9cd60ab846f743fcbc7a95d4c058dcc4', 9); ?>
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
                            <a href="vote.php?contribution_id=<?php echo $photo->user->id;?>" class="uppercase tiny vote-button">Rösta</a>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>

        <div class="clearfix"></div>
    </section>

</div>


<div class="page" id="section-all">
    <div class="background-image"></div>

    <section>
        <h2>Alla bidrag</h2>
        <p>Här ser du alla bidrag i tävlingen. Var med och tävla du också och ta
        chansen att vinna en lyxig matkasse värd 1200 kr utvald av kocken Tommy Myllymäki.</p>
        <button>Tävla här</button>
    </section>

    <section>
        <div class="section-paginering"></div>
        <div class="section-grid">
            <?php $photos =  getInstagramPhotosByTag('pony', '9cd60ab846f743fcbc7a95d4c058dcc4', 9); ?>
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
                            <a href="vote.php?contribution_id=<?php echo $photo->user->id;?>" class="uppercase tiny vote-button">Rösta</a>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>

        <div class="clearfix"></div>
    </section>

</div>

<div class="page" id="section-top">
    <div class="background-image"></div>

    <section>
        <h2>Topplista</h2>
        <p>Här ser du de bidrag som leder tävlingen. Var med och tävla du också
        och ta chansen att vinna en lyxig matkasse värd 1200 kr utvald av kocken Tommy Myllymäki.</p>
        <button>Tävla här</button>
    </section>

    <section>
        <div class="section-grid">
            <?php $photos =  getInstagramPhotosByTag('pony', '9cd60ab846f743fcbc7a95d4c058dcc4', 9); ?>
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
                            <a href="vote.php?contribution_id=<?php echo $photo->user->id;?>" class="uppercase tiny vote-button">Rösta</a>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>

        <div class="clearfix"></div>
    </section>

</div>

<div class="page" id="section-winners">

    <div class="background-image"></div>

    <section>
        <h2>Vinnare</h2>
        <p>Här presenteras alla vinnare i tävlingen. Varje vecka utser en jury,
        som består av bland annat Tommy Myllymäki, 4 vinnare. Var med och tävla
        du också och ta chansen att vinna en lyxig matkasse värd 1200 kr utvald
        av kocken Tommy Myllymäki.</p>
        <button>Tävla här</button>
    </section>

    <section>
        <div class="section-header">
            <h3>Vecka 45</h3>
        </div>
        <div class="clearfix"></div>

        <div class="section-grid">
            <?php $photos =  getInstagramPhotosByTag('pony', '9cd60ab846f743fcbc7a95d4c058dcc4', 4); ?>
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
                            <a href="vote.php?contribution_id=<?php echo $photo->user->id;?>" class="uppercase tiny vote-button">Rösta</a>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>

        <div class="clearfix"></div>
    </section>

    <section>
        <div class="section-header">
            <h3>Vecka 45</h3>
        </div>
        <div class="clearfix"></div>

        <div class="section-grid">
            <?php $photos =  getInstagramPhotosByTag('pony', '9cd60ab846f743fcbc7a95d4c058dcc4', 4); ?>
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
                            <a href="vote.php?contribution_id=<?php echo $photo->user->id;?>" class="uppercase tiny vote-button">Rösta</a>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>

        <div class="clearfix"></div>
    </section>

</div>

<div class="page" id="section-rules">
    <div class="background-image"></div>

    <section>
        <h2>Regler &amp; priser</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget
        porttitor elit. In hac habitasse platea dictumst. Pellentesque id metus
        eu leo eleifend posuere at porttitor magna. Curabitur vulputate, justo
        nec imperdiet bibendum, massa erat lacinia dolor, id imperdiet lorem nunc
        sed nibh. Donec viverra aliquet quam in tincidunt. Fusce sed commodo urna,
        sodales aliquam lacus. Mauris egestas dignissim mi et ullamcorper. Aenean
        facilisis ac erat ac vehicula. Maecenas quis nisl sed tellus congue
        scelerisque. Nulla dictum risus a iaculis tincidunt. Nullam condimentum
        sem ante, adipiscing luctus dui lobortis eget. Nam pharetra est ut laoreet
        facilisis. Curabitur dignissim metus mollis arcu venenatis, ut venenatis
        sem euismod. Fusce porta velit arcu, a pulvinar elit viverra quis.
        Vivamus varius, elit vitae fermentum tempor, nisi risus dictum arcu,
        ac malesuada leo nibh id quam.</p>
        <p>Sed sit amet eleifend sapien. Class aptent taciti sociosqu ad litora
        torquent per conubia nostra, per inceptos himenaeos. Sed tellus erat,
        varius vitae hendrerit id, tristique id erat. Aliquam vestibulum tellus
        justo, vitae faucibus elit rhoncus ornare. Nam orci urna, vehicula sed
        lectus vitae, elementum gravida nisl. Nunc faucibus dapibus cursus.
        Nunc porttitor at justo vitae commodo. Sed et tellus sed libero euismod
        varius id in nisi. Nulla vehicula enim eget diam interdum sollicitudin.
        Nullam lorem massa, commodo vitae tempor id, ultricies nec risus.</p>
    </section>

</div>

<?php
include ("footer.php");
?>
