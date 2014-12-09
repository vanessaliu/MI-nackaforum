<?php

function getUserId($instagram_username, $client_id){
  $url='https://api.instagram.com/v1/users/search?q='.strtolower($instagram_username).'&client_id='.$client_id;

  $ret = json_decode(file_get_contents($url));
  
  return $ret->data[0]->id;
}


function getInstagramPhotosFromUser($instagram_username, $client_id, $limit){
  $user_id= getUserId($instagram_username,$client_id);
  
  $url = 'https://api.instagram.com/v1/users/' . $user_id . '/media/recent?count=' . $limit . '&client_id=' . $client_id;
  
  $photos=json_decode(file_get_contents($url));

  return $photos;
 }
  

function getInstagramPhotosByTag($tag, $client_id, $limit){
  $url = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?count=' . $limit . '&client_id='.$client_id;
  
  $photos=json_decode(file_get_contents($url));
  
  return $photos;
  //echo $photos;
}

function getAndAddVote($contributionId){
  include ("connection_db.php");//inkluderar koppling till databasen

  $tasks_sql = "SELECT votes FROM contributions WHERE id=$contributionId";

  $stmt=$mysqli->stmt_init();

  if($stmt -> prepare($tasks_sql)){
    $stmt->bind_result($vote);
    $stmt->execute();

    // $stmt->store_result();
    // $rows = $stmt->num_rows;
    $stmt->close();
    $mysqli->close();

    $vote = $vote + 1;
    return $vote;
    
  }else{
    $mysqli->close();//stänger mysqli
    return 0;//returnerar 0
  }
}

?>