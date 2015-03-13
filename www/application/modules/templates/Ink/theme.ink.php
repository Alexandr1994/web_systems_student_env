<?php
class InkTheme {
    private $views = array(
        'TextField' => 'viewInkTextField',
        'Button' => 'viewInkButton',
        'Page' => 'viewInkPage',
    );
    
    function GetView($view_name) {
        return isset($this->views[$view_name]) ? $this->views[$view_name] : null;
    }
}