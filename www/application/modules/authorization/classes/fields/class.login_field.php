<?php
Class LoginField extends Field{//текстовое поле для ФИО


    function customValidate($testValue=null){
        return null;
    }

    public function render(){//вернуть строковое представление текстового поля
        $view = ThemeManager::GetView('TextField');
        /**
         * More: $filed_render = new $view($object);
         *  */
        $filed_render = new $view($this);
        $ret = $filed_render->render();
        return $ret;
        //$our_field = "$label<br><input type='text' name='$name' value='$value'>";//сформировать текстовое представление поля
        //return $our_field;
    }
}