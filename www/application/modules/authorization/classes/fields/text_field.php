<?php

Class TextField extends aField{

    function customValidate(){
        $testValue = $this->value();//найти значение нужного поля
        if($this->required()) {
            if(is_null($testValue)){
                return "1";
            }
        }
        return null;
    }



}

