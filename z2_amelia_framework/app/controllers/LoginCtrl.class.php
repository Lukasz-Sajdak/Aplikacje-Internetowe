<?php
namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\RoleUtils;

class LoginCtrl {
    public function action_login() {
        $login = ParamUtils::getFromRequest('login');
        $pass = ParamUtils::getFromRequest('pass');

        if (isset($login) && isset($pass)) {
            if ($login == "") App::getMessages()->addError('Nie podano loginu.');
            if ($pass == "") App::getMessages()->addError('Nie podano hasła.');

            if (!App::getMessages()->isError()) {
                if ($login == 'admin' && $pass == 'admin') {
                    RoleUtils::addRole('admin');
                    App::getRouter()->redirectTo('calcCompute');
                } else if ($login == 'user' && $pass == 'user') {
                    RoleUtils::addRole('user');
                    App::getRouter()->redirectTo('calcCompute');
                } else {
                    App::getMessages()->addError('Nieprawidłowy login lub hasło.');
                }
            }
        }

        App::getSmarty()->assign('login', $login);
        App::getSmarty()->display('login_view.tpl');
    }

    public function action_logout() {
        session_destroy();
        App::getRouter()->redirectTo('login');
    }
}
