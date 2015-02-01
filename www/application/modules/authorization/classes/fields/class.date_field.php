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

    public function unify($value){//перегрузка преобразования даты
        $value = new DateTime($value);
        $value=$value->format(DATE_FORMAT);//преобразование даты
        if(!$value){//в случе невозможности преобразования
            $error_module = new Errors();//выдать соответствующую лшибку
            array_merge($this->getErrors(), $error_module->unifyError());
        }
        else{
            $this->value($value);//записать в value преобразованное значение
        }
    }

    public function render(){//вернуть текстовое представление формы
        $view = TemplateManager::GetView('TextField');//необходиио добавить новый шаблон для даты
        $filed_render = new $view($this);
        return $filed_render->render();
    }

    function customValidate($testValue){
        $error_module = new Errors();//инициализировать коллекцию ошибок
        if(!$testValue){//проверка на возможность переформатирования даты
            return $error_module->incorrectFillError();//временная реализация
        }
        if($testValue>$this->max_date || $testValue<$this->min_date){//проверка на вхождение времени в указанный инетрвал
            return $error_module->incorrectFillError();
        }
        $this->value($testValue);//записать проверенное занчение
        return null;
    }




}