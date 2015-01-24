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
            $errors = $value->validate();//проверка каждого поля формы
            if(count($errors) == 0){
                continue;//если массив ошибок текущего поля пуст, то проверить следующее
            }
            foreach($errors as $inside_value){
                array_push($forms_errors,$inside_value);//формирование общего списка ошибок
            }
        }
        return $forms_errors;//вернеть все ошибки днной формы
    }

    public function renderForm($errors = null){//отображение формы
        //добавить обработку ошибок, ждем шаблонизатор
        $all_fields = "";
        foreach($this->fields as $currentField){
            $current_text = $currentField->render();
            $all_fields = "$all_fields<br>$current_text";//построение текстового предсталения
        }
        $submit_form = "<input type = submit value='Авторизоваться'>";
        $form_desk = "<form action='login' method='post'>$all_fields $submit_form</form>";//постороение текстового представления
        return $form_desk;
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
