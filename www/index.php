<?php
// ------ index.php-------------------------
#Подгрузка файла с модулями
define('DEBUG','0');
define('DATE_FORMAT','Y-m-d');

include_once 'autoinclude.php';

$loader = Loader::getInstance();
$loader->load_all_modules();

//ThemeManager::setActive(theme() == 'cardinal' ? new CardinalTheme() : new InkTheme());
ThemeManager::setActive(new CardinalTheme());

$r = Router::getInstance();
$content = $r->process($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

$smarty = CreateSmarty::getInstance();
$smFolder = 'index';
$go = $smarty->iniSmarty($smFolder);
$go->assign('title','Welcome');
$go->assign('header','I\'m HEAD');

$go->assign('content', $content);

$go->assign('footer','I\'m FOOTER');

$go->display('index.tpl');
