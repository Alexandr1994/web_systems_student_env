<?php

Class PasswordRegField extends Field{


      function customValidate($testValue){
        $error_module = new Errors();//инициализировать коллекцию ошибок
        if($testValue) {
            if ($testValue[0] != $testValue[1]) {//проверка на совпадение пароля и его повтора
                return $error_module->incorrectFillError();
            }
            $this->value($testValue[0]);//если ошибок не произошло то записать одно из значений полей в окончательное значение
        }
        return null;
    }

    public function render(){//вернуть строковое представление текстового поля
        $view = TemplateManager::GetView('TextField');//добавить шаблон поля пароля регистрации
        $filed_render = new $view($this);
        return $filed_render->render();
    }

}