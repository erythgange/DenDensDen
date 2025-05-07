<?php
session_start();

$usersFile = 'users.json';

if (!file_exists($usersFile)) {
    file_put_contents($usersFile, json_encode([]));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirm = trim($_POST['confirm_password'] ?? '');

    $users = json_decode(file_get_contents($usersFile), true);

    if (isset($users[$username])) {
        $error = "Username already exists.";
    } elseif ($password !== $confirm) {
        $error = "Passwords do not match.";
    } else {
        $users[$username] = password_hash($password, PASSWORD_DEFAULT);
        file_put_contents($usersFile, json_encode($users));

        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: homepage.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register - Denden's Den Casino</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/bg1.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="card p-4 shadow" style="min-width: 300px;">
        <h3 class="text-center mb-4">Register</h3>
        <?php if (!empty($error))
            echo "<div class='alert alert-danger'>$error</div>"; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100 mt-4">Register</button>
            <p class="mt-3 text-center">Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>
</body>

</html>