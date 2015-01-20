<?php
// ------ index.php-------------------------
#Подгрузка файла с модулями
define('DEBUG','0');
define('DATE_FORMAT','Y-m-d');

if(DEBUG){
    print '<p><font size="5px"><b>Включен режим отладки!</b></font><hr></p>';
}

include_once 'autoinclude.php';

$loader = Loader::getInstance();
$loader->load_all_modules();

/*
$dg = ViewDebug::getInstance();
$dg->ViewRequest();
$dg->viewIncludeModules($loader);
*/

var_dump(date(DATE_FORMAT));

$smarty = CreateSmarty::getInstance();
//$smarty->iniSmarty();

$smFolder = 'index';
$go = $smarty->iniSmarty($smFolder);
$go->assign('name','Дмитрий и Александр!');

$go->display('index.tpl');

print '<p>';
//testFunc();

function testFunc(){
    $test= new AuthorizationForm();
    $test->renderForm();
}
print '</p>';

$r = Router::getInstance();
$r->process($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);








