<?php
require_once dirname(__FILE__).'/../../config.php';
session_start();

$login = $_REQUEST['login'] ?? null;
$pass = $_REQUEST['pass'] ?? null;

$messages = [];

if (isset($login) && isset($pass)) {
    if ($login == "") $messages[] = 'Nie podano loginu.';
    if ($pass == "") $messages[] = 'Nie podano hasła.';

    if (empty($messages)) {
        if ($login == 'admin' && $pass == 'admin') {
            $_SESSION['role'] = 'admin';
            header("Location: "._APP_URL);
            exit();
        } else if ($login == 'user' && $pass == 'user') {
            $_SESSION['role'] = 'user';
            header("Location: "._APP_URL);
            exit();
        } else {
            $messages[] = 'Nieprawidłowy login lub hasło.';
        }
    }
}
include 'login_view.php';
?>