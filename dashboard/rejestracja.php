<?php
session_start();

if (!isset($_SESSION['captcha_question'])) {
    header("Location: captcha.php");
    exit();
}

$captchaQuestion = $_SESSION['captcha_question'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <h2>Rejestracja</h2>

    <form action="register.php" method="POST">
        Login: <input type="text" name="username" required><br><br>
        Hasło: <input type="password" name="password" required><br><br>

        <div class="row" style="margin-top:.5rem;">
            <div>
                <label>CAPTCHA</label>
                <div><strong>Ile to: <?= htmlspecialchars($captchaQuestion, ENT_QUOTES, 'UTF-8') ?> ?</strong></div>
                <small class="muted">Przepisz wynik działania</small>
            </div>
            <div>
                <label for="captcha">Odpowiedź:</label>
                <input id="captcha" name="captcha" inputmode="numeric" pattern="[0-9\-]+" required>
            </div>
        </div>
        <br>
        <button type="submit">Zarejestruj</button>
    </form>

    <br>
    <a href="index.php">Powrót do logowania</a>
</body>
</html>

