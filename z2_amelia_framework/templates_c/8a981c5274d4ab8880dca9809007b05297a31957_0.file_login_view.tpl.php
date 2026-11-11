<?php
/* Smarty version 5.4.5, created on 2026-11-11 14:15:23
  from 'file:login_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6af46a6b8905a7_31160449',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a981c5274d4ab8880dca9809007b05297a31957' => 
    array (
      0 => 'login_view.tpl',
      1 => 1794402450,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6af46a6b8905a7_31160449 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/lukas/studia/AppInt/z2_amelia_framework/amelia/app/views';
?><!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Logowanie</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->getValue('conf')->app_url;?>
/css/style.css">
</head>
<body>
    <main class="calc-container">
        <h2 class="calc-title">&gt; Autoryzacja</h2>

        <form action="<?php echo $_smarty_tpl->getValue('conf')->action_root;?>
login" method="post" class="calc-form">
            <div class="form-group">
                <label for="id_login">Login:</label>
                <input id="id_login" class="form-control" type="text" name="login" placeholder="admin lub user" value="<?php echo (($tmp = $_smarty_tpl->getValue('login') ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" />
            </div>

            <div class="form-group">
                <label for="id_pass">Hasło:</label>
                <input id="id_pass" class="form-control" type="password" name="pass" placeholder="***" />
            </div>

            <input class="btn-submit" type="submit" value="[ Zaloguj ]" />
        </form>

        <?php if ($_smarty_tpl->getValue('msgs')->isError()) {?>
            <div class="alert-error">
                <h4>[!] Błąd dostępu:</h4>
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
    </main>
</body>
</html>
<?php }
}
