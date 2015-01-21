<?php

Class DateField extends Field{

    private $max_date = null;//верхняя граница даты(текущая дата)
    private$min_date = null;//нижняя граница даты

    public function __construct($new_label,$new_name, $new_req_marker, $new_min_date, $new_max_date,$new_value = null){
        $this->label($new_label);//инициализация поля
        $this->name($new_name);
        $this->required($new_req_marker);
        $this->value($new_value);
        $this->min_date = $new_min_date;//инициализация временных границ
        $this->max_date = $new_max_date;
    }

    public function render(){//вернуть текстовое представление формы
        $label = $this->label();
        $name = $this->name();
        $value = $this->value();
        $our_form = "$label<br><input type = 'date' name='$name' value='$value'>";//состовление текстового представление сторки
        return $our_form;//вернуть представление стоки
    }

    function customValidate(){
        //добавить проверку на соответствие формату
        $testValue = $this->value();//найти значение нужного поля
        $error_module = new Errors();//инициализировать коллекцию ошибок
         if($testValue>$this->max_date || $testValue<$this->min_date){//проверка на вхождение времени в указанный инетрвал
            return $error_module->incorrectFillError();
        }
        return null;
    }




}