<?php
$ar1 = array('ProfileUserController', 'profileInfo');
$ar2 = array('TicketUserController', 'ticketInfo');
// 'Название класса','Вызываемый метод'
$codes_param = array('account' => 'account',
                     'ticket' => 'all_ticket',
                     );

$r = Router::getInstance();
$r->any('/:account', $ar1, $codes_param);  //Личный кабинет пользователя
/* Работа с тикетами */
$r->get('/:ticket', $ar2, $codes_param);