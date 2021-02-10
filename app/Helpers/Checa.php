<?php

 class Checa{
    public static function checarNome($nome){
        if(!preg_match('/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u', $nome)){
            return true;
        }else{
            return false;
        }
    }


    public static function checarEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }

    public static function dataBr($data){
        if(isset($data)){
            return date('d-m-Y H:i', strtotime($data));
        }else{
            return false;
        }
    }

 }