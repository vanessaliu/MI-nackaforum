<?php
include ("templates/header.php");//inkluderar filen header.php
include ("functions.php");

    // TODO: Hindra att användare kan rösta flera ggr på samma bidrag
    // TODO: +1 i votes.


        // TODO:
    // Lagra ett bidrag i databasen, när någon klickar på rösta-knappen
    // Plussa på med 1 för varje knapptryckning OM användaren inte hindras från att rösta


// TEST NEDAN:
if(isset($_GET['contribution_id'])) {
  $fbUserId = 1;// ska hämtar facebook user's uniqe id
  $contributionId = $_GET["contribution_id"];
  // $votes = getAndAddVote($contributionId);
  $vote = 1;
  // $updateVote = $vote++; // TEST

  echo "Vi har en contribution_id: " . $contributionId;
  echo "<br />";


  // $checkExistingContributionSQL = "SELECT instagram_id FROM contributions WHERE instagram_id = ?";

  // if($stmt = $mysqli->prepare($checkExistingContributionSQL)) {
  //   // $user_id = 1;
  //   $stmt->bind_param("i", $contributionId);
  //   $stmt->execute();
  //   $stmt->bind_result($instagramId);
  //   $stmt->store_result();
  //   $stmt->fetch();

  //   echo $instagramId;

    // if($stmt->num_rows > 0) { // FUNKAR EJ!! TODO
      // update +1  

    // TODO Funkar, men gör precis allt i contributions. Behöver hindra den från att skapa ny row om already existing


    // if()
      // echo "Denna finns i databasen! <br />";
      // Works because instagram_id is a unique value in the database
      $updateContributiosSQL = "UPDATE contributions SET votes = votes +1 WHERE instagram_id = ?";
      // prepared statement here, to look for the right row! 
      if($stmt = $mysqli->prepare($updateContributiosSQL)) {
        $stmt->bind_param("i", $contributionId); // TEST
        $stmt->execute();
      }

      // return $updateContributiosSQL;
    // } else {
      // insert into FUNKAR!!
      // echo "Denna fanns INTE i databasen, men har lagts till nu. <br />";
      $addContributionSql = "INSERT INTO contributions (instagram_id, votes)
                             VALUES (?, ?)";

      if($stmt->prepare($addContributionSql)) {
        $stmt->bind_param("ii", $contributionId, $vote);
        $stmt->execute();
      }
    // }
  // }
} else {
  // This happens if someone enters the page without clicking vote:
  echo "Det finns inget att se här, gå din väg! <br />";
}
/*
    
    $checkExistingContribution = "SELECT instagram_id FROM contributions WHERE instagram_id = ?";
    
    
    $stmt = $mysqli->stmt_init();
    // Kolla att bidraget inte redan finns i databasen
    if($stmt = $mysqli->prepare($checkExistingContribution)) {
      // $user_id = 1; // ???
      $stmt->bind_param("i", $instagramId);
      $stmt->execute();
      $stmt->bind_result($instagramId);
      $stmt->store_result();
      $stmt->fetch();

      if($stmt->num_rows == 1) { // EVENTUELLT ÄNDRA HÄR
        echo "Bidraget finns redan!"; // TODO FUNKAR INTE

        $updateContributiosSQL = "UPDATE contributions SET votes = votes +1";
        return $updateContributiosSQL;
        // if($stmt->prepare($updateContributiosSQL)) {

        // }

      } else  {
        // Spara i databasen:      
        $addContributionSql = "INSERT INTO contributions (instagram_id, votes) VALUES (?, ?)";
        if($stmt->prepare($addContributionSql)) {
          $stmt->bind_param("ii", $contributionId, $votes);
          $stmt->execute();
            // Nedan triggas, men inget sparas
          echo "Sparades i contributions "; //echo $vote;
        }
      }$stmt->close();

    }

    $addVoteSql = "INSERT INTO votes (user, contribution_id) VALUES (?,?)";
    $stmt = $mysqli->stmt_init();

      if($stmt->prepare($addVoteSql)){

        $stmt->bind_param("ii", $fbUserId, $contributionId);
        $stmt->execute();
        

        echo "Inlagt i votes";
      }
      $stmt->close();

      */

?>

<?php
include ("templates/footer.php");
?>