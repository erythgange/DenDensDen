

<?php
session_start();
//session_destroy(); //use session destroy if you run out of funds, but only use it if it is not connected to wallet.php. if it isn't uncomment out the codes I've commented


//if (!isset($_SESSION['balance'])) {
//    $_SESSION['balance'] = 100;
//}

$pibbletype = ["washington", "pibble", "geeble", "gmail", "pbcup", "leggy", "denden",];
$results = ["", "", ""];
$message = "";
$bet = isset($_POST['bet']) ? (int)$_POST['bet'] : 0;
$win = "0";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($bet <= 0) {
        $message = "Please enter a valid bet.";
    } elseif ($bet > $_SESSION['balance']) {
        $message = "Insufficient balance.";
    } else {
        // change to the one being used in wallet.php

        $results[0] = $pibbletype[array_rand($pibbletype)];
        $results[1] = $pibbletype[array_rand($pibbletype)];
        $results[2] = $pibbletype[array_rand($pibbletype)];


        $_SESSION['balance'] -= $bet; // change to the one being used in wallet.php
        $winMultiplier = 0;

        if ($results[0] === $results[1]&& $results[1] === $results[2]) {
            if ($results[0] === "denden") {
                $winMultiplier = 20;
                $win = "20";
            } else {
                $winMultiplier = 5;
                $win = "5";
            }
        } elseif ($results[0] === $results[1] || $results[1] === $results[2] || $results[0] === $results[2]) {
            $winMultiplier = 2;
            $win = "2";
        }

        if ($winMultiplier > 0) {
            $winAmount = $bet * $winMultiplier;
            $_SESSION['balance'] += $winAmount;
            // change this to the one being used in wallet.php
            $message = "Wow! You won $winAmount$! with a x$win multiplier!";
            
        } else {
            $message = "LLLL! You lost $bet dollars!";
        }
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denden's Slot Machine</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/bg1.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            font-family: sans-serif;
            text-align: center;
            background: #f0f0f0;
        }
        body {
            background-image: url('images/bg1.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
        }
        h1 {
            color: aliceblue;
        }
        p {
            color: aliceblue;
        }
        .navbar {
            background: #109f3a !important;
            padding: 2px;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }
        .logo {
            height:100px;
            width: 100px;
            object-fit: contain !important;
            transition 200ms ease
        }
        
        .slot {
            font-size: 2rem;
            margin: 20px;
        }
        .message {
            margin: 20px;
            font-weight: bold;
        }
        input[type=number] {
            padding: 8px;
            width: 80px;
        }
        button {
            padding: 8px 15px;
            font-size: 16px;
        }
        .balance {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand mx-auto" href="homepage.php"> <img src="images/denden's-den.png" href="homepage.php" alt="Denden's Den Logo" class="logo">
            <strong>Denden's Den Casino</strong>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="wallet.php"><strong>Wallet</strong></a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php"><strong>Logout</strong></a></li>
            </ul>
        </div>
    </nav>
</header>

<h1>Denden's Slot Machine</h1>
<h3>Hit Consecutive Pibbles to win Prizes!</h3>
<p>Hit x2 Same Pibble = x2!, Hit x2 Same Pibble = x5!, Hit Triple Denden = x10!</p>

<form method="post">
    <label for="bet">Bet Amount: </label>
    <input type="number" name="bet" id="bet" min="1" value="<?= htmlspecialchars($bet) ?>" required>
    <button type="submit">Spin</button>
</form>

<div class="slot">
    <?= htmlspecialchars($results[0]) ?> | <?= htmlspecialchars($results[1]) ?> | <?= htmlspecialchars($results[2]) ?>
</div>

<div class="message"><?= htmlspecialchars($message) ?></div>
<div class="balance"> Wallet: <?= $_SESSION['balance'] ?>$</div>

<!-- change the balance to the on used in wallet.php--> 

</body>
</html>