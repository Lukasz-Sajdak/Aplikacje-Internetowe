<?php
/* Smarty version 5.4.5, created on 2026-11-18 18:31:51
  from 'file:calc_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6afde107c511e4_86236576',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7facdb322132b47ccecd0aff5c5f1feea5f51a68' => 
    array (
      0 => 'calc_view.tpl',
      1 => 1795023095,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6afde107c511e4_86236576 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/lukas/studia/AppInt/z3_database_integration/app/views';
?><!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kalkulator BMI i Kalorii</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/css/style.css">
</head>
<body>
    <main class="calc-container <?php if ((true && ($_smarty_tpl->hasVariable('showData') && null !== ($_smarty_tpl->getValue('showData') ?? null))) && $_smarty_tpl->getValue('showData')) {?>wide<?php }?>">
        <div class="top-bar">
            <span class="user-info">
                Zalogowano jako: <strong class="highlight uppercase"><?php echo $_smarty_tpl->getValue('currentRole');?>
</strong>
            </span>
            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_root;?>
logout" class="btn-submit btn-sm">[ Wyloguj ]</a>
        </div>

        <h2 class="calc-title">&gt; Kalkulator_BMI &amp; Kalorii</h2>

        <form action="<?php echo $_smarty_tpl->getValue('conf')->action_root;?>
calcCompute" method="post" class="calc-form">
            <div class="form-group">
                <label for="id_weight">Waga (kg):</label>
                <input id="id_weight" class="form-control" type="text" name="weight" placeholder="np. 75" value="<?php echo (($tmp = $_smarty_tpl->getValue('weight') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" />
            </div>

            <div class="form-group">
                <label for="id_height">Wzrost (cm):</label>
                <input id="id_height" class="form-control" type="text" name="height" placeholder="np. 180" value="<?php echo (($tmp = $_smarty_tpl->getValue('height') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" />
            </div>

            <div class="form-group">
                <label for="id_age">Wiek:</label>
                <input id="id_age" class="form-control" type="text" name="age" placeholder="np. 25" value="<?php echo (($tmp = $_smarty_tpl->getValue('age') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" />
            </div>

            <div class="form-group">
                <label for="id_gender">Płeć:</label>
                <select id="id_gender" class="form-control" name="gender">
                    <option value="M" <?php if ((true && ($_smarty_tpl->hasVariable('gender') && null !== ($_smarty_tpl->getValue('gender') ?? null))) && $_smarty_tpl->getValue('gender') == 'M') {?>selected<?php }?>>Mężczyzna</option>
                    <option value="K" <?php if ((true && ($_smarty_tpl->hasVariable('gender') && null !== ($_smarty_tpl->getValue('gender') ?? null))) && $_smarty_tpl->getValue('gender') == 'K') {?>selected<?php }?>>Kobieta</option>
                </select>
            </div>

            <div class="form-group">
                <label for="id_activity">Aktywność fizyczna:</label>
                <select id="id_activity" class="form-control" name="activity">
                    <option value="1.2" <?php if ((true && ($_smarty_tpl->hasVariable('activity') && null !== ($_smarty_tpl->getValue('activity') ?? null))) && $_smarty_tpl->getValue('activity') == '1.2') {?>selected<?php }?>>Brak (praca siedząca)</option>
                    <option value="1.375" <?php if ((true && ($_smarty_tpl->hasVariable('activity') && null !== ($_smarty_tpl->getValue('activity') ?? null))) && $_smarty_tpl->getValue('activity') == '1.375') {?>selected<?php }?>>Niska (lekkie ćwiczenia)</option>
                    <option value="1.55" <?php if ((true && ($_smarty_tpl->hasVariable('activity') && null !== ($_smarty_tpl->getValue('activity') ?? null))) && $_smarty_tpl->getValue('activity') == '1.55') {?>selected<?php }?>>Umiarkowana (trening 3-5x/tydz)</option>
                    <option value="1.725" <?php if ((true && ($_smarty_tpl->hasVariable('activity') && null !== ($_smarty_tpl->getValue('activity') ?? null))) && $_smarty_tpl->getValue('activity') == '1.725') {?>selected<?php }?>>Wysoka (ciężki trening)</option>
                </select>
            </div>

            <input class="btn-submit" type="submit" value="[ Oblicz ]" />
        </form>

        <?php if ($_smarty_tpl->getValue('msgs')->isError()) {?>
            <div class="alert-error">
                <h4>[!] Wystąpiły błędy:</h4>
                <ol>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getErrors(), 'err');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('err')->value) {
$foreach0DoElse = false;
?>
                        <li><?php echo $_smarty_tpl->getValue('err');?>
</li>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </ol>
            </div>
        <?php }?>

        <?php if ((true && ($_smarty_tpl->hasVariable('result_bmi') && null !== ($_smarty_tpl->getValue('result_bmi') ?? null))) && (true && ($_smarty_tpl->hasVariable('result_kcal') && null !== ($_smarty_tpl->getValue('result_kcal') ?? null)))) {?>
            <div class="alert-result">
                <h4>System_Output:</h4>
                <p class="result-item"><strong>BMI:</strong> <span class="highlight"><?php echo $_smarty_tpl->getValue('result_bmi');?>
</span> (<?php echo $_smarty_tpl->getValue('bmi_category');?>
)</p>
                <p class="result-item"><strong>Zapotrzebowanie:</strong> <span class="highlight"><?php echo $_smarty_tpl->getValue('result_kcal');?>
</span> kcal / dzień</p>
            </div>
        <?php }?>

        <?php if ($_smarty_tpl->getValue('isAdmin')) {?>
            <div class="alert-result admin-panel">
                <h4>Panel Administratora</h4>
                <p class="result-item admin-desc">
                    Dodatkowe uprawnienia
                </p>
                <div class="admin-actions">
                    <a href="<?php echo $_smarty_tpl->getValue('conf')->action_root;?>
showData" class="btn-submit btn-sm btn-warning">[ SHOW DATA ]</a>
                    <?php if ((true && ($_smarty_tpl->hasVariable('showData') && null !== ($_smarty_tpl->getValue('showData') ?? null))) && $_smarty_tpl->getValue('showData')) {?>
                        <a href="<?php echo $_smarty_tpl->getValue('conf')->action_root;?>
calcCompute" class="btn-submit btn-sm">[ HIDE DATA ]</a>
                    <?php }?>
                    <button type="button" class="btn-submit btn-sm btn-danger">[ OPCJA B ]</button>
                </div>

                <?php if ((true && ($_smarty_tpl->hasVariable('showData') && null !== ($_smarty_tpl->getValue('showData') ?? null))) && $_smarty_tpl->getValue('showData')) {?>
                    <div class="history-section">
                        <h5 class="history-title">&gt; Baza_Obliczeń (tabela: calcs)</h5>
                        <?php if ((true && ($_smarty_tpl->hasVariable('records') && null !== ($_smarty_tpl->getValue('records') ?? null))) && $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('records')) > 0) {?>
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
                                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('records'), 'row');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('row')->value) {
$foreach1DoElse = false;
?>
                                            <tr>
                                                <td><?php echo $_smarty_tpl->getValue('row')['id'];?>
</td>
                                                <td><span class="highlight"><?php echo $_smarty_tpl->getValue('row')['login'];?>
</span></td>
                                                <td><?php echo $_smarty_tpl->getValue('row')['weight'];?>
 kg | <?php echo $_smarty_tpl->getValue('row')['height'];?>
 cm | <?php echo $_smarty_tpl->getValue('row')['age'];?>
 l. | <?php echo $_smarty_tpl->getValue('row')['gender'];?>
 | akt: <?php echo $_smarty_tpl->getValue('row')['activity'];?>
</td>
                                                <td><span class="highlight"><?php echo $_smarty_tpl->getValue('row')['result_bmi'];?>
</span> (<?php echo $_smarty_tpl->getValue('row')['bmi_category'];?>
)</td>
                                                <td><span class="highlight"><?php echo $_smarty_tpl->getValue('row')['result_kcal'];?>
</span> kcal</td>
                                                <td><?php echo $_smarty_tpl->getValue('row')['created_at'];?>
</td>
                                            </tr>
                                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                                    </tbody>
                                </table>
                            </div>
                        <?php } else { ?>
                            <p class="result-item admin-desc">Brak zapisanych rekordów w bazie danych.</p>
                        <?php }?>
                    </div>
                <?php }?>
            </div>
        <?php }?>
    </main>
</body>
</html><?php }
}
