<?php
Class LoginField extends Field{//текстовое поле для ФИО


    function customValidate($testValue=null){
        return null;
    }

    public function render(){//вернуть строковое представление текстового поля
        $view = TemplateManager::GetView('TextField');
        /**
         * More: $filed_render = new $view($object);
         *  */
        $filed_render = new $view($this);
        $ret = $filed_render->render();
        return $ret;

    }
}