<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-01-24 10:16:59
         compiled from "application/core/smarty_folder/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:92773480754c3711bd43db8-20230702%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6c9ba9dcde4b863f4236f04ea3e1e5977853ca3' => 
    array (
      0 => 'application/core/smarty_folder/templates/index.tpl',
      1 => 1422090851,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92773480754c3711bd43db8-20230702',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'header' => 0,
    'content' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54c3711be0f820_77560457',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54c3711be0f820_77560457')) {function content_54c3711be0f820_77560457($_smarty_tpl) {?>
<html>
    <header>
        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    </header>
    <body>
    <div id="wrapper">
        <div id="header">
            <?php echo $_smarty_tpl->tpl_vars['header']->value;?>

        </div>
        <div id="content">
            <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

        </div>
        <div id ="footer">
            <?php echo $_smarty_tpl->tpl_vars['footer']->value;?>

        </div>
    </div>
    </body>
</html>
<?php }} ?>
