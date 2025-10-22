<?php
session_start();
$conn = new mysqli("localhost", "root", "", "User");

$username = $_POST['username'];
$password = $_POST['password'];
$captcha = $_POST['captcha'];

if (!isset($_SESSION['captcha_answer']) || $captcha != $_SESSION['captcha_answer']) {
    echo "Zła odpowiedź na pytanie CAPTCHA.<br>";
    echo "<a href='rejestracja.php'>Spróbuj ponownie</a>";
    exit();
}

if (strlen($password) < 8 ||
    !preg_match('/[A-Z]/', $password) ||
    !preg_match('/[a-z]/', $password) ||
    !preg_match('/[0-9]/', $password) ||
    !preg_match('/[!@#$%^&*()]/', $password)) {
    
    echo "Hasło musi mieć co najmniej 8 znaków, zawierać dużą i małą literę, cyfrę oraz znak specjalny (!@#$%^&*()).<br>";
    echo "<a href='rejestracja.php'>Wróć do rejestracji</a>";
    exit();
}

$result = $conn->query("SELECT * FROM users WHERE login='$username'");
if ($result->num_rows > 0) {
    echo "Taki login już istnieje. <a href='rejestracja.php'>Spróbuj ponownie</a>";
    exit();
}

$hashed = password_hash($password, PASSWORD_DEFAULT);
$conn->query("INSERT INTO users (login, passwd) VALUES ('$username', '$hashed')");

unset($_SESSION['captcha_answer']);
unset($_SESSION['captcha_question']);

$_SESSION['username'] = $username;
header("Location: dashboard.php");
exit();
?>
