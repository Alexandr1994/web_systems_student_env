<?php

Class AuthorizationForm extends Form{

    private $fields = array();//поля авторизации

    function __construct(){
        $this->createForm();//построить форму
    }



    protected function createForm(){//построение формы
        $index_login = "login";
        $this->fields[$index_login] = new LoginField("Ваш логин",$index_login,true);//инициализация класса поля логина
        $index_password = "password";
        $this->fields[$index_password] = new PasswordAuthField("Пароль",$index_password, true);//инициализация класса поля пароля
    }


    protected function submitForm(){//"провивка" логина и пароля по БД и redirect в случае совпадения

    }

    protected function validateCustomForm(){//проверка формы
        $forms_errors = array();
        foreach($this->fields as $index => $value){
            $value->validate();//проверка каждого поля формы
            $errors = $value->getErrors();
            array_merge($forms_errors,$errors);//добавление в массив ошибок формы ошибки данного поля
        }
        return $forms_errors;//вернеть все ошибки днной формы
    }

    public function renderForm($errors = null){//отображение формы
        //добавить обработку ошибок, ждем шаблонизатор
        //цикл рендера каждого из полей формы на уровне шаблонизатора
        //добавить новую форму submit
    }

    public function process(){//действие при нажатии на submit
        print "process пошел!!";

        $this->getDataFromForm();//считать данные с формы
        $errors = $this->validateForm();//проверить данные формы и вернуть ошибки возникшие ошибки
        if(count($errors) != 0){
            $this->renderForm($errors);//если возникли проблемы вывести форму с сообщением об ошибках
        }

    }

    private function getDataFromForm(){//считывание данных из формы
        $data = $_POST;
        foreach($data as $index => $value){
            $this->fields[$index]->rowValue($value);
        }
    }

}
//PROCESS публичный все остальное PROTECTED, PROCESS вызывает все остальные методы входе обработки action
