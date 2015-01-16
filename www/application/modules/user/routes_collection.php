<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy
 * Date: 16.11.2014
 * Time: 17:04
 */
$ar1=array('UserController','accountInfo');
// 'Название класса','Вызываемый метод'
//$ar2=array('User','id');
//$ar3=array('User','home');
//$ar4=array('User','home');
$codes_param = array('account'=>'account','message'=>'message_box');

$r = Router::getInstance();

$r->any('/:account', $ar1, $codes_param);  //Личный кабинет пользователя
//$r->get('/user/:id/:cool', $ar2, $codes_param);
/*
$r->get('/:end', $ar2, $ar5);
$r->any('/:call', $ar6, $ar5);*/
