<?php

Class AuthorizationForm extends Form{

    //private $form_desk = null;//текстовое представление формы

    private $fields = array();//поля авторизации

    public function createForm(){//построение формы и её текстового представления
        //логин
        $index_login = "login";
        $this->fields[$index_login] = new LoginField();//инициализация класса поля
        $this->fields[$index_login]->name($index_login);//инициализация поля логина
        $this->fields[$index_login]->label("Ваш логин:");
        $this->fields[$index_login]->required(true);
        $login_desk = $this->fields[$index_login]->render();//построение текстового предсталения
        //пароль
        $index_password = "password";
        $this->fields[$index_password] = new PasswordAuthField();//инициализация класса поля
        $this->fields[$index_password]->name($index_password);//инициализация поля пароля
        $this->fields[$index_password]->label("Пароль:");
        $this->fields[$index_password]->required(true);
        $password_desk = $this->fields[$index_password]->render();//построение текстового предсталения
        $submit_form = "<input type = submit value='Авторизоваться'>";
        //форма
        $form_desk = "<form action='login' method='post'>$login_desk<br>$password_desk<br>$submit_form</form>";//постороение текстового представления
        return $form_desk;
    }


    public function submitForm(){//действие при нажатии submit
        $data = $_POST;
        $this->createForm();
        foreach($data as $index => $value){
            $this->fields[$index]->value($value);
        }
        $this->validateForm();//проверка формы
    }

    function validateCustomForm(){//проверка формы
        $forms_errors = array();
        foreach($this->fields as $index => $value){
            $value->validate();
            $errors = $value->getErrors();
        }

    }
}