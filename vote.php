<?php
include ("templates/header.php");//inkluderar filen header.php
include ("functions.php");

$stmt = $mysqli->stmt_init(); 
if(isset($_GET['contribution_id'])) {
  $fbUserId = 1;// ska hämtar facebook user's uniqe id
  $contributionId = $_GET["contribution_id"];
  $vote = 1;

  echo "Vi har en contribution_id:" . $contributionId;
  echo "<br />";
  echo "<h2>Tack för din röst!<h2> <br> <h2>Vänta 3 sekonder att automatisk komma tillbaka.<h2>";
  // echo "<script>setTimeout(function(){window.location='index.php'},3000)</script>";
  header("Refresh: 3; url=index.php");


    $tasks_sql = "SELECT instagram_id FROM contributions WHERE instagram_id=?";
    $stmt=$mysqli->stmt_init();

    if($stmt -> prepare($tasks_sql)){
      $stmt->bind_param('i', $_GET["contribution_id"]);
      $stmt->bind_result($instagram_id);// binda ihop result
      $stmt->execute();//genomför statement

      $stmt->store_result();//lagrar resultatet
      $rows1 = $stmt->num_rows;//Antal rader lagrade i variabel

      echo "rader".$rows1;
      if ($rows1 !=0) {
        ///////////////////////////////////////////////////////////////
        // ADD ONE VOTE TO A CONTRIBUTION =============================
          // This works because instagram_id is a unique value in the database
          $updateContributiosSQL = "UPDATE contributions
                                    SET votes = votes +1 
                                    WHERE instagram_id = ?";
          // This looks for the right row! 
          if($stmt->prepare($updateContributiosSQL)) {
            $stmt->bind_param("s", $contributionId);
            $stmt->execute();
          }
      }
      else{
        /////////////////////////////////////////////////////////////////////////
        // ADD THE CONTRIBUTION AS A NEW ROW ==================================== 
          $addContributionSql = "INSERT INTO contributions (instagram_id, votes)
                                 VALUES (?, ?)";

          if($stmt->prepare($addContributionSql)) {
            // echo "Denna fanns INTE i databasen, men har lagts till nu. <br />";
            $stmt->bind_param("si", $contributionId, $vote);
            $stmt->execute();
          }

          $stmt->close();
      }


      // $stmt->close();// stänger stmt
    }else{
      echo $stmt->error;// felmeddelande om kopplingen till databasen inte fungerar
    }


} else {
  // This happens if someone enters the page without clicking vote:
  echo "Det finns inget att se här, gå din väg! <br />";
}


$mysqli->close();


?>

<?php
include ("templates/footer.php");
?>