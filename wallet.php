<?php
session_start();
if (!isset($_SESSION['balance'])) { //starting balance sang user 
    $_SESSION['balance'] = 1000;
}

if (isset($_POST['deposit'])) { //deposit fumc
    $amount = floatval($_POST['amount']);
    if ($amount > 0) {
        $_SESSION['balance'] += $amount;
    }
}

if (isset($_POST['withdraw'])) { // withdraw func
    $amount = floatval($_POST['amount']);
    if ($amount > 0 && $amount <= $_SESSION['balance']) {
        $_SESSION['balance'] -= $amount;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style> 
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        input[type="number"] {
            padding: 8px;
            width: 150px;
            margin: 5px 0;
        }
        button {
            padding: 8px 16px;
            margin: 5px;
            cursor: pointer;
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
    <div class="container">
        <h1>Casino Savings</h1>
        <p><strong>Current Balance:</strong> $<?php echo number_format($_SESSION['balance'], 2); ?></p>

        <form method="post">
            <h3>Deposit</h3>
            <input type="number" name="amount" step="0.01" placeholder="Amount" required> <!--ang step 0.01 para di mag lapaw ang decimal sign sa 2 digits -->
            <br>
            <button type="submit" name="deposit">Deposit</button>
        </form>

        <form method="post">
            <h3>Withdraw</h3>
            <input type="number" name="amount" step="0.01" placeholder="Amount" required>
            <br>
            <button type="submit" name="withdraw">Withdraw</button>
        </form>
    </div>
</body>
</html>

