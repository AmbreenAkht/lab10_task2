<?php
session_start();
$randomNumber = isset($_SESSION['randomNumber']) ? $_SESSION['randomNumber'] : 'Unknown';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guessing Game - Give Up</title>
    <style>
        body {
            text-align: center; /* To center align text */
        }
        .container {
            margin-top: 100px; /* Adjust as needed to move text down */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Guessing Game - Give Up</h1>
        <p>The correct number was: <?php echo $randomNumber; ?></p>
        <p><a href="guessinggame.php">Try Again</a></p>
    </div>
</body>
</html>
