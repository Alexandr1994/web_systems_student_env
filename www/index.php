<?php
// ------ index.php-------------------------
#Подгрузка файла с модулями
define('DEBUG','0');
if(DEBUG){
    print '<p><font size="5px"><b>Включен режим отладки!</b></font><hr></p>';
}

include_once 'module.load.php';

$loader = Loader::getInstance();
$loader->load_all_modules();

$dg = ViewDebug::getInstance();
$dg->ViewRequest();
$dg->viewIncludeModules($loader);

var_dump(date("Y-m-d"));

//$smarty = CreateSmarty::getInstance();
//$smarty->iniSmarty();
//$go = $smarty->iniSmarty();
$smarty = new Smarty();
//$go->template_dir = '/application/core/smarty_folder/templates/';
//$go->compile_dir = '/application/core/smarty_folder/templates_c/';
//$go->config_dir = '/application/core/smarty_folder/configs/';
//$go->cache_dir = '/application/core/smarty_folder/cache/';
$smarty->template_dir = 'application/templates/';
$smarty->compile_dir = 'application/templates_c/';
$smarty->config_dir = 'application/configs/';
$smarty->cache_dir = '/www/application/cache';
//$go->assign('name','KAT');
//$go->display('index.tpl');
$smarty->debugging = true;
$smarty->assign('name','katya');
$smarty->display('index.tpl');

$r = Router::getInstance();
$r->process($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);








