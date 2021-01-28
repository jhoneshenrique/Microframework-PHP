<?php
    //Classe responsável por controlar as rotas
    class Rota{
        private $controlador = 'Paginas';
        private $metodo = 'index';
        private $parametro = [];


        //Construtor que carrega o metodo com a url
        public function __construct()
        {
            //Coloca a url dentro de uma variavel
            $url  = $this->url()? $this->url() : [0];

            //Checar se o arquivo Controlador existe. Caso exista a variavel controlador recebe o valor
            //vindo da url e a url é limpa. 
            if(file_exists('../app/Controllers/'.ucwords($url[0]).'.php')){
                $this->controlador = ucwords($url[0]);
                unset($url[0]);
            }
            //Faz o requerimento do controlador e depois cria uma instancia
            require_once '../app/Controllers/'.$this->controlador.'.php';
            $this->controlador = new $this->controlador;

            //Checar foi passado o metodo na url
            if(isset($url[1])){
                //Caso o metodo exista, coloca em uma variavel 
                if(method_exists($this->controlador, $url[1])){
                    $this->metodo = $url[1];
                    unset($url[1]);
                }
            }

            //Checa se existe o parametro, caso exista recebe os parametros.
            $this->parametros = $url ? array_values($url) : [];
            //Monta a url com os valores passados
            call_user_func_array([$this->controlador, $this->metodo],$this->parametros);

        }

        //Metodo responsavel por manipular a url 
        public function url(){
            //Recebe a url e trata a mesma
            $url = filter_input(INPUT_GET,'url',FILTER_SANITIZE_URL);
            //Caso ela exista, retorna url
            if(isset($url)){
                //Retira todos os espaços antes ou depois da barra 
                $url = trim(rtrim($url,'/'));
                //Divide as partes da url e guarda em um array
                $url = explode('/',$url);
                //Retorna a url
                return $url;
            }
        }
    }