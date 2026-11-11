<?php
require_once 'init.php';
use core\App;
header("Location: ". \core\App::getConf()->app_url ."/ctrl.php");
