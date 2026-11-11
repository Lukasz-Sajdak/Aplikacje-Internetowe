<?php
use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('calcCompute');
App::getRouter()->setLoginRoute('login');

Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');
Utils::addRoute('calcCompute', 'CalcCtrl', ['user', 'admin']);
