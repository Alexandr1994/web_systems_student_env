<?php

Class ViewCarinalForm extends BaseTemplate{

    private $form = null;

    public function __construct($form){//принять пформу
        parent::__construct(__DIR__);
        $this->form = $form;
    }


    private function formFields(){//посторение строкового представления всех полей формы
        $fields = $this->form->getFormFields();
        $text = '';
        foreach($fields as $value){
            $text.= $value->render();
        }
        return $text;
    }

    public function render($errors = null){
        $this->smarty->assign('method',$this->form->method());
        $this->smarty->assign('action',$this->form->action());
        $this->smarty->assign('label', $this->form->label());
        $this->smarty->assign('fields', $this->formFields());
        $this->smarty->assign('errors', $this->form->getErrors());
        return $this->smarty->fetch("Form.tpl");
    }

}