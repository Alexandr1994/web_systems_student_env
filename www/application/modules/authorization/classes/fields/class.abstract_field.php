<?php
abstract Class Field implements iField{

    private $label = null;//маркер обязательности
    private $name = null;//имя поля
    private $require = false;//маркер обязательности
    private $value = null;//значение поля
    private $row_value = null;//необработанные данные формы

    public function __construct($new_label,$new_name, $new_req_marker,$new_value = null){
        $this->label($new_label);//инициализация поля
        $this->name($new_name);
        $this->required($new_req_marker);
        $this->value($new_value);
    }

    public function label($new_value=null){//работа с надписью у поля
        if(!is_null($new_value)){
            $this->label = $new_value;//переписать label если пришел аргумент
        }
        return $this->label;//вернуть label
    }

    public function name($new_value=null){//работа с именем поля
        if(!is_null($new_value)){
            $this->name = $new_value;//переписать name если пришел аргумент
        }
        return $this->name;//вернуть name
    }

    public function required($new_value=null){//работа с маркером обязательности
        $new_value = (bool)$new_value;//приведение к bool
        if(!is_null($new_value)) {
            $this->require = $new_value;//переписать require если пришел аргумант
        }
        return $this->require;//вернуть require
    }

    public function value($new_value=null){//работа со значением поля
        if(!is_null($new_value)){
            $this->value = $new_value;//переписать value если пришел аргумент
        }
        return $this->value;//вернуть value
    }

    public function rowValue($new_value=null){//работа с необработанным значением поля
        if(!is_null($new_value)){
            $this->row_value = $new_value;//переписать row_value если пришел аргумент
        }
        return $this->row_value;//вернуть row_value
    }

    public function validate(){//проверка поля на правильность
        $errors = array();    //массив ошибок поля
        $testValue = $this->rowValue();//вернуть проверяемые значения
        if($this->require){
            if(is_null($this->rowValue())){//если обязательное поле пустое, то впихнуть соответствубщую ошибку в массив ошибок
                $error_collection = new Errors();
                array_push($errors, $error_collection->emptyError());
                return $errors;//вернуть ошибки
            }
        }
        return $errors = $this->customValidate($testValue);//вернуть все ошибки
    }

    abstract function customValidate($testValue);//проверка конкретного типа поелй на правильность

}
//МЕТОД ROW_VALUE для хранения необработанных данных из формы