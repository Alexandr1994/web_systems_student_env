<?php
class viewCardinalPasswordAuthorField extends BaseTemplate{

    /*
     * @param filed - object*/

    protected $field = null;

    public function __construct($field) {
        parent::__construct(__DIR__);
        $this->field = $field;
    }

    private function errorTest(){
        if(count($this->field->getErrors())== 0){
            return false;
        }
        return true;
    }

    public function render(){
        $this->smarty->assign('error',$this->errorTest());
        $this->smarty->assign('label',$this->field->label());
        $this->smarty->assign('name',$this->field->name());
        $this->smarty->assign('value', $this->field->value());
        $this->smarty->assign('required',$this->field->required());
        return $this->smarty->fetch('passwordAuthorField.tpl');
    }
}
