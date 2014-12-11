
<div class="page" id="section-winners">

    <div class="background-image"></div>

    <section>
        <h2>Vinnare</h2>
        <p>Här presenteras alla vinnare i tävlingen. Varje vecka utser en jury,
        som består av bland annat Tommy Myllymäki, 4 vinnare. Var med och tävla
        du också och ta chansen att vinna en lyxig matkasse värd 1200 kr utvald
        av kocken Tommy Myllymäki.</p>
        <button data-target="tavla" class="pagelink">Tävla här</button>
    </section>

    <section>
        <div class="section-header">

        <?php
            $ddate = date('Y-m-d');
            // echo $ddate;
            $date = new DateTime($ddate);
            $week = $date->format("W");
            $nextweek = $week+1;   
        ?>
            <h3>Vecka <?php echo $week;?></h3>
        </div>
        <div class="clearfix"></div>

        <div class="section-grid">
             <?php
                $tasks_sql = "SELECT instagram_id FROM contributions ORDER BY votes DESC LIMIT 4";

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

    <section>
        <div class="section-header">
            <h3>Vecka <?php echo $nextweek;?></h3>
        </div>
        <div class="clearfix"></div>

        <div class="section-grid">
         <?php
                $tasks_sql = "SELECT instagram_id FROM contributions ORDER BY votes DESC LIMIT 4";

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
