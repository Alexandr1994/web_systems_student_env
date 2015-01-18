<?php

Class NumberField extends aField{

    function customValidate(){
        $testValue = $this->value();//найти значение нужного поля
        $error_module = new Errors();
        if($this->required()) {
            if(is_null($testValue)){
                return $error_module->emptyError();
            }
        }
        if(preg_match_all('/([A-zА-я\'\-\|\\\/\{\}\[\]=.:;,+!@#$%^&*()<>"?])/',$testValue)){
            return $error_module->incorrectFillError();
        }
        return null;
    }

}
