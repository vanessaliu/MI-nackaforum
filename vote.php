<?php
include ("header.php");//inkluderar filen header.php
include ("functions.php");
?>
<?php

    $fbUserId=1;// ska hämtar facebook user's uniqe id
    $contributionId = $_GET["contribution_id"]; 
    $vote = getAndAddVote($contributionId);


    $add_task_sql = "INSERT INTO votes (user, contribution_id) VALUES (?,?)";
    $stmt = $mysqli->stmt_init();

      if($stmt->prepare($add_task_sql)){

        $stmt->bind_param("ii", $fbUserId, $contributionId);
        $stmt->execute();
        $stmt->close();

        echo "Inlagt i databas";
      }


    $add_task_sql = "INSERT INTO contributions (id,votes) VALUES (?,?)";
    $stmt = $mysqli->stmt_init();

      if($stmt->prepare($add_task_sql)){

        $stmt->bind_param("ii", $contributionId,$vote);
        $stmt->execute();
        $stmt->close();

        echo "Sparades i databas";echo $vote;
      }


?>

<?php
include ("footer.php");
?>