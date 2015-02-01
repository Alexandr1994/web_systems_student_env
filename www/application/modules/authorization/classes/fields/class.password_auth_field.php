<?php

Class PasswordAuthField extends Field{

    function customValidate($testValue=null){
        return null;
    }

    public function render(){//вернуть строковое представление текстового поля
        $view = TemplateManager::GetView('TextField');//добавить шаблон поля пароля авторизации
        $filed_render = new $view($this);
        return $filed_render->render();
    }

}