<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy
 * Date: 16.11.2014
 * Time: 17:04
 */
$ar1=array('CabinetUserController','accountInfo');
// 'Название класса','Вызываемый метод'
$codes_param = array('account'=>'account','message'=>'message_box');

$r = Router::getInstance();
$r->any('/:account', $ar1, $codes_param);  //Личный кабинет пользователя