<?php

Class StaffData{//хранилище сведений о персонаже
//персонаж - оператор одного из отделов
    private $personalData = array(); //пероснальные данные персонажа
    private $personalTikcets = array(); //тикеты персонажа
    private $personalMesseges = array(); //тикеты персонажа

    public function __construct(){

    }
//набор gette-ов
    public function getPersonalID(){//вернуть ID персонажа
        if(array_key_exists('id',$this->personalData)){
            return $this->personalData['id'];
        }
        else{
            return null;
        }
    }

    public function getPersonalName(){//вернуть  имя персонажа
        if(array_key_exists('name',$this->personalData)){
            return $this->personalData['name'];
        }
        else{
            return null;
        }
    }
    public function getPersonalSurname(){//вернуть фамилию персонажа
        if(array_key_exists('surname',$this->personalData)){
            return $this->personalData['surname'];
        }
        else{
            return null;
        }
    }

    public function getPersonalPatronymic(){//вернуть отчество персонажа
        if(array_key_exists('patronymic',$this->personalData)){
            return $this->personalData['patronymic'];
        }
        else{
            return null;
        }
    }

    public function getPersonalBrithdate(){//вернуть дата рождения персонажа
        if(array_key_exists('brithdate',$this->personalData)){
            return $this->personalData['brithdate'];
        }
        else{
            return null;
        }
    }

    public function getPersonalGender(){//вернуть дата рождения персонажа
        if(array_key_exists('gender',$this->personalData)){
            return $this->personalData['gender'];
        }
        else{
            return null;
        }
    }

    public function getPersonalLogin(){//вернуть логин персонажа
        if(array_key_exists('login',$this->personalData)){
            return $this->personalData['login'];
        }
        else{
            return null;
        }
    }
    public function getPersonalPassword(){//вернуть пароль персонажа
        if(array_key_exists('password',$this->personalData)){
            return $this->personalData['password'];
        }
        else{
            return null;
        }
    }

    public function getPersonalDepartment(){//вернуть рабочий отдел персонажа
        if(array_key_exists('department',$this->personalData)){
            return $this->personalData['department'];
        }
        else{
            return null;
        }
    }

    public function getPersonalPosition(){//вернуть должность персонажа
        if(array_key_exists('position',$this->personalData)){
            return $this->personalData['position'];
        }
        else{
            return null;
        }
    }

    public function getPersonalScore(){//вернуть должность персонажа
        if(array_key_exists('score',$this->personalData)){
            return $this->personalData['score'];
        }
        else{
            return null;
        }
    }

    public function  getAllPersonalTiketsID(){//получить ВСЕ id
        if(array_key_exists('ids',$this->personalTikcets) && array_key_exists('topics',$this->personalTikcets)){
            return array($this->personalTikcets['ids'],$this->personalTikcets['topics']);
        }
        else{
            return null;
        }
    }

    public function getPersonalMessege(){//вернуть все меседжы данного тикета персонажа
        return $this->personalMesseges;
    }
//набор setter-ов

    public function setAllData($result){//заполнение всего хранилища
        $result = mysqli_fetch_array($result);
        foreach($result as $index => $value){
            if(preg_match('/[A-Za-z]+/',$index)){
                $this->personalData[$index] = $value;
            }
        }
    }

    public function setScoreData($result){//заполнение элемента хранилища, содержащего оценки перонажа
        $result = mysqli_fetch_array($result);
        foreach($result as $index => $value){
            if(preg_match('/(?<=rating_)[a-z]+/',$index, $newIndex)){
                $this->personalData['score'][$newIndex[0]] = $value;
            }
        }
    }

    public function setTicketsID($result){//получить все тикеты персонажа
        $index = 0;
        while($temp = mysqli_fetch_array($result)) {
            $this->personalTikcets['ids'][$index] = $temp[0];
            $this->personalTikcets['topics'][$index] = $temp[1];
            $index ++;
        }
    }

    public function setPersonalMessage($result){//получить все сообщения тикета в текущем интервале
        $index = 0;
        while($temp = mysqli_fetch_array($result)) {
            foreach($temp as $local_index=>$value){
                if(preg_match('/[a-zA-Z]+/',$local_index)) {
                    $this->personalMesseges[$index][$local_index] = $value;
                }
            }
            $index ++;
        }

    }

 }

