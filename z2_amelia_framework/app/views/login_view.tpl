<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Logowanie</title>
    <link rel="stylesheet" href="{$conf->app_url}/css/style.css">
</head>
<body>
    <main class="calc-container">
        <h2 class="calc-title">&gt; Autoryzacja</h2>

        <form action="{$conf->action_root}login" method="post" class="calc-form">
            <div class="form-group">
                <label for="id_login">Login:</label>
                <input id="id_login" class="form-control" type="text" name="login" placeholder="admin lub user" value="{$login|default:''}" />
            </div>

            <div class="form-group">
                <label for="id_pass">Hasło:</label>
                <input id="id_pass" class="form-control" type="password" name="pass" placeholder="***" />
            </div>

            <input class="btn-submit" type="submit" value="[ Zaloguj ]" />
        </form>

        {if $msgs->isError()}
            <div class="alert-error">
                <h4>[!] Błąd dostępu:</h4>
                <ol>
                    {foreach $msgs->getErrors() as $err}
                        <li>{$err}</li>
                    {/foreach}
                </ol>
            </div>
        {/if}
    </main>
</body>
</html>
