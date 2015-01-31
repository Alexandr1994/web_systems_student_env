<?php
class InkTheme {
    private $views = array(
        'TextField' => 'viewInkTextField',
        'Page' => 'viewInkPage',
    );
    
    function GetView($view_name) {
        return isset($this->views[$view_name]) ? $this->views[$view_name] : null;
    }
}