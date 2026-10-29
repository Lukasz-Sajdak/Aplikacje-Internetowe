<?php
require_once dirname(__FILE__).'/../config.php';
require_once dirname(__FILE__).'/security/check.php';

// 1. Pobranie parametrów
$weight = $_REQUEST['weight'] ?? null;
$height = $_REQUEST['height'] ?? null;
$age = $_REQUEST['age'] ?? null;
$gender = $_REQUEST['gender'] ?? null;
$activity = $_REQUEST['activity'] ?? null;

// 2. Walidacja
$messages = [];
$result_bmi = null;
$result_kcal = null;
$bmi_category = null;

if (isset($weight) && isset($height) && isset($age) && isset($gender) && isset($activity)) {
    if ($weight == "") $messages[] = 'Nie podano wagi';
    if ($height == "") $messages[] = 'Nie podano wzrostu';
    if ($age == "") $messages[] = 'Nie podano wieku';

    if (empty($messages)) {
        if (!is_numeric($weight) || $weight <= 0) $messages[] = 'Waga musi być dodatnią liczbą';
        if (!is_numeric($height) || $height <= 0) $messages[] = 'Wzrost musi być dodatnią liczbą';
        if (!is_numeric($age) || $age <= 0) $messages[] = 'Wiek musi być dodatnią liczbą';
    }

    // 3. Logika biznesowa
    if (empty($messages)) {
        $weight = floatval($weight);
        $height = floatval($height);
        $age = intval($age);
        $activity = floatval($activity);

        // BMI
        $height_m = $height / 100;
        $result_bmi = round($weight / ($height_m * $height_m), 2);

        if ($result_bmi < 18.5) $bmi_category = "Niedowaga";
        elseif ($result_bmi < 24.9) $bmi_category = "Waga prawidłowa";
        elseif ($result_bmi < 29.9) $bmi_category = "Nadwaga";
        else $bmi_category = "Otyłość";

        // Zapotrzebowanie Kaloryczne (Wzór Mifflina-St Jeora)
        if ($gender == 'M') {
            $bmr = (10 * $weight) + (6.25 * $height) - (5 * $age) + 5;
        } else {
            $bmr = (10 * $weight) + (6.25 * $height) - (5 * $age) - 161;
        }
        
        $result_kcal = round($bmr * $activity);
    }
}

// 4. Wywołanie widoku
include 'calc_view.php';
?>