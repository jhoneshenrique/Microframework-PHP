<?php
    class Posts extends Controller{
        public function __construct()
        {
            if(!Sessao::estaLogado()){
                Url::redirecionar('usuarios/login');
            }  

            //Instancia um objeto do Model post
            $this->postModel = $this->model('Post');
            //Instancia um objeto do Model usuario
            $this->usuarioModel = $this->model('Usuario');
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

    public function ver($id){
        $post = $this->postModel->lerPostPorId($id);
        $usuario = $this->usuarioModel->lerUsuarioPorId($post->usuario_id);
        $dados = [
            'post' => $post,
            'usuario' => $usuario
        ];

        $this->view('posts/ver',$dados);
    }

    //Editar o formulario 
    public function editar($id)
    {
       

        //Verifica se o formulario existe. Recebe os dados somente se o usuario clicar no formulario
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) { //Caso exista, o array dados recebe os dados passados pelo usuario
            $dados = [
                'id' => $id,
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
        
                   

                     //Cadastra
                     if ($this->postModel->atualizar($dados)) {
                        //Clama metodo estatico mensagem da classe Sessao
                        Sessao::mensagem('post','post atualizado com sucesso');
                        Url::redirecionar('posts');
                    } else {
                        die("Erro ao atualizar posts");
                    }
                
            }

        } else { //Senao ele recebe um array vazio

            $post = $this->postModel->lerPostPorId($id);

            $dados = [
                'id' => $post->id,
                'titulo' => $post->titulo,
                'texto' => $post->texto,
                'titulo_erro' => '',
                'texto_erro' => '',
            ];
        }

        var_dump($formulario);
        //Mantem os dados que foram digitados
        $this->view('posts/editar', $dados);
    }

    }