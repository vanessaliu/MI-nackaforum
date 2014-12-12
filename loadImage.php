<?php
$media_id = $_GET['imageId'];
$photo =  getInstagramPhotoById($media_id, '9cd60ab846f743fcbc7a95d4c058dcc4');

function getInstagramPhotoById($media_id, $client_id) {
    $url = 'https://api.instagram.com/v1/media/' . $media_id . '?client_id=' . $client_id;
    $photo = json_decode(file_get_contents($url));
    return $photo;
}

?>

<div class="modal-overlay"></div>

<div class="modal">

    <div class="modal-inner">

        <h5><?php echo $photo->data->user->full_name; ?></h5>
        <a class="close-modal">Stäng</a>

        <div class="contribution-image">
            <a href="<?php echo $photo->data->link; ?>" target="_blank">
                <img src="<?php echo $photo->data->images->standard_resolution->url; ?>" alt="">
            </a>
        </div>

        <div class="contribution-actions">
            <div><i class="fi-heart <?php if($photo->data->likes->count == 0){echo 'inactive';} ?>"><span><?php echo $photo->data->likes->count;?></span></i></div>
            <div><i class="fi-share"></i></div>
            <a href="vote.php?contribution_id=<?php echo $photo->data->user->id;?>" class="uppercase tiny vote-button">Rösta</a>
        </div>

    </div>

</div>
