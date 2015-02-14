<?php

Class PasswordRegField extends Field{

      function customValidate(){
        $testValue = $this->value();//вернуть тестовое значение
        $error_module = new Errors();//инициализировать коллекцию ошибок
        if($testValue) {
            if ($testValue['main'] != $testValue['repeat']) {//проверка на совпадение пароля и его повтора
                return $error_module->incorrectFillError();
            }
        }
        return null;
    }

    public function render(){//вернуть строковое представление текстового поля
        $view = TemplateManager::GetView('PasswordRegField');//добавить шаблон поля пароля регистрации
        $filed_render = new $view($this);
        return $filed_render->render();
    }

}