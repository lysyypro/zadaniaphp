<?php
session_start();

if (!isset($_SESSION['captcha_num1']) || !isset($_SESSION['captcha_num2'])) {
    $_SESSION['captcha_num1'] = rand(1, 9);
    $_SESSION['captcha_num2'] = rand(1, 9);
}

$captchaQuestion = $_SESSION['captcha_num1'] . " + " . $_SESSION['captcha_num2'];
?>
