<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Logowanie</h2>
    <form action="login.php" method="POST">
        Login: <input type="text" name="username" required><br><br>
        Hasło: <input type="password" name="password" required><br><br>
        <button type="submit">Zaloguj</button>
    </form>
    <br>
    <a href="rejestracja.php">Rejestracja</a>
</body>
</html>
