<?php
class viewCardinalPasswordAuthorField extends BaseTemplate{

    /*
     * @param filed - object*/

    protected $filed = null;

    public function __construct($field) {
        parent::__construct(__DIR__);
        $this->filed = $field;
    }

    /*Переделать на шаблон вызывающий smarty*/

    public function render(){
        $this->smarty->assign('label',$this->filed->label());
        $this->smarty->assign('name',$this->filed->name());
        $this->smarty->assign('value',$this->field->value());
        $this->smarty->assign('required',$this->filed->required());
        return $this->smarty->fetch('passwordAuthorField.tpl');
    }
}
