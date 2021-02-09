<?php
    class Posts extends Controller{
        public function __construct()
        {
            if(!Sessao::estaLogado()){
                Url::redirecionar('usuarios/login');
            }  
        }


        public function index(){
            $this->view('posts/index');
        }


        public function cadastrar()
    {
        //echo $_POST['nome'];

        //Verifica se o formulario existe. Recebe os dados somente se o usuario clicar no formulario
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) { //Caso exista, o array dados recebe os dados passados pelo usuario
            $dados = [
                'titulo' => trim($formulario['titulo']),
                'texto' => trim($formulario['texto'])
            ];

            //Validacao para confirmar se nao ha nenhum campo em branco
            if (in_array("", $formulario)) {

                //Verifica se o formulario esta vazio e caso estaja, atribui uma mensagem no indice de erros
                if (empty($formulario['titulo'])) {
                    $dados['titulo_erro'] = 'Preencha o campo titulo';
                }
                if (empty($formulario['texto'])) {
                    $dados['texto_erro'] = 'Preencha o campo texto';
                }
                

            } else { //Faz outras validacoes 
        
                   

                    echo 'pode cadastrar o post';
                
            }

        } else { //Senao ele recebe um array vazio
            $dados = [
                'titulo' => '',
                'texto' => '',
                'titulo_erro' => '',
                'texto_erro' => '',
            ];
        }

        var_dump($formulario);
        //Mantem os dados que foram digitados
        $this->view('posts/cadastrar', $dados);
    }

    }