
<?php
session_start();

// Generate a random number if it doesn't exist in the session
if (!isset($_SESSION['randomNumber'])) {
    $_SESSION['randomNumber'] = rand(0, 100);
}

// Check if the user has submitted a guess
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['guess']) || !is_numeric($_POST['guess'])) {
        $message = 'Please enter a valid number.';
    } else {
        $guess = intval($_POST['guess']);
        if ($guess < 0 || $guess > 100) {
            $message = 'Please enter a number between 0 and 100.';
        } else {
            $randomNumber = $_SESSION['randomNumber'];
            if ($guess < $randomNumber) {
                $message = 'Your guess is too low.';
            } elseif ($guess > $randomNumber) {
                $message = 'Your guess is too high.';
            } else {
                $message = 'Congratulations! You guessed the number.';
                // Reset the random number for the next game
                unset($_SESSION['randomNumber']);
            }
        }
    }
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guessing Game</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        p {
            text-align: center;
            color: #666;
        }
        form {
            text-align: center;
        }
        input[type="number"] {
            width: 80px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }
        button[type="submit"] {
            padding: 8px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Guessing Game</h1>
        <?php if (!empty($message)) : ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="post" action="guessinggame.php">
            <label for="guess">Enter your guess (between 0 and 100):</label>
            <input type="number" id="guess" name="guess" min="0" max="100" required>
            <button type="submit">Submit Guess</button>
        </form>
        <p><a href="giveup.php">Give Up</a> | <a href="startover.php">Start Over</a></p>
    </div>
</body>
</html>
