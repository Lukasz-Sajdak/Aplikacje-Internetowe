<?php
/* Smarty version 5.4.5, created on 2026-11-11 13:43:15
  from 'file:Hello.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6af462e34220a8_31491218',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93dc0df3c804a2fda7e082340b12ee3e3b02f969' => 
    array (
      0 => 'Hello.tpl',
      1 => 1794398600,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6af462e34220a8_31491218 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/home/lukas/studia/AppInt/z2_amelia_framework/amelia/app/views';
?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8"/>
	<title>Hello World | Amelia framework</title>
</head>

<body>
    
    My value: <?php echo $_smarty_tpl->getValue('value');?>

    
    <?php if ($_smarty_tpl->getValue('msgs')->isInfo()) {?>
        <ul>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getMessages(), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
            <li><?php echo $_smarty_tpl->getValue('msg')->text;?>
</li>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </ul>
    <?php }?>

</body>

</html><?php }
}
