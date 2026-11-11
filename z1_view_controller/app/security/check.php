<?php
require_once dirname(__FILE__).'/../../config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['role'])) {
    header("Location: "._APP_URL."/app/security/login.php");
    exit();
}
?>