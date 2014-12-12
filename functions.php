<?php

function getUserId($instagram_username, $client_id) {
  $url = 'https://api.instagram.com/v1/users/search?q=' . strtolower($instagram_username) . '&client_id=' . $client_id;
  $ret = json_decode(file_get_contents($url));
  return $ret->data[0]->id;
}

function getInstagramPhotosFromUser($instagram_username, $client_id, $limit) {
  $user_id = getUserId($instagram_username,$client_id);
  $url = 'https://api.instagram.com/v1/users/' . $user_id . '/media/recent?count=' . $limit . '&client_id=' . $client_id;
  $photos = json_decode(file_get_contents($url));
  return $photos;
 }

function getInstagramPhotosByTag($tag, $client_id, $limit, $max_tag_id = null) {
  $url = 'https://api.instagram.com/v1/tags/' . $tag . '/media/recent?count=' . $limit . '&client_id=' . $client_id;
  if ($max_tag_id != null) {
    $url .= '&max_tag_id=' . $max_tag_id;
  }
  // echo $url;
  $photos = json_decode(file_get_contents($url));
  return $photos;
}

function getInstagramPhotoById($media_id, $client_id) {
    $url = 'https://api.instagram.com/v1/media/' . $media_id . '?client_id=' . $client_id;
    $photo = json_decode(file_get_contents($url));
    return $photo;
}

?>
