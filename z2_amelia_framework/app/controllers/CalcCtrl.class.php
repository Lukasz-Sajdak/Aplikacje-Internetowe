<?php
namespace app\controllers;

use core\App;
use core\ParamUtils;
use core\RoleUtils;

class CalcCtrl {
    public function action_calcCompute() {
        $weight = ParamUtils::getFromRequest('weight');
        $height = ParamUtils::getFromRequest('height');
        $age = ParamUtils::getFromRequest('age');
        $gender = ParamUtils::getFromRequest('gender');
        $activity = ParamUtils::getFromRequest('activity');

        $result_bmi = null;
        $result_kcal = null;
        $bmi_category = null;

        if (isset($weight) && isset($height) && isset($age) && isset($gender) && isset($activity)) {
            if ($weight == "") App::getMessages()->addError('Nie podano wagi');
            if ($height == "") App::getMessages()->addError('Nie podano wzrostu');
            if ($age == "") App::getMessages()->addError('Nie podano wieku');

            if (!App::getMessages()->isError()) {
                if (!is_numeric($weight) || $weight <= 0) App::getMessages()->addError('Waga musi być dodatnią liczbą');
                if (!is_numeric($height) || $height <= 0) App::getMessages()->addError('Wzrost musi być dodatnią liczbą');
                if (!is_numeric($age) || $age <= 0) App::getMessages()->addError('Wiek musi być dodatnią liczbą');
            }

            if (!App::getMessages()->isError()) {
                $weight = floatval($weight);
                $height = floatval($height);
                $age = intval($age);
                $activity = floatval($activity);

                $height_m = $height / 100;
                $result_bmi = round($weight / ($height_m * $height_m), 2);

                if ($result_bmi < 18.5) $bmi_category = "Niedowaga";
                elseif ($result_bmi < 24.9) $bmi_category = "Waga prawidłowa";
                elseif ($result_bmi < 29.9) $bmi_category = "Nadwaga";
                else $bmi_category = "Otyłość";

                if ($gender == 'M') {
                    $bmr = (10 * $weight) + (6.25 * $height) - (5 * $age) + 5;
                } else {
                    $bmr = (10 * $weight) + (6.25 * $height) - (5 * $age) - 161;
                }
                $result_kcal = round($bmr * $activity);
            }
        }

        // Przekazanie zmiennych do widoku
        App::getSmarty()->assign('weight', $weight);
        App::getSmarty()->assign('height', $height);
        App::getSmarty()->assign('age', $age);
        App::getSmarty()->assign('gender', $gender);
        App::getSmarty()->assign('activity', $activity);
        App::getSmarty()->assign('result_bmi', $result_bmi);
        App::getSmarty()->assign('bmi_category', $bmi_category);
        App::getSmarty()->assign('result_kcal', $result_kcal);

        App::getSmarty()->assign('isAdmin', RoleUtils::inRole('admin'));
        App::getSmarty()->assign('currentRole', RoleUtils::inRole('admin') ? 'admin' : 'user');
        App::getSmarty()->display('calc_view.tpl');
    }
}
