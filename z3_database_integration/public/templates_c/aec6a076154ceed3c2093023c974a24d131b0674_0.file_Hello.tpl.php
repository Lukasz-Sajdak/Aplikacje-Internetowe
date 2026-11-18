<?php
/* Smarty version 5.4.5, created on 2025-04-28 16:17:43
  from 'file:Hello.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_680f8e07992157_59420270',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aec6a076154ceed3c2093023c974a24d131b0674' => 
    array (
      0 => 'Hello.tpl',
      1 => 1745848871,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_680f8e07992157_59420270 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\amelia\\app\\views';
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
