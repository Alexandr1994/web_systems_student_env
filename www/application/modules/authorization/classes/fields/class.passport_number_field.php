<?php


Class PassportNumber extends PassportField{//текстовое поле для номера паспорта

    protected function passportInfoTest($testValue){//проверка папортной информации на количество символов
        if(iconv_strlen($testValue) == 6){
            return true;
        }
        else {
            return false;
        }
    }

}