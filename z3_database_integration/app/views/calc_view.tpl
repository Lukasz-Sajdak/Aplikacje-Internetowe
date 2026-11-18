<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kalkulator BMI i Kalorii</title>
    <link rel="stylesheet" href="{$conf->app_url}/css/style.css">
</head>
<body>
    <main class="calc-container {if isset($showData) && $showData}wide{/if}">
        <div class="top-bar">
            <span class="user-info">
                Zalogowano jako: <strong class="highlight uppercase">{$currentRole}</strong>
            </span>
            <a href="{$conf->action_root}logout" class="btn-submit btn-sm">[ Wyloguj ]</a>
        </div>

        <h2 class="calc-title">&gt; Kalkulator_BMI &amp; Kalorii</h2>

        <form action="{$conf->action_root}calcCompute" method="post" class="calc-form">
            <div class="form-group">
                <label for="id_weight">Waga (kg):</label>
                <input id="id_weight" class="form-control" type="text" name="weight" placeholder="np. 75" value="{$weight|default:''}" />
            </div>

            <div class="form-group">
                <label for="id_height">Wzrost (cm):</label>
                <input id="id_height" class="form-control" type="text" name="height" placeholder="np. 180" value="{$height|default:''}" />
            </div>

            <div class="form-group">
                <label for="id_age">Wiek:</label>
                <input id="id_age" class="form-control" type="text" name="age" placeholder="np. 25" value="{$age|default:''}" />
            </div>

            <div class="form-group">
                <label for="id_gender">Płeć:</label>
                <select id="id_gender" class="form-control" name="gender">
                    <option value="M" {if isset($gender) && $gender == 'M'}selected{/if}>Mężczyzna</option>
                    <option value="K" {if isset($gender) && $gender == 'K'}selected{/if}>Kobieta</option>
                </select>
            </div>

            <div class="form-group">
                <label for="id_activity">Aktywność fizyczna:</label>
                <select id="id_activity" class="form-control" name="activity">
                    <option value="1.2" {if isset($activity) && $activity == '1.2'}selected{/if}>Brak (praca siedząca)</option>
                    <option value="1.375" {if isset($activity) && $activity == '1.375'}selected{/if}>Niska (lekkie ćwiczenia)</option>
                    <option value="1.55" {if isset($activity) && $activity == '1.55'}selected{/if}>Umiarkowana (trening 3-5x/tydz)</option>
                    <option value="1.725" {if isset($activity) && $activity == '1.725'}selected{/if}>Wysoka (ciężki trening)</option>
                </select>
            </div>

            <input class="btn-submit" type="submit" value="[ Oblicz ]" />
        </form>

        {if $msgs->isError()}
            <div class="alert-error">
                <h4>[!] Wystąpiły błędy:</h4>
                <ol>
                    {foreach $msgs->getErrors() as $err}
                        <li>{$err}</li>
                    {/foreach}
                </ol>
            </div>
        {/if}

        {if isset($result_bmi) && isset($result_kcal)}
            <div class="alert-result">
                <h4>System_Output:</h4>
                <p class="result-item"><strong>BMI:</strong> <span class="highlight">{$result_bmi}</span> ({$bmi_category})</p>
                <p class="result-item"><strong>Zapotrzebowanie:</strong> <span class="highlight">{$result_kcal}</span> kcal / dzień</p>
            </div>
        {/if}

        {if $isAdmin}
            <div class="alert-result admin-panel">
                <h4>Panel Administratora</h4>
                <p class="result-item admin-desc">
                    Dodatkowe uprawnienia
                </p>
                <div class="admin-actions">
                    <a href="{$conf->action_root}showData" class="btn-submit btn-sm btn-warning">[ SHOW DATA ]</a>
                    {if isset($showData) && $showData}
                        <a href="{$conf->action_root}calcCompute" class="btn-submit btn-sm">[ HIDE DATA ]</a>
                    {/if}
                    <button type="button" class="btn-submit btn-sm btn-danger">[ OPCJA B ]</button>
                </div>

                {if isset($showData) && $showData}
                    <div class="history-section">
                        <h5 class="history-title">&gt; Baza_Obliczeń (tabela: calcs)</h5>
                        {if isset($records) && count($records) > 0}
                            <div class="table-wrapper">
                                <table class="db-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Login</th>
                                            <th>Parametry</th>
                                            <th>BMI</th>
                                            <th>Kcal</th>
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {foreach $records as $row}
                                            <tr>
                                                <td>{$row.id}</td>
                                                <td><span class="highlight">{$row.login}</span></td>
                                                <td>{$row.weight} kg | {$row.height} cm | {$row.age} l. | {$row.gender} | akt: {$row.activity}</td>
                                                <td><span class="highlight">{$row.result_bmi}</span> ({$row.bmi_category})</td>
                                                <td><span class="highlight">{$row.result_kcal}</span> kcal</td>
                                                <td>{$row.created_at}</td>
                                            </tr>
                                        {/foreach}
                                    </tbody>
                                </table>
                            </div>
                        {else}
                            <p class="result-item admin-desc">Brak zapisanych rekordów w bazie danych.</p>
                        {/if}
                    </div>
                {/if}
            </div>
        {/if}
    </main>
</body>
</html>