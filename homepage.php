<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denden's Den Casino</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
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

    <main>
        <section class="hero text-center mt-5">
            <h1>Welcome to the Amazing Denden's Den Casino</h1>
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-4">
                            <img src="images/comingsoon.png" alt="Coming Soon" class="img-fluid rounded shadow"
                                style="opacity: 0.6; cursor: not-allowed; width: 100%; height: 250px; object-fit: cover;">
                            <p class="mt-2 text-muted" style="color: aliceblue"><strong>Coming Soon</strong></p>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="slots.php">
                            <img src="images/slot.png" alt="Play Slots" class="img-fluid rounded shadow"
                                style="width: 100%; height: 250px; object-fit: cover;">
                            <p class="mt-2">Denden Slots</p>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <img src="images/comingsoon.png" alt="Coming Soon" class="img-fluid rounded shadow"
                            style="opacity: 0.6; cursor: not-allowed; width: 100%; height: 250px; object-fit: cover;">
                        <p class="mt-2 text-muted" style="color: aliceblue"><strong>Coming Soon</strong></p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>