<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {  //Check if Request method is POST or GET
    
    $mysqli = require __DIR__ . "/database.php";  //Connecting to db
    
    $sql = sprintf("SELECT * FROM game_project
                    WHERE email = '%s'",
                    $mysqli->real_escape_string($_POST["email"])); //To escape SQL injection attack
        
    $result = $mysqli->query($sql);
        
    $user = $result->fetch_assoc();
        
    if ($user) {
            
        if (password_verify($_POST["password"], $user["password_hash"])) { // True if hashed password is equal to  password_hash 
                
            // die("Login Successful");

            session_start();
                
            session_regenerate_id();
                
            $_SESSION["user_id"] = $user["id"]; // Passing id of user to session
            $_SESSION["high_score"] = $user["high_score"];
            
            header("Location: UserIndex.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <div>
        <h1>Login</h1>
        
        <form method="post">
            <div>
                <input type="email" name="email" id="email" placeholder="Email"
                    value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">  <!-- Retain Email entered after Invalid Credentials  -->
            </div>
            <div>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <?php if ($is_invalid): ?>
                <em>Invalid Credentials</em>
                <br>
                <br>
            <?php endif; ?>
            <button>Log in</button>
            <br>
            <br>
            <br/>
            <span>Don't have an account? </span>
            <br>
            <br/><a href="/signup.html"> Sign-up </a> 
        </form>
    </div>

</body>
</html>
