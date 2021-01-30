<?php
//Classe base do controlador que faz o meio campo entre o Banco de dados e a View do usuario
class Controller{
    public function model($model){
        require_once '../app/Models/'.$model.'.php';
        return new $model;
    }

    public function view($view,$dados = []){
        $arquivo = ('../app/Views/'.$view.'.php');
        if(file_exists($arquivo)){
            require_once $arquivo;
        }else{
            die('O arquivo de View nao existe');
        }
    }
}