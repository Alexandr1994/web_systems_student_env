<?php

abstract Class Form{

    private $fields = array();//поля формы

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