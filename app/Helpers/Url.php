<?php
    class Url{
        //Metodo para redirecionamento 
        public static function redirecionar($url){
            header("Location:".URL.DIRECTORY_SEPARATOR.$url);
        }
    }