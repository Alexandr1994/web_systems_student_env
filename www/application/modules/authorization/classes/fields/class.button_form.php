<?php

Class ButtonField extends Field{//кнопка

    private $formmethod = null;//метод кнопки
    private $formaction = null;//действие кнопки

    function customValidate(){
        return null;
    }

    public function __construct($new_label,$new_name, $new_req_marker, $new_formmethod, $new_formaction,$new_value = null){//перегрузка конструктора для кнопки
        $this->label($new_label);//инициализация поля
        $this->name($new_name);
        $this->required($new_req_marker);
        $this->rawValue($new_value);
        $this->formaction($new_formaction);
        $this->formmethod($new_formmethod);
    }

    public function formmethod($new_value = null){//установить или вернуть метод кнопки
        if(!is_null($new_value)){
            $this->formmethod = $new_value;
        }
        return $this->formmethod;
    }

    public function formaction($new_value = null){//установить или вернуть действие кнопки
        if(!is_null($new_value)){
            $this->formaction = $new_value;
        }
        return $this->formaction;
    }

    public function render(){//вернуть текстовое представление формы
        $view = TemplateManager::GetView('ButtonField');//необходиио добавить новый шаблон для кнопки
        $filed_render = new $view($this);
        return $filed_render->render();
    }




}