<?php

/**
 * Created by PhpStorm.
 * User: Dmitriy
 * Date: 16.01.2015
 * Time: 21:51
 * Setter - устанавливает значения приватных полей класса.
 * Getter - получает значения приватных полей класса.
 * Добавить методы - взятие данных из вне, расфасовка по полям (массиву), закачка в бд.
 * Проверить/переписать текущие методы класса.
 * */
class BaseUserModel
{
    /* Инструментарий для работы с БД */

    private static $_connection = null;

    protected $id = null;
    protected $name = null;
    protected $surname = null;
    protected $patronymic = null;
    protected $birthday = null;
    protected $gender = null;
    protected $passport_series = null;
    protected $passport_number = null;
    protected $passport_department = null;
    protected $passport_address = null;
    protected $passport_get_date = null;
    protected $phone_contact = null;
    protected $login_phone = null;
    protected $password = null;
    protected $email = null;

    private $personalInfo = array(
        'login_phone' => 'setLogin',
        'password' => 'setPassword',
        'email' => 'setEmail',
        'name' => 'setName',
        'surname' => 'setSurname',
        'patronymic' => 'setPatronymic',
        'birthday' => 'setBirthday',
        'gender' => 'setGender',
        '$passport_series' => 'setPassportSeries',
        '$passport_number' => 'setPassportNumber',
        '$passport_department' => 'setPassportDepartment',
        '$passport_address' => 'setPassportAddress',
        '$passport_get_date' => 'setPassportGetDate',
        '$phone_contact' => 'setPhoneContact'
    );
    /**
     * Получение и установка свойств объекта через вызов
     * магического метода вида: $object->(get|set)PropertyName($property);
     *
     * @param $methodName - содержит имя метода.
     * @param $arguments - содержит свойтсво объекта.
     *
     * @see __call
     * @return mixed
     * */
    /*убрать метод call, поставить __set и __get*/
    /*    public function __call($methodName, $arguments)
    {
        $args = preg_split('/(?<=\w)(?=[A-Z])/', $methodName);
        $action = array_shift($args);
        $property_name = strtolower(implode('_', $args));

        switch ($action) {
            case 'get':
                return isset($this->$property_name) ? $this->$property_name : null;;
            case 'set':
                return $this->$property_name = $arguments[0];

        }
    }
*/
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function  __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    private function installConnection()
    {//установка соединения с базой данных(через уже существующий класс работы с базой данных)
        self::$_connection = Connection::getInstance();
        return self::$_connection->getConnection();
    }

    /* Установка свойств класса*/
    private function initData()
    {
        $connect = $this->installConnection();
        //Выбрать все, кроме id и status.
        $sql = "SELECT * FROM `subscriber` WHERE id = {'$this->id'}";
        $result = $connect->query($sql);
        foreach ($dataDB = $result->fetch_assoc() as $key => $value) {
            /*Изменить название столбцов в БД*/
            if (isset($this->personalInfo[$key])) {
                $filed = $this->personalInfo[$key];
                $this->$filed($value);
            }
        }
    }


    public function setUser($id)
    {

    }

    /*
    * Setter's block
    * */

    public function setId($id)
    {
        if (is_numeric($id)) {
            $this->id = $id;
            return $this;
        } else {
            throw new Exception('Wrong id');
        }
    }

    public function setName($name)
    {
        if (is_string($name)) {
            $name = trim($name);
            if ($name == '' or $name == 'null') {
                throw new Exception('Name is null');
            }
            $this->name = $name;
            return $this;
        } else {
            throw new Exception('Wrong Name');
        }
    }

    public function setSurname($surname)
    {
        if (is_string($surname)) {
            $surname = trim($surname);
            if ($surname == '' or $surname = 'null') {
                throw new Exception('Surname is null');
            }
            $this->surname = $surname;
            return $this;
        } else {
            throw new Exception('Wrong Surname');
        }
    }

    public function setPatronymic($patronymic)
    {
        if (is_string($patronymic)) {
            $patronymic = trim($patronymic);
            if ($patronymic == '' or $patronymic == 'null') {
                throw new Exception('Patronymic is null');
            }
            $this->patronymic = $patronymic;
            return $this;
        } else {
            throw new Exception('Wrong patronymic');
        }
    }

    public function setBirthday($birthday)
    {
        $pattern = '\d{2}[.|,|\-|\/]\d{2}[.|,|\-|\/]\d{4}';
        if (preg_match($pattern, $birthday)) {
            $this->birthday = $birthday;
            return $this;
        } else {
            throw new Exception('Wrong birthday');
        }

    }

    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    public function setPassportSeries($passport_series)
    {
        $pattern = '\d{4}';
        if (preg_match($pattern, $passport_series)) {
            $this->passport_series = $passport_series;
            return $this;
        } else {
            throw new Exception('Wrong Passport series');
        }
    }

    public function setPassportNumber($passport_number)
    {
        $pattern = '\d{6}';
        if (preg_match($pattern, $passport_number)) {
            $this->passport_number = $passport_number;
            return $this;
        } else {
            throw new Exception('Wrong Passport series');
        }
    }

    public function setPassportDepartment($passport_department)
    {
        if (is_string($passport_department) && is_null($passport_department)) {
            throw new Exception ('Passport department is null');
        }
    }

    public function setPassportAddress($passport_address)
    {
        $pattern = '\w+';
        if (preg_match($pattern, $passport_address)) {
            $this->passport_address = $passport_address;
            return $this;
        } else {
            throw new Exception('Wrong address');
        }
    }

    public function setPassportGetDate($passport_get_date)
    {
        $pattern = '/\d{2}[.|,|\-|\/]\d{2}[.|,|\-|\/]\d{4}/';
        if (preg_match($pattern, $passport_get_date)) {
            $this->passport_get_date = $passport_get_date;
            return $this;
        } else {
            throw new Exception('Wrong date get Passport');
        }
    }

    public function setPhoneContact($phone_contact)
    {
        $pattern = '/((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}/';
        /*
        +79261234567
        89261234567
        79261234567
        +7 926 123 45 67
        8(926)123-45-67
        123-45-67
        9261234567
        79261234567
        (495)1234567
        (495) 123 45 67
        89261234567
        8-926-123-45-67
        8 927 1234 234
        8 927 12 12 888
        8 927 12 555 12
        8 927 123 8 123*/
        if (preg_match($pattern, $phone_contact)) {
            $this->phone_contact = $phone_contact;
            return $this;
        } else {
            throw new Exception('Wrong contact phone number');
        }
    }

    public function setLogin($login_phone)
    {
        $pattern = '/\d{6}/';
        if (preg_match($pattern, $login_phone)) {
            $this->login_phone;
            return $this;
        } else {
            throw new Exception('Wrong login');
        }
    }

    public function setPassword($password)
    {
        $pattern = '/\w{20}/';
        if (preg_match($pattern, $password)) {
            $this->password = $password;
            return $this;
        } else {
            throw new Exception('Wrong password');
        }
    }

    public function setEmail($email)
    {
        $pattern = '/[^(\w)|(\@)|(\.)|(\-)]/';
        if (preg_match($pattern, $email)) {
            $this->email = $email;
            return $this;
        } else {
            throw new Exception('Wrong E-mail');
        }
    }

}