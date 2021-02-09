<?php

class Usuarios extends Controller
{

    public function __construct()
    {
        //Instancia um objeto do Model usuario
        $this->usuarioModel = $this->model('Usuario');
    }

    public function cadastrar()
    {
        //echo $_POST['nome'];

        //Verifica se o formulario existe. Recebe os dados somente se o usuario clicar no formulario
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) { //Caso exista, o array dados recebe os dados passados pelo usuario
            $dados = [
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'confirma_senha' => trim($formulario['confirma_senha'])
            ];

            //Validacao para confirmar se nao ha nenhum campo em branco
            if (in_array("", $formulario)) {

                //Verifica se o formulario esta vazio e caso estaja, atribui uma mensagem no indice de erros
                if (empty($formulario['nome'])) {
                    $dados['nome_erro'] = 'Preencha o campo nome';
                }
                if (empty($formulario['email'])) {
                    $dados['email_erro'] = 'Preencha o campo e-mail';
                }
                if (empty($formulario['senha'])) {
                    $dados['senha_erro'] = 'Preencha o campo senha';
                }

                if (empty($formulario['confirma_senha'])) {
                    $dados['confirma_senha_erro'] = 'Preencha o campo confirmar senha';
                }
            } else { //Faz outras validacoes 
                if (Checa::checarNome($formulario['nome'])) { //pre_match() usado para aplicar expressoes regulares
                    $dados['nome_erro'] = 'O campo aceita somente letras';
                } elseif (Checa::checarEmail($formulario['email'])) { //Validando e-mail PHP
                    $dados['email_erro'] = 'E-mail invalido';
                } elseif ($this->usuarioModel->checarEmail($formulario['email'])) {
                    $dados['email_erro'] = 'E-mail ja cadastrado';
                } elseif (strlen($formulario['senha']) < 6) {
                    $dados['senha_erro'] = 'A senha ter no minimo 6 caracteres';
                } elseif ($formulario['senha'] != $formulario['confirma_senha']) {
                    $dados['confirma_senha_erro'] = 'A senhas sao diferentes';
                } else {
                    //Hash segura de senha
                    $dados['senha'] = password_hash($formulario['senha'], PASSWORD_DEFAULT);

                    //Cadastra
                    if ($this->usuarioModel->armazenar($dados)) {
                        //Clama metodo estatico mensagem da classe Sessao
                        Sessao::mensagem('usuario','usuario criado com sucesso');
                        Url::redirecionar('usuarios/login');
                    } else {
                        die("Erro ao armazenar");
                    }
                }
            }

        } else { //Senao ele recebe um array vazio
            $dados = [
                'nome' => '',
                'email' => '',
                'senha' => '',
                'confirma_senha' => '',
                'nome_erro' => '',
                'email_erro' => '',
                'senha_erro' => '',
                'confirma_senha_erro' => '',
            ];
        }
        //Mantem os dados que foram digitados
        $this->view('usuarios/cadastrar', $dados);
    }


    //Login
    public function login()
    {
        //echo $_POST['nome'];

        //Verifica se o formulario existe. Recebe os dados somente se o usuario clicar no formulario
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario)) { //Caso exista, o array dados recebe os dados passados pelo usuario
            $dados = [
    
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),

            ];

            //Validacao para confirmar se nao ha nenhum campo em branco
            if (in_array("", $formulario)) {

                //Verifica se o formulario esta vazio e caso estaja, atribui uma mensagem no indice de erros
             
                if (empty($formulario['email'])) {
                    $dados['email_erro'] = 'Preencha o campo e-mail';
                }
                if (empty($formulario['senha'])) {
                    $dados['senha_erro'] = 'Preencha o campo senha';
                }

                
            } else { //Faz outras validacoes 
                if (Checa::checarEmail($formulario['email'])) { //Validando e-mail PHP
                    $dados['email_erro'] = 'E-mail invalido';

                } else {
                    $usuario = $this->usuarioModel->checarLogin($formulario['email'],$formulario['senha']);

                    if($usuario){
                        $this->criarSessaoUsuario($usuario);
                    }else{
                        //Clama metodo estatico mensagem da classe Sessao
                        Sessao::mensagem('usuario','usuario e senha invalido','alert alert-danger');
                    }
                }
            }

        } else { //Senao ele recebe um array vazio
            $dados = [
                'email' => '',
                'senha' => '',                
                'email_erro' => '',
                'senha_erro' => '',
            ];
        }
        //Mantem os dados que foram digitados
        $this->view('usuarios/login', $dados);
    }

    //metodo para criar sessao
    public function criarSessaoUsuario($usuario){
        $_SESSION['usuario_id'] = $usuario->id;
        $_SESSION['usuario_nome'] = $usuario->nome;
        $_SESSION['usuario_email'] = $usuario->email;
        Url::redirecionar('posts');
    }

    //Destruindo a sessao
    public function sair(){
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nome']);
        unset($_SESSION['usuario_email']);

        session_destroy();

        Url::redirecionar('usuarios/login');
    }
}
