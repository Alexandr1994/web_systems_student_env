<?php

abstract Class Form{

    private $errors = array();//ошибки формы
    protected $fields = array();//поля формы
    private $my_method = null;//метод формы
    private $my_action = null;//действие формы
    private $my_label = null;//заголовок формы

    function __construct(){
        $index_tester = "test";//задать скрытое поле
        $this->fields[$index_tester] = new HiddenField($index_tester, false, md5(get_called_class()));
        $this->createForm();//построить форму
    }

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

    public function getErrors(){//вернуть ошибки формы
        return $this->errors;
    }

    abstract protected function createForm();//построение текстового представления формы

    abstract protected function validateCustomForm();//проверка текущей формы

    abstract protected function customSubmitForm();

    private function submitForm(){//общая часть потдверждение формы
        $this->customSubmitForm();
    }

    protected function validateForm(){//валидация формы
        //общая валидация формы (по полям)
        foreach($this->fields as $value){
            $value->validate();//проверка каждого поля формы
            array_push($this->errors,$value->getErrors());//добавление в массив ошибок формы ошибки данного поля
        }
        array_merge($this->errors, $this->validateCustomForm());
    }

    protected function renderForm($errors = null){//отображение формы
        $view = TemplateManager::GetView('Form');//добавить шаблон поля пароля авторизации
        $filed_render = new $view($this);
        return $filed_render->render($errors);
    }

    public function process(){//действие при нажатии на submit
        $this->getDataFromForm();//считать данные с формы
        if($_POST["test"]!= md5(get_called_class())){
            echo $this->renderForm();
            return;
        }
        $this->validateForm();//проверить данные формы и вернуть ошибки возникшие ошибки
        if(!$this->errorTest()){
            echo $this->renderForm($this->errors);//если возникли проблемы вывести форму с сообщением об ошибках
            return;
        }
        $this->submitForm();
    }

    private function errorTest(){//проверка на колличество ошибок в каждом поле
        foreach($this->errors as $errors){
            if(count($errors) != 0){
                return false;//если хотя бы в одном поле зафиксированна ошибка вернуть false
            }
        }
        return true;//если все в порядке вернуть true
    }

    protected function getDataFromForm(){//считывание данных из формы
        $data = $_POST;
        foreach($this->fields as $index => $field){//перебор POST по массиву полей формы
            $field->rawValue($data[$index]);
        }
    }

    public function getFormFields(){//вернуть поля формы
        return $this->fields;
    }
}