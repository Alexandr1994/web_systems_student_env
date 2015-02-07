<?php

class CardinalTheme {
    private $views = array(
        'TextField' => 'viewCardinalTextField',
        'ButtonField' => 'viewCardinalButton',
        'PasswordRegField' => 'viewCardinalPasswordRegField',
        'PasswordAuthorField' => 'viewCardinalPasswordAuthorField',
        'Page'=> 'viewCardinalPage',
    );
    
    function GetView($view_name) {
        return isset($this->views[$view_name]) ? $this->views[$view_name] : null;
    }
}