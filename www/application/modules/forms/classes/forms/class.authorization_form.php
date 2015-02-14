<?php

Class AuthorizationForm extends Form{


    function __construct(){
        $this->createForm();//построить форму
    }

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
        $index_tester = "tester";
        $fields[$index_tester] = new HiddenField($index_tester, false, md5(get_called_class()));
        $this->setFormFields($fields);
    }


    protected function submitForm(){//"провивка" логина и пароля по БД и redirect в случае совпадения

    }

    protected function validateCustomForm(){//проверка формы
        $forms_errors = array();
        $fields = $this->getFormFields();//получить поля формы временная реализация
        foreach($fields as $index => $value){
            $value->validate();//проверка каждого поля формы
            $errors = $value->getErrors();
            array_merge($forms_errors,$errors);//добавление в массив ошибок формы ошибки данного поля
        }
        return $forms_errors;//вернеть все ошибки днной формы
    }

    public function renderForm($errors = null){//отображение формы ВРЕМЕННАЯ РЕАЛИЗАЦИЯ
        //добавить обработку ошибок, ждем шаблонизатор
        //цикл рендера каждого из полей формы на уровне шаблонизатора
        //добавить новую форму submit
        $view = TemplateManager::GetView('Form');//добавить шаблон поля пароля авторизации
        $filed_render = new $view($this);
        echo $filed_render->render();
    }

    public function process(){//действие при нажатии на submit
        $this->getDataFromForm();//считать данные с формы
        $errors = $this->validateForm();//проверить данные формы и вернуть ошибки возникшие ошибки
        if(count($errors) != 0){
            $this->renderForm($errors);//если возникли проблемы вывести форму с сообщением об ошибках
        }

    }

}
//PROCESS публичный все остальное PROTECTED, PROCESS вызывает все остальные методы входе обработки action
/*выпилить поле value, метод value предназначен исключиельно для получения данных с использованием unify, unify ни имеет входных параметров, а работает с плолем rowValue,возвращая его преобразованное значение*/