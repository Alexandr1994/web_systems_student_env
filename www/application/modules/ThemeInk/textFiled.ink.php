<?php
class viewInkTextField{
       
    protected $label = null;
    protected $name = null;
    protected $value = null;
    
    public function __construct($label, $name, $value){
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
    }
    
    public function render(){
        
         $info = "
         <div class='control-group'>
            <label for='$this->name'>$this->label</label>
                <div class='control'>
                        <input id='name' name='$this->name' type='text' value='$this->value'>
                </div>
        </div>";
    return $info;
    }
}
/*

Defines the container for a label / form control pair. Used with a <div> element.*/
