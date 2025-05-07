<?php
session_start();

$usersFile = 'users.json';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    // admin = false

    $users = json_decode(file_get_contents($usersFile), true);
    
    
    // if username password in admin = []
    
    
    if (isset($users[$username]) && password_verify($password, $users[$username])) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: homepage.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Denden's Den Casino</title>
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
        <h3 class="text-center mb-4">Login</h3>
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
            <button type="submit" class="btn btn-primary w-100 mt-4">Login</button>
            <p class="mt-3 text-center">Don't have an account? <a href="register.php">Register here</a></p>
        </form>
    </div>
</body>

</html>