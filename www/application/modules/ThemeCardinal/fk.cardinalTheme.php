<?php

class CardinalTheme {
    private $views = array(
        'TextField' => 'viewCardinalTextField',
    );
    
    function GetView($view_name) {
        return isset($this->views[$view_name]) ? $this->views[$view_name] : null;
    }
}