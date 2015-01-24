<?php
// ------ index.php-------------------------
#Подгрузка файла с модулями
define('DEBUG','0');
define('DATE_FORMAT','Y-m-d');

include_once 'autoinclude.php';

$loader = Loader::getInstance();
$loader->load_all_modules();

var_dump(date(DATE_FORMAT));
$smarty = CreateSmarty::getInstance();

$smFolder = 'index';
$go = $smarty->iniSmarty($smFolder);
$go->assign('name','Дмитрий и Александр!');
$go->display('index.tpl');

$r = Router::getInstance();
$r->process($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);







