<?php

Class AuthorizationForm extends Form{

    protected function createForm(){//построение формы
        $this->method("POST");//инициализация атрибутов формы
        $this->action("/login");
        $this->label("Авторизация");
        $fields = $this->getFormFields();//получить массив полей формы
        $index_login = "login";//инициализировать поля формы
        $fields[$index_login] = new LoginField("Ваш логин",$index_login,true);//инициализация класса поля логина
        $index_password = "password";
        $fields[$index_password] = new PasswordAuthField("Пароль",$index_password, true);//инициализация класса поля пароля
        $index_button = "submit";
        $fields[$index_button] = new ButtonField("Нажмите, чтобы авторизоваться",$index_button, true, "Войти");//инициализация класса поля кнопки
        return $fields;
    }


    protected function customSubmitForm(){//"провивка" логина и пароля по БД и redirect в случае совпадения

    }

    protected function validateCustomForm(){//проверка формы
        return array();
    }



}
//PROCESS публичный все остальное PROTECTED, PROCESS вызывает все остальные методы входе обработки action
/*выпилить поле value, метод value предназначен исключиельно для получения данных с использованием unify, unify ни имеет входных параметров, а работает с плолем rowValue,возвращая его преобразованное значение*/