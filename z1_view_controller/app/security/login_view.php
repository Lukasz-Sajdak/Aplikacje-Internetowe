<!DOCTYPE HTML>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Logowanie</title>
    <link rel="stylesheet" href="<?php echo _APP_URL; ?>/css/style.css">
</head>
<body>

    <main class="calc-container">
        <h2 class="calc-title">&gt; Autoryzacja</h2>
        
        <form action="<?php echo _APP_URL;?>/app/security/login.php" method="post" class="calc-form">
            <div class="form-group">
                <label for="id_login">Login:</label>
                <input id="id_login" class="form-control" type="text" name="login" placeholder="admin lub user" value="<?php echo isset($login) ? $login : ''; ?>" />
            </div>
            
            <div class="form-group">
                <label for="id_pass">Hasło:</label>
                <input id="id_pass" class="form-control" type="password" name="pass" placeholder="***" />
            </div>
            
            <input class="btn-submit" type="submit" value="[ Zaloguj ]" />
        </form>    

        <?php if (isset($messages) && count($messages) > 0): ?>
            <div class="alert-error">
                <h4>[!] Błąd dostępu:</h4>
                <ol>
                    <?php foreach($messages as $msg): ?>
                        <li><?php echo $msg; ?></li>
                    <?php endforeach; ?>
                </ol>
            </div>
        <?php endif; ?>
    </main>

</body>
</html>