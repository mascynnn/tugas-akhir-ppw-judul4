<?php
session_start();

$valid_user = "admin";
$valid_pass = "123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $_POST["username"];
    $pass = $_POST["password"];

    if ($user === $valid_user && $pass === $valid_pass) {
        $_SESSION["is_login"] = true;
        $_SESSION["username"] = $user;

        header("Location: index.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Login</h2>
    
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST">
        <label>Username</label>
        <input type="text" name="username">

        <label>Password</label>
        <input type="password" name="password">

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>