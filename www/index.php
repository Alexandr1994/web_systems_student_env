<?php
// ------ index.php-------------------------
#Подгрузка файла с модулями
define('DEBUG','0');
define('DATE_FORMAT','Y-m-d');

include_once 'autoinclude.php';

$loader = Loader::getInstance();
$loader->load_all_modules();

//ThemeManager::setActive(theme() == 'cardinal' ? new CardinalTheme() : new InkTheme());
ThemeManager::setActive(new InkTheme());

$r = Router::getInstance();
$content = $r->process($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
/*GetView(name_view);*/
$page_class = ThemeManager::GetView('Page');
$page = new $page_class($content);
echo $page->render();
//-----------------------------------------------------------------------
