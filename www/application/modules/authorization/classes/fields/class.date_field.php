<?php

Class DateField extends aField{


    public function render(){//вернуть текстовое представление формы
        $label = $this->label();
        $name = $this->name();
        $value = $this->value();
        $our_form = "$label<br><input type = 'date' name='$name' value='$value'>";//состовление текстового представление сторки
        return $our_form;//вернуть представление стоки
    }

    function customValidate(){
        $max_date = date(DATE_FORMAT);//верхняя граница даты(текущая дата)
        $min_date = date(DATE_FORMAT,strtotime("-100 years"));//нижняя граница даты

        $testValue = $this->value();//найти значение нужного поля
        $error_module = new Errors();//инициализировать коллекцию ошибок
        if($this->required()) {
            if(is_null($testValue)){//если поле обязательно для заполнениея, проверить его на пустоту
                return $error_module->emptyError();
            }
        }//дополнительная проверка
        if($testValue>$max_date || $testValue<$min_date){//проверка на вхождение времени в указанный инетрвал
            return $error_module->incorrectFillError();
        }
        return null;
    }




}