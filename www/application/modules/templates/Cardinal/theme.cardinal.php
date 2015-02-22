<?php

class CardinalTheme {
    private $views = array(
        'TextField' => 'viewCardinalTextField',
        'ButtonField' => 'viewCardinalButton',
        'PasswordRegField' => 'viewCardinalPasswordRegField',
        'PasswordAuthorField' => 'viewCardinalPasswordAuthorField',
        'PasportField' => 'viewCardinalPasport',
        'HiddenField' => 'viewCardinalHiddenField',
        'Page' => 'viewCardinalPage',
        'Form' => 'ViewCarinalForm'
    );
    
    function GetView($view_name) {
        return isset($this->views[$view_name]) ? $this->views[$view_name] : null;
    }
}