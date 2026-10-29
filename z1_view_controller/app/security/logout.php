<?php
require_once dirname(__FILE__).'/../../config.php';
session_start();

session_unset();
session_destroy();

header("Location: "._APP_URL."/app/security/login.php");
exit();
?>