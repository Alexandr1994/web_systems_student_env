<?php

Class AuthorizationForm extends Form{

    protected function createForm(){//построение формы
        $this->method("POST");//инициализация атрибутов формы
        $this->action("/login");
        $this->label("Авторизация");
        $index_login = "login";//инициализировать поля формы
        $this->fields[$index_login] = new LoginField("Ваш логин",$index_login,true);//инициализация класса поля логина
        $index_password = "password";
        $this->fields[$index_password] = new PasswordAuthField("Пароль",$index_password, true);//инициализация класса поля пароля
        $index_button = "submit";
        $this->fields[$index_button] = new ButtonField("Нажмите, чтобы авторизоваться",$index_button, false, "Войти");//инициализация класса поля кнопки
    }


    protected function customSubmitForm(){//"провивка" логина и пароля по БД и redirect в случае совпадения
        print("Это победа!");
    }

    protected function validateCustomForm(){//проверка формы
        return array();
    }



}
//PROCESS публичный все остальное PROTECTED, PROCESS вызывает все остальные методы входе обработки action
/*выпилить поле value, метод value предназначен исключиельно для получения данных с использованием unify, unify ни имеет входных параметров, а работает с плолем rowValue,возвращая его преобразованное значение*/