<?php
Class HiddenField extends Field{//невидимое поле

    function customValidate(){
        return null;
    }

    public function render(){//вернуть строковое представление текстового поля
        $view = TemplateManager::GetView('HiddenField');
        $filed_render = new $view($this);
        return $filed_render->render();
    }

}