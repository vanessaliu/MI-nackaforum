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
           
            
            <?php
                $tasks_sql = "SELECT instagram_id FROM contributions ORDER BY votes DESC";

                $stmt=$mysqli->stmt_init();//"myqsli statement" initierar; 

                if($stmt -> prepare($tasks_sql)){//kolla "myqsli prepare statement" är förberedd; s
                    
                    $stmt->bind_result($instagram_id);// binda ihop result
                    $stmt->execute();//genomför statement

                    while (mysqli_stmt_fetch($stmt)){//hämta information från varje rad
                    
                    // echo $instagram_id;
                    $photo=getInstagramPhotoById($instagram_id, '9cd60ab846f743fcbc7a95d4c058dcc4');
                    ?>
                    
                    <div class="small-4 columns contribution">
                        <div class="contribution-inner">

                            <h5><?php echo $photo->data->user->full_name; ?></h5>
                            <div class="contribution-image">
                                <a href="<?php echo $photo->data->link; ?>" target="_blank">
                                    <img src="<?php echo $photo->data->images->low_resolution->url; ?>" alt="">
                                </a>
                            </div>

                            <div class="contribution-actions">
                                <!-- if likes->count = 0, addclass inactive to i -->
                                <div><i class="fi-heart <?php if($photo->data->likes->count == 0){echo 'inactive';} ?>"><span><?php echo $photo->data->likes->count;?></span></i></div>
                                <div><i class="fi-share"></i></div>
                                <!-- <button class="uppercase tiny vote-button">Rösta</button> -->
                                <a href="vote.php?contribution_id=<?php echo $photo->data->id;?>" class="uppercase tiny vote-button">Rösta</a>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    }
                    $stmt->close();// stänger stmt
                }else{
                    echo $stmt->error;
                }
            ?>

        </div>

        <div class="clearfix"></div>
    </section>

</div>
