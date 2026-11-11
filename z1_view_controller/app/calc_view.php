<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kalkulator BMI i Kalorii</title>
    <link rel="stylesheet" href="<?php echo _APP_URL; ?>/css/style.css">
</head>
<body>

    <main class="calc-container">

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">
            <span style="color: var(--text-muted); font-size: 0.9rem;">
                Zalogowano jako: <strong style="color: var(--primary-color); text-transform: uppercase;"><?php echo $_SESSION['role']; ?></strong>
            </span>
            <a href="<?php echo _APP_URL; ?>/app/security/logout.php" class="btn-submit" style="padding: 6px 12px; font-size: 0.8rem; margin-top: 0; text-decoration: none;">[ Wyloguj ]</a>
        </div>

        <h2 class="calc-title">&gt; Kalkulator_BMI &amp; Kalorii</h2>
        
        <form action="<?php echo _APP_URL;?>/app/calc.php" method="post" class="calc-form">
            <div class="form-group">
                <label for="id_weight">Waga (kg):</label>
                <input id="id_weight" class="form-control" type="text" name="weight" placeholder="np. 75" value="<?php echo isset($weight) ? $weight : ''; ?>" />
            </div>
            
            <div class="form-group">
                <label for="id_height">Wzrost (cm):</label>
                <input id="id_height" class="form-control" type="text" name="height" placeholder="np. 180" value="<?php echo isset($height) ? $height : ''; ?>" />
            </div>
            
            <div class="form-group">
                <label for="id_age">Wiek:</label>
                <input id="id_age" class="form-control" type="text" name="age" placeholder="np. 25" value="<?php echo isset($age) ? $age : ''; ?>" />
            </div>
            
            <div class="form-group">
                <label for="id_gender">Płeć:</label>
                <select id="id_gender" class="form-control" name="gender">
                    <option value="M" <?php if(isset($gender) && $gender == 'M') echo 'selected'; ?>>Mężczyzna</option>
                    <option value="K" <?php if(isset($gender) && $gender == 'K') echo 'selected'; ?>>Kobieta</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="id_activity">Aktywność fizyczna:</label>
                <select id="id_activity" class="form-control" name="activity">
                    <option value="1.2" <?php if(isset($activity) && $activity == '1.2') echo 'selected'; ?>>Brak (praca siedząca)</option>
                    <option value="1.375" <?php if(isset($activity) && $activity == '1.375') echo 'selected'; ?>>Niska (lekkie ćwiczenia)</option>
                    <option value="1.55" <?php if(isset($activity) && $activity == '1.55') echo 'selected'; ?>>Umiarkowana (trening 3-5x/tydz)</option>
                    <option value="1.725" <?php if(isset($activity) && $activity == '1.725') echo 'selected'; ?>>Wysoka (ciężki trening)</option>
                </select>
            </div>
            
            <input class="btn-submit" type="submit" value="[ Oblicz ]" />
        </form>    

        <?php if (isset($messages) && count($messages) > 0): ?>
            <div class="alert-error">
                <h4>[!] Wystąpiły błędy:</h4>
                <ol>
                    <?php foreach($messages as $msg): ?>
                        <li><?php echo $msg; ?></li>
                    <?php endforeach; ?>
                </ol>
            </div>
        <?php endif; ?>

        <?php if (isset($result_bmi) && isset($result_kcal)): ?>
            <div class="alert-result">
                <h4>System_Output:</h4>
                <p class="result-item"><strong>BMI:</strong> <span class="highlight"><?php echo $result_bmi; ?></span> (<?php echo $bmi_category; ?>)</p>
                <p class="result-item"><strong>Zapotrzebowanie:</strong> <span class="highlight"><?php echo $result_kcal; ?></span> kcal / dzień</p>
            </div>
        <?php endif; ?>

        <?php if ($_SESSION['role'] == 'admin'): ?>
            <div class="alert-result" style="border-color: #ffaa00; background-color: rgba(255, 170, 0, 0.05); margin-top: 30px;">
                <h4 style="color: #ffaa00; border-bottom-color: rgba(255, 170, 0, 0.3);">Panel Administratora</h4>
                <p class="result-item" style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 10px;">
                    Dodatkowe uprawnienia
                </p>
                <button class="btn-submit" style="border-color: #ffaa00; color: #ffaa00; font-size: 0.8rem; padding: 8px;">[ OPCJA A ]</button>
                <button class="btn-submit" style="border-color: #ff4d4d; color: #ff4d4d; font-size: 0.8rem; padding: 8px; margin-left: 10px;">[ OPCJA B ]</button>
            </div>
        <?php endif; ?>
    </main>

</body>
</html>