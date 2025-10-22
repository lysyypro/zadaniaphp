<?php
session_start();
$conn = new mysqli("localhost", "root", "", "User");

$username = $_POST['username'];
$password = $_POST['password'];

$result = $conn->query("SELECT * FROM users WHERE login='$username'");
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['passwd'])) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Błędne hasło. <a href='index.php'>Spróbuj ponownie</a>";
    }
} else {
    echo "Nie ma takiego użytkownika. <a href='index.php'>Spróbuj ponownie</a>";
}
?>
