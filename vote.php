<?php
include ("header.php");//inkluderar filen header.php
include ("functions.php");

    // TODO: Hindra att användare kan rösta flera ggr på samma bidrag
    // TODO: +1 i votes.

    $fbUserId = 1;// ska hämtar facebook user's uniqe id
    $contributionId = $_GET["contribution_id"]; 
    $votes = getAndAddVote($contributionId);

        // TODO:
    // Lagra ett bidrag i databasen, när någon klickar på rösta-knappen
    // Plussa på med 1 för varje knapptryckning OM användaren inte hindras från att rösta





    
    
    $checkExistingContribution = "SELECT instagram_id FROM contributions WHERE instagram_id = ?";
    $addContributionSql = "INSERT INTO contributions (instagram_id, votes) VALUES (?, ?)";
    
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

        // "UPDATE contributions SET votes = votes +1"

      } else  {
        // Spara i databasen:
        // TODO JUST NU SPARAS INGET I contributions       
      
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
        $stmt->close();

        echo "Inlagt i votes";
      }

?>

<?php
include ("footer.php");
?>