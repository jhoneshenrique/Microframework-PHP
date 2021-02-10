<?php
    class Posts extends Controller{
        public function __construct()
        {
            if(!Sessao::estaLogado()){
                Url::redirecionar('usuarios/login');
            }  

            //Instancia um objeto do Model usuario
            $this->postModel = $this->model('Post');
        }


        public function index(){

            //Recebe os dados vindos do Model
            $dados = [
                'posts' => $this->postModel->lerPosts()
            ];
            $this->view('posts/index',$dados);
        }


        public function cadastrar()
    {
        //echo $_POST['nome'];

        //Verifica se o formulario existe. Recebe os dados somente se o usuario clicar no formulario
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) { //Caso exista, o array dados recebe os dados passados pelo usuario
            $dados = [
                'titulo' => trim($formulario['titulo']),
                'texto' => trim($formulario['texto']),
                'usuario_id' => $_SESSION['usuario_id']
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
        
                   

                     //Cadastra
                     if ($this->postModel->armazenar($dados)) {
                        //Clama metodo estatico mensagem da classe Sessao
                        Sessao::mensagem('post','post cadastrado com sucesso');
                        Url::redirecionar('posts');
                    } else {
                        die("Erro ao armazenar posts");
                    }
                
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