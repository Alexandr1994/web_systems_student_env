<?php

Class SQLExecutor{//класс-исполнитель SQL-запросов (SQL-палач)

    private $connection = null;//солединение с БД

    public function __construct(){
        $this->connection = $this->installConnection();
    }

    private function installConnection(){//установка соединения с базой данных(через уже существующий класс работы с базой данных)
        $connection_container = Connection::getInstance();
        return $connection_container->getConnection();
    }

    public function executeSQL($query){//выполнить запрос и вернуть результат
        return $this->parseResult($this->connection->query($query));
    }

    private function parseResult($result){//распарсить орезультат выполнения запроса
        if (is_bool($result)) {//если аргумент типа bool, то парсинг не требуется
            return $result;
        }else {
            $data = array();//воззвращаемые данные
            $index = 0;
            while ($temp = mysqli_fetch_array($result)) {//построение ассоциатиыного массива возвращаемых данных
                foreach ($temp as $loc_index => $value) {
                    if(preg_match('/[a-zA-Z]+/',$loc_index)) {
                        $data[$index][$loc_index] = $value;
                    }
                }
                $index++;
            }
            return $data;//вернуть считаные из БД данные
        }
    }

}