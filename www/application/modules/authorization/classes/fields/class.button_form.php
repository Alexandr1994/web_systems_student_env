<?php

Class ButtonField extends Field{

    function customValidate(){
        return null;
    }

    public function render(){//вернуть текстовое представление формы
        $view = TemplateManager::GetView('ButtonField');//необходиио добавить новый шаблон для кнопки
        $filed_render = new $view($this);
        return $filed_render->render();
    }




}