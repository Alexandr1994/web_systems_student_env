<?php
class viewCardinalButton extends BaseTemplate{

    /*
     * @param filed - object*/

    protected $field = null;

    public function __construct($field) {
        parent::__construct(__DIR__);
        $this->field = $field;
    }

    /*Переделать на шаблон вызывающий smarty*/

    public function render(){
        $this->smarty->assign('label',$this->field->label());
        $this->smarty->assign('name',$this->field->name());
        $this->smarty->assign('value',$this->field->value());
        $this->smarty->assign('formmethod',$this->field->formmethod());
        $this->smarty->assign('formaction',$this->field->formaction());
        $this->smarty->assign('required',$this->field->required());
        return $this->smarty->fetch('button.tpl');
    }
}