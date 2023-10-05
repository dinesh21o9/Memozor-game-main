<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM game_project
            WHERE id = {$_SESSION["user_id"]}"; // Get a row of id == user logged-in ID
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc(); // Array of details of user with user_id == logged-in user ID
    $high_score = $user["high_score"];
} // Getting name of user and display in Home page
else{
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Simon</title>
  <link rel="stylesheet" href="game.css">
  <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
</head>

<body>
   <div>
        <?php if (isset($user)): ?>
            <div class="user-info">
                <p>Welcome <?= htmlspecialchars($user["name"]) ?>!</p>
                <p><a href="logout.php">Log out</a></p>
            </div>
            
            <h3 id="high-score" >High Score: <?php echo $user["high_score"]; ?></h3>
            <h1 id="level-title">Press Enter To Start!!!</h1>
            <div class="container">
                <div lass="row">
                    <div type="button" id="green" class="btn green">
                    </div>
                    <div type="button" id="red" class="btn red">
                    </div>
                </div>
                <div class="row">
                    <div type="button" id="yellow" class="btn yellow">
                    </div>
                    <div type="button" id="blue" class="btn blue">
                    </div>
                </div>
            </div>
            
        <?php else: ?>
            
            <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
            
        <?php endif; ?>

        
    </div>
  <script>
      var high_score = <?php echo isset($_SESSION["high_score"]) ? $_SESSION["high_score"] : 0; ?>;
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="game.js" charset="utf-8"></script>
</body>

</html>