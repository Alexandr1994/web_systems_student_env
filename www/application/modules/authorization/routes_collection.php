<?php

    $ar1 = array('AuthorizationForm','renderForm');
    $ar2 = array('AuthorizationForm','process');

    $pattern_params_collection = array("author"=>"login");

    $router = Router::getInstance();

    $router->any("/:author", $ar1, $pattern_params_collection);//авторизация(вывод формы)
