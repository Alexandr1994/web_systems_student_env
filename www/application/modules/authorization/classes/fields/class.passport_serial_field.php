<?php


Class PassportSerial extends PassportField{//текстовое поле для номера и серии паспорта

     protected function passportInfoTest($testValue){//проверка папортной информации на количество символов
         if(iconv_strlen($testValue) == 4){
             return true;
         }
         else {
             return false;
         }
     }

}