<?php
//Extende a classe Controlador base
    class Paginas extends Controller{
       
        //Metodo que carrega a pagina home 
        public function index(){
            //Caso o usuario esteja logado, ele e redirecionado para a pagina de posts
            if(Sessao::estaLogado()){
                Url::redirecionar('posts');
            }  

            $dados = [
                'titulo'=>'Pagina Inicial',
                'descricao'=>'curso php 7'
            ];
            $this->view('paginas/home',$dados);
        }

        //Metodo que carrega a pagina sobre
        public function sobre(){
            $dados = [
                'tituloPagina'=>'Sobre nos'
            ];
            $this->view('paginas/sobre',$dados);
        }

         //Metodo que carrega a pagina sobre
         public function error(){
            $dados = [
                'tituloPagina'=>'Erro página não encontrada'
            ];
            $this->view('paginas/error',$dados);
        }
    }