<?php
abstract Class Field implements iField{

    private $label = null;//маркер обязательности
    private $name = null;//имя поля
    private $require = false;//маркер обязательности
    private $raw_value = null;//необработанные данные формы
    private $errors = array();//ошибки данного поля

    public function __construct($new_label,$new_name, $new_req_marker,$new_value = null){
        $this->label($new_label);//инициализация поля
        $this->name($new_name);
        $this->required($new_req_marker);
        $this->rawValue($new_value);
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

    protected function unify(){//преобразование значения rawValue в требуемый формат
        return trim($this->raw_value);
    }

    public function value(){//работа со значением поля
        return $this->unify();//вернуть value
    }

    public function rawValue($new_value=null){//работа с необработанным значением поля
        $this->raw_value = $new_value;//переписать raw_value
    }

    public function validate(){//проверка поля на правильность(формирование массива ошибок)
        if($this->require){
            if(is_null($this->raw_value) || $this->raw_value == ''){//если обязательное поле пустое, то впихнуть соответствубщую ошибку в массив ошибок
                $error_collection = new Errors();
                array_push($this->errors, $error_collection->emptyError());
                return;
            }
        }
        $this->errors = $this->customValidate();//вернуть все ошибки
    }

    public function getErrors(){//вернуть все ошибки данного поля
        return $this->errors;
    }

    abstract function customValidate();//проверка конкретного типа поелй на правильность

}
//МЕТОД RAW_VALUE для хранения необработанных данных из формы