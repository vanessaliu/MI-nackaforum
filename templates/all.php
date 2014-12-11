<?php
    $picPerPage=9;
    $photoAll = getInstagramPhotosByTag('birditup2014', '9cd60ab846f743fcbc7a95d4c058dcc4', 0);
    $totalcontributions=count($photoAll->data);

    if ($totalcontributions%$picPerPage==0) {
        $totalPages= $totalcontributions/$picPerPage;
    }else{
        $totalPages= floor($totalcontributions/$picPerPage)+1;
    }

    $photos1 =  getInstagramPhotosByTag('birditup2014', '9cd60ab846f743fcbc7a95d4c058dcc4', $picPerPage);
    $photos2=json_decode(file_get_contents($photos1->pagination->next_url));
    // $photos3=json_decode(file_get_contents($photos2->pagination->next_url));
    // $photos4=json_decode(file_get_contents($photos3->pagination->next_url));

    for ($i=1; $i <= $totalPages; $i++) {
      // echo $i;
      // echo "<br>";
      // echo (string)$i;// echo "<br>";
    }
    // echo "totalcontributions".$totalcontributions."<br>";
    // echo "picPerPage".$picPerPage."<br>";
    // echo "totalPages".$totalPages."<br>";

?>



<div class="page" id="section-all">
    <div class="background-image"></div>

    <section>
        <h2>Alla bidrag</h2>
        <p>Här ser du alla bidrag i tävlingen. Var med och tävla du också och ta
        chansen att vinna en lyxig matkasse värd 1200 kr utvald av kocken Tommy Myllymäki.</p>
        <button data-target="tavla" class="pagelink">Tävla här</button>
    </section>

    <section>
        <div class="section-pagination">
            <p> Totalsidor: <?php echo $totalPages?></p>
            <a href="" id="prev">Föregående</a>
            <a href="" id="next">Nästa</a>


        </div>

        <div class="section-grid">

            <?php foreach ($photos1->data as $photo) { ?>
                <div class="small-4 columns contribution page1">
                    <div data-id="<?php echo $photo->id;?>" class="contribution-inner open-modal">

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

            <?php foreach ($photos2->data as $photo) { ?>
                <div class="small-4 columns contribution page2">
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
