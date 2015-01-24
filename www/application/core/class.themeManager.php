<?php

class ThemeManager{
    static protected $active = null;
    /*@param $theme - object*/
    static public function setActive($theme) {
        self::$active = $theme;
    }

    static public function GetView($view_name){
       return self::$active->getView($view_name);
    }    

}


// На укровне autoinclude & index !!
//Выставляем активную тему
//Все классы используют констр: $view = ThemeManager::GetView('TextField'); 
//ThemeManager::setActive(theme() == 'cardinal' ? new CardinalTheme() : new InkTheme());