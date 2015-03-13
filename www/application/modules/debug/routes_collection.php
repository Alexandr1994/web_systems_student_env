<?php
/**
 * Created by PhpStorm.
 * User: Dmitriy
 * Date: 16.01.2015
 * Time: 17:15
 */

$ar1=array('DebugController','showDebugMode');
// 'Название класса','Вызываемый метод'

$codes_param = array('debug'=>'debug');

$r = Router::getInstance();

$r->get('/:debug', $ar1, $codes_param);
//$r->get('/user/:id/:cool', $ar2, $codes_param);
/*
$r->get('/:end', $ar2, $ar5);
$r->any('/:call', $ar6, $ar5);*/
