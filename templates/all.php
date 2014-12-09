<div class="page" id="section-all">
    <div class="background-image"></div>

    <section>
        <h2>Alla bidrag</h2>
        <p>Här ser du alla bidrag i tävlingen. Var med och tävla du också och ta
        chansen att vinna en lyxig matkasse värd 1200 kr utvald av kocken Tommy Myllymäki.</p>
        <button>Tävla här</button>
    </section>

    <section>
        <div class="section-pagination"></div>

        <div class="section-grid">
            <?php $photos =  getInstagramPhotosByTag('nackaforummatochvin', '9cd60ab846f743fcbc7a95d4c058dcc4', 9); ?>
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

        <div class="section-pagination"></div>

    </section>

</div>
