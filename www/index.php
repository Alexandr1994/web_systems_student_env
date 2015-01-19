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

$smarty = CreateSmarty::getInstance();
//$smarty->iniSmarty();
$go = $smarty->iniSmarty($index);
$go->assign('name','Дмитрий и Александр!');

$go->display('index.tpl');

testFunc();

function testFunc(){
    $label = "Пароль";
    $name = "pass";
    $test= new PasswordField();
    $test->label($label);
    $test->name($name);
    echo $test->render();
}





$r = Router::getInstance();
$r->process($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);








