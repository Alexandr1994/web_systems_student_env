<?php


Class LoginField extends Field{//текстовое поле для ФИО


    function customValidate($testValue=null){
        return null;
    }

    public function render(){//вернуть строковое представление текстового поля
        $value = $this->value();
        $name = $this->name();
        $label = $this->label();
        $view = ThemeManager::GetView('TextField');
        $filed_render = new $view($label, $name, $value);
        $ret = $filed_render->render();
        return $ret;
        //$our_field = "$label<br><input type='text' name='$name' value='$value'>";//сформировать текстовое представление поля
        //return $our_field;
    }
}