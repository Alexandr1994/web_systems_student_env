<?php

abstract Class Form{

    private $fields = array();//поля формы
    private $my_method = null;//метод формы
    private $my_action = null;//действие формы
    private $my_label = null;//заголовок формы

    public function method($new_method = null){//установить и веруть метод формы
        if(!is_null($new_method)){
            $this->my_method = $new_method;
        }
        return $this->my_method;
    }

    public function action($new_action = null){//установить и вернуть действие формы
        if(!is_null($new_action)){
            $this->my_action = $new_action;
        }
        return $this->my_action;
    }

    public function label($new_label = null){//установить и вернуть заголовок формы
        if(!is_null($new_label)){
            $this->my_label = $new_label;
        }
        return $this->my_label;
    }

    abstract protected function createForm();//построение текстового представления формы

    abstract protected function validateCustomForm();//проверка текущей формы

    abstract protected function submitForm();

    protected function validateForm(){//валидация формы
        //временная реализация
        return $this->validateCustomForm();
    }

    abstract public function renderForm();//отрисовка формы

    abstract public function process();//обработка формы

    protected function getDataFromForm(){//считывание данных из формы
        $data = $_POST;
        foreach($this->fields as $index => $field){//перебор POST по массиву полей формы
            $field[$index]->rowValue($data[$index]);
        }
    }


    protected function setFormFields($fields){//установка полей формы
        $this->fields = $fields;
    }

    public function getFormFields(){//вернуть поля формы
        return $this->fields;
    }
}