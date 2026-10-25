<!DOCTYPE HTML>
<head>
    <meta charset="utf-8" />
    <title>PHP view-controller</title>
</head>
<body>
    <h2>Kalkulator BMI i Zapotrzebowania Kalorycznego</h2>
    
    <form action="<?php echo _APP_URL;?>/app/calc.php" method="post">
        <label for="id_weight">Waga (kg): </label>
        <input id="id_weight" type="text" name="weight" value="<?php echo isset($weight) ? $weight : ''; ?>" /><br /><br />
        
        <label for="id_height">Wzrost (cm): </label>
        <input id="id_height" type="text" name="height" value="<?php echo isset($height) ? $height : ''; ?>" /><br /><br />
        
        <label for="id_age">Wiek: </label>
        <input id="id_age" type="text" name="age" value="<?php echo isset($age) ? $age : ''; ?>" /><br /><br />
        
        <label>Płeć: </label>
        <select name="gender">
            <option value="M" <?php if(isset($gender) && $gender == 'M') echo 'selected'; ?>>Mężczyzna</option>
            <option value="K" <?php if(isset($gender) && $gender == 'K') echo 'selected'; ?>>Kobieta</option>
        </select><br /><br />
        
        <label>Aktywność fizyczna: </label>
        <select name="activity">
            <option value="1.2" <?php if(isset($activity) && $activity == '1.2') echo 'selected'; ?>>Brak (praca siedząca)</option>
            <option value="1.375" <?php if(isset($activity) && $activity == '1.375') echo 'selected'; ?>>Niska (lekkie ćwiczenia)</option>
            <option value="1.55" <?php if(isset($activity) && $activity == '1.55') echo 'selected'; ?>>Umiarkowana (trening 3-5x/tydz)</option>
            <option value="1.725" <?php if(isset($activity) && $activity == '1.725') echo 'selected'; ?>>Wysoka (ciężki trening)</option>
        </select><br /><br />
        
        <input type="submit" value="Oblicz" />
    </form>    

    <?php if (isset($messages) && count($messages) > 0): ?>
        <div style="color: red; margin-top: 20px;">
            <h4>Wystąpiły błędy:</h4>
            <ol>
                <?php foreach($messages as $msg): ?>
                    <li><?php echo $msg; ?></li>
                <?php endforeach; ?>
            </ol>
        </div>
    <?php endif; ?>

    <?php if (isset($result_bmi) && isset($result_kcal)): ?>
        <div style="background-color: #e8f5e9; padding: 15px; margin-top: 20px; border-radius: 5px; width: 300px;">
            <h4>Wyniki:</h4>
            <p><strong>Twoje BMI:</strong> <?php echo $result_bmi; ?> (<?php echo $bmi_category; ?>)</p>
            <p><strong>Zapotrzebowanie:</strong> <?php echo $result_kcal; ?> kcal / dzień</p>
        </div>
    <?php endif; ?>

</body>
</html>