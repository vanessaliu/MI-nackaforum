<?php
include ("templates/header.php");
include ("functions.php");


if(isset($_GET['contribution_id'])) {
  $fbUserId = 1;// ska hämtar facebook user's uniqe id
  $contributionId = $_GET["contribution_id"];
  $vote = 1;

  echo "Vi har en contribution_id: " . $contributionId;
  echo "<br />";


///////////////////////////////////////////////////////////////
// ADD ONE VOTE TO A CONTRIBUTION =============================
  // Works because instagram_id is a unique value in the database
  $updateContributiosSQL = "UPDATE contributions
                            SET votes = votes +1 
                            WHERE instagram_id = ?";
  // looks for the right row! 
  if($stmt = $mysqli->prepare($updateContributiosSQL)) {
    $stmt->bind_param("i", $contributionId); // TEST
    $stmt->execute();
  }


/////////////////////////////////////////////////////////////////////////
// ADD THE CONTRIBUTION AS A NEW ROW ==================================== 
  $addContributionSql = "INSERT INTO contributions (instagram_id, votes)
                         VALUES (?, ?)";

  if($stmt->prepare($addContributionSql)) {
    // echo "Denna fanns INTE i databasen, men har lagts till nu. <br />";
    $stmt->bind_param("ii", $contributionId, $vote);
    $stmt->execute();
  }


// Look for duplicates in votes table:
  $checkForDuplicatesSQL = "SELECT user, contribution_id 
                            FROM votes 
                            WHERE user = ? AND contribution_id = ?";
  $addVoteSQL = "INSERT INTO votes (user, contribution_id) 
                  VALUES (?,?)";
  if( $stmt = $mysqli->prepare($checkForDuplicatesSQL)) {
    $user_id = 1;
    $stmt->bind_param("ii", $fbUserId, $contributionId);
    $stmt->execute();
    $stmt->bind_result($fbUserId, $contributionId);
    $stmt->store_result();
    $stmt->fetch();
    // echo "Funkar if-satsen?"; // Yup, funkar!

    if($stmt->num_rows > 0) {
      echo "You already voted for this! <br />";
      // $stmt->close();
    } else if($stmt->prepare($addVoteSQL)){
      // $stmt = $mysqli->stmt_init();
      $stmt->bind_param("ii", $fbUserId, $contributionId);
      $stmt->execute();        
      // $stmt->close();
      echo "Inlagt i votes";
    }
  }
} else {
  // This happens if someone enters the page without clicking vote:
  echo "Det finns inget att se här, gå din väg! <br />";
}



  

?>

<?php
include ("templates/footer.php");
?>