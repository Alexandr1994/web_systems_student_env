<?php

class viewInkButton extends BaseTemplate
{
    protected $field = null;

    public function __construct($field)
    {
        parent::__construct(__DIR__);
        $this->field = $field;
    }

    public function render()
    {
        $this->smarty->assign('name', $this->field->name());
        $this->smarty->assign('formaction', $this->field->formaction());
        $this->smarty->assign('formmethod', $this->field->formmethod());
        $this->smarty->assign('type', $this->filed->type());
        $this->smarty->assign('value', $this->field->value());
        return $this->smarty->fetch('textField.tpl');
    }

}

