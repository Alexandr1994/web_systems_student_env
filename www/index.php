<?php
// ------ index.php-------------------------
#Подгрузка файла с модулями
define('DEBUG','0');
define('DATE_FORMAT','Y-m-d');

include_once 'autoinclude.php';

$loader = Loader::getInstance();
$loader->load_all_modules();

//TemplateManager::setActive(theme() == 'cardinal' ? new CardinalTheme() : new InkTheme());
TemplateManager::setActive(new CardinalTheme());

//$view = new viewCardinalPage("PAGE CONTENT");
//$view->show();

$r = Router::getInstance();
$content = $r->process($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
/*GetView(name_view);*/
$page_class = TemplateManager::GetView('Page');
$page = new $page_class($content);
echo $page->render();

var_dump($_SERVER['REQUEST_METHOD']);
var_dump($_SERVER['REQUEST_URI']);
test();

function test(){

    $f1 = new AuthorizationForm();
    $f1->renderForm();
    //echo $f2->render();
}