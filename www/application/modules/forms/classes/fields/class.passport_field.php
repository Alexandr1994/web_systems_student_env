<?php


Class PassportField extends Field
{//текстовое поле для номера и серии паспорта

    function customValidate()
    {
        $testValue = $this->value();
        $error_module = new Errors();
        if (preg_match_all('/([^\d])/', $testValue)) {//проверка на содержание посторонних символов
            return $error_module->incorrectFillError();
        }
        if (!$this->passportInfoTest($testValue)) {//проверка на количество символов
            return $error_module->incorrectFillError();
        }
        $this->value($testValue);//записать проверенное занчение
        return null;
    }

    function passportInfoTest($testValue){//проверка папортной информации на количество символов
        if(iconv_strlen($testValue["seral"]) == 4 && iconv_strlen($testValue["number"]) == 6){
            return true;//если в серии паспорта 4 символа, а в номере 6 то вернуть true
        }
        else{
            return false;//иначе false
        }
    }

    public function render(){//вернуть строковое представление текстового поля
        $view = TemplateManager::GetView('PasportField');//добавить паспортную форму
        $filed_render = new $view($this);
        return $filed_render->render();
    }

}