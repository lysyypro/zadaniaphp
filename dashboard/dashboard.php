<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Witaj w panelu, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <a href="logout.php">Wyloguj</a>

        <br><br>
        <img src="pibble.jpg" alt="pibble">
    </div>
</body>
</html>
