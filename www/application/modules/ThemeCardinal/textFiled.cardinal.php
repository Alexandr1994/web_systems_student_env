<?php
class viewCardinalTextField {
       
    protected $label = null;
    protected $name = null;
    protected $value = null;
    
    public function __construct($label, $name, $value){
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
    }
    /*Переделать на шаблон вызывающий smarty*/
    
    public function render(){
    $data = "
        <label>$this->label<br>
            <input type='text' name='$this->name' value='$this->value'>
        </label>";
    $iniRender = new viewCardinalPage($data);
    return $iniRender;
    }
}