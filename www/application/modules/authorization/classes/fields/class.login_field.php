<?php
Class LoginField extends Field{//текстовое поле для ФИО


    function customValidate(){
        return null;
    }

    public function render(){//вернуть строковое представление текстового поля
        $view = TemplateManager::GetView('TextField');
        $filed_render = new $view($this);
        return $filed_render->render();
    }

}