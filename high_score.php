<?php
session_start();

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    
    // Getting the high score data from the POST request
    $high_score = $_POST["high_score"];
    
    include_once "database.php";

    // Updating the user's high score in the database
    $sql = "UPDATE game_project SET high_score = ? WHERE id = ?";
    
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        die("Error preparing statement: " . $mysqli->error);
    }
    
    $stmt->bind_param("ii", $high_score, $user_id);
    if (!$stmt->execute()) {
        die("Error updating high score: " . $stmt->error);
    }
    
    $stmt->close();
}
?>
