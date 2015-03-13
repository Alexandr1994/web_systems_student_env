<?php

Class TextField extends Field{//текстовое поле для ФИО

    function customValidate(){
        $testValue = $this->value();//вернуть тестовое значение
        $error_module = new Errors();
        if(preg_match_all('/([^A-я]+)/',$testValue)){
            return $error_module->incorrectFillError();
        }
        $this->value($testValue);//записать проверенное занчение
        return null;
    }

    public function render(){//вернуть строковое представление текстового поля
        $view = TemplateManager::GetView('TextField');
        // TextField -> viewCardinalTextField | viewInkTextField
        $filed_render = new $view($this);
        return $filed_render->render();
    }
}

function theme() {
    return 'theme_name';
}

