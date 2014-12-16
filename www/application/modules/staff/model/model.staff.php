<?php

//персонаж - оператор одного из отделов
Class StaffModel{//инструменты для работы с БД

    private static $connection_container = null;

    private $login = null;//логин персонажа
    private $password = null;//пароль персонажа
    private $id = null;//id персонажа

    private $dataStorage = null;

    /*Если static, то обращение self::*/
    private function installConnection(){//установка соединения с базой данных(через уже существующий класс работы с базой данных)
        self::$connection_container = Connection::getInstance();
        return self::$connection_container->getConnection();
    }

    public function __construct(){//инициализация класса работы с персоналом

    }

    public function verifyLoginAndPassword($login,$password){//проверка пароля и логина на валидность
        $this->login = $login;
        $this->password = $password;
        $result = $this->getStaffRecord();//получить все данные о персонаже
        if(!is_null($result)){//логин и пароль корректны
            $this->dataStorage->setAllData($result);//запомнить все все персональные данные
        }
        else{//некорректные логин или пароль
            return null;
        }
    }

    private function getStaffRecord(){//считать данные из БД по логину и паролю
        $current_connection = $this->installConnection();
        $query = "SELECT * FROM staff  WHERE login = '$this->login' AND password = '$this->password'";//запросЪ
        $result =  $current_connection->query($query);//выполнение запроса
        return $result;
    }

    public function getDataStorage(){//вернуть храниище данных
        $this->dataStorage= new StaffData();//построить хранилище
        return $this->dataStorage;
    }

    public function getAllPersonalScore($id){//возвращение данных об оценках деятельности персонажа
        $personalScores = $this->getStaffScore($id);
        $this->dataStorage->setScoreData($personalScores);
    }

    private function getStaffScore($id){//получение средних оценок персонажа
        var_dump($id);
        $current_connection = $this->installConnection();
        $query="SELECT
	(AVG(r.operator_rating_speed)+AVG(t.rating_speed))/2,
	(AVG(r.operator_rating_efficiency)+AVG(t.rating_efficiency))/2,
	(AVG(r.operator_rating_service)+AVG(t.ratig_quality))/2
FROM
	request_card r
INNER JOIN ticket t
	ON r.operator_id = t.operator_id
WHERE
	r.operator_id = $id";
        $result =  $current_connection->query($query);//выполнение запроса
        return $result;
    }

    public function getAllPersonalTikcets($id){//возвращение данных об оценках деятельности персонажа
        $personalTikcets = $this->getPersonalTikets($id);
        $this->dataStorage->setTicketsID($personalTikcets);
    }

    private function getPersonalTikets($id){//получение всхе тикетов персонажа
        var_dump($id);
        $current_connection = $this->installConnection();
        $query = "SELECT
	t.id,
	t.topic
FROM ticket t
WHERE
	t.status = 'OPEN'  AND
	(t.operator_id = $id OR t.operator_id = null)";
        $result = $current_connection->query($query);
        return $result;
    }

    public function getPersonalMessegesBetween($id, $beginDate, $EndDate){////получение сообщений перснажа
        $personalMessage = $this->getPersonalMesseges($id, $beginDate, $EndDate);
        $this->dataStorage->setPersonalMessage($personalMessage);
    }

    private function getPersonalMesseges($id, $beginDate, $EndDate){//получение сообщений перснажа
        var_dump($id);
        $current_connection = $this->installConnection();
        $query = "SELECT
	m.id,
	m.text,
	m.date,
	s.name,
	s.surname,
	s.patronymic
FROM
	message m
INNER JOIN ticket t
	ON t.id=m.ticket_id
INNER JOIN staff s
	ON t.operator_id = s.id
WHERE
	m.ticket_id = $id AND
	m.direct = 'OPERAT' AND
 	m.date BETWEEN '$beginDate' AND '$EndDate'";
        $result = $current_connection->query($query);
        var_dump($result);
        return $result;
    }
}

