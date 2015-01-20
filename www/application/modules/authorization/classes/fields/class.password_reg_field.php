<?php

Class PasswordRegField extends aField{

    private $rep_value=null;//Значение поля повтора
    private $rep_name=null;//Назване поля повтора

    public function repeatValue($new_par=null){//работа со значением поля повтора
        if(is_null($new_par)) {
            return $this->rep_value;
        }
        else{
            $this->rep_value = $new_par;
        }
        return null;
    }

    public function repeatName($new_par=null){//работа с назваением поля повтора
        if(is_null($new_par)) {
            return $this->$rep_name;
        }
        else{
            $this->$rep_name = $new_par;
        }
        return null;
    }

    function customValidate(){
        $testValue = $this->value();//найти значение нужного поля
        $error_module = new Errors();//инициализировать коллекцию ошибок
        if($this->required()) {
            if(is_null($testValue)){//если поле обязательно для заполнениея, проверить его на пустоту
                return $error_module->emptyError();
            }
        }//дополнительная проверка
        if(!preg_match_all("/$this->rep_value/",$testValue)){//проверка на совпадение пароля и его повтора
            return $error_module->incorrectFillError();
        }
        return null;
    }

    public function render(){//вернуть строковое представление текстового поля
        $value = $this->value();
        $name = $this->name();
        $label = $this->label();
        $our_field = "$label<br><input type='password' name='$name' value='$value'>
Повторите $label<br><input type='password' name='$this->rep_name' value='$this->rep_value'>";//сформировать текстовое представление полей
        return $our_field;
    }

}