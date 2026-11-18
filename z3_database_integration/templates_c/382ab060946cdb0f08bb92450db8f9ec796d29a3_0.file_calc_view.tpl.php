<?php
/* Smarty version 5.4.5, created on 2026-11-11 14:24:05
  from 'file:calc_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6af46c75dd77f7_34895775',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '382ab060946cdb0f08bb92450db8f9ec796d29a3' => 
    array (
      0 => 'calc_view.tpl',
      1 => 1794402536,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6af46c75dd77f7_34895775 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/lukas/studia/AppInt/z2_amelia_framework/app/views';
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
    <main class="calc-container">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">
            <span style="color: var(--text-muted); font-size: 0.9rem;">
                Zalogowano jako: <strong style="color: var(--primary-color); text-transform: uppercase;"><?php echo $_smarty_tpl->getValue('currentRole');?>
</strong>
            </span>
            <a href="<?php echo $_smarty_tpl->getValue('conf')->action_root;?>
logout" class="btn-submit" style="padding: 6px 12px; font-size: 0.8rem; margin-top: 0; text-decoration: none;">[ Wyloguj ]</a>
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
            <div class="alert-result" style="border-color: #ffaa00; background-color: rgba(255, 170, 0, 0.05); margin-top: 30px;">
                <h4 style="color: #ffaa00; border-bottom-color: rgba(255, 170, 0, 0.3);">Panel Administratora</h4>
                <p class="result-item" style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 10px;">
                    Dodatkowe uprawnienia
                </p>
                <button class="btn-submit" style="border-color: #ffaa00; color: #ffaa00; font-size: 0.8rem; padding: 8px;">[ OPCJA A ]</button>
                <button class="btn-submit" style="border-color: #ff4d4d; color: #ff4d4d; font-size: 0.8rem; padding: 8px; margin-left: 10px;">[ OPCJA B ]</button>
            </div>
        <?php }?>
    </main>
</body>
</html>
<?php }
}
