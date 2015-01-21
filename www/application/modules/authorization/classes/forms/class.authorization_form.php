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


    protected function submitForm(){//действие при нажатии submit
        $data = $_POST;
        foreach($data as $index => $value){
            $this->fields[$index]->value($value);
        }
    }

    protected function validateCustomForm(){//проверка формы
        $forms_errors = array();
        foreach($this->fields as $index => $value){
            $value->validate();//проверка каждого поля формы
            $errors = $value->getErrors();//вычленение ошибок форм
            foreach($errors as $inside_value){
                array_push($forms_errors,$inside_value);//формирование общего списка ошибок
            }
        }
        return $forms_errors;//вернеть все ошибки днной формы
    }

    public function renderForm(){//отображение формы
        $all_fields = "";
        foreach($this->fields as $currentField){
            $current_text = $currentField->render();
            $all_fields = "$all_fields<br>$current_text";//построение текстового предсталения
        }
        $submit_form = "<input type = submit value='Авторизоваться'>";
        $form_desk = "<form action='login' method='post'>$all_fields $submit_form</form>";//постороение текстового представления
        print $form_desk;
    }

    public function process(){

    }

}
//PROCESS публичный все остальное PROTECTED, PROCESS вызывает все остальные методы входе обработки action
