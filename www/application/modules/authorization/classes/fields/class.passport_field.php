<?php


Class PassportField extends Field{//текстовое поле для номера и серии паспорта

    function customValidate($testValue){
        $error_module = new Errors();
        if(preg_match_all('/([^\d])/',$testValue)){//проверка на содержание посторонних символов
            return $error_module->incorrectFillError();
        }
        if(!$this->passportInfoTest($testValue)){//проверка на количество символов
            return $error_module->incorrectFillError();
        }
        $this->value($testValue);//записать проверенное занчение
        return null;
    }

    abstract protected function passportInfoTest($testValue);//проверка папортной информации на количество символов

    public function render(){//вернуть строковое представление текстового поля
        $view = TemplateManager::GetView('TextField');
        $filed_render = new $view($this);
        return $filed_render->render();

    }

}