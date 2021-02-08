<?php 

class Usuario{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //Realiza cadastro
    public function armazenar($dados){
        $this->db->query("INSERT INTO usuario(nome,email,senha) VALUES (:nome, :email,:senha)");
        $this->db->bind("nome", $dados['nome']);
        $this->db->bind("email", $dados['email']);
        $this->db->bind("senha", $dados['senha']);

        if($this->db->executa()){
            return true;
        }else{
            return false;
        }
    }

    //Checa se o e-mail ja foi cadastrado
    public function checarEmail($email){
        $this->db->query("SELECT email FROM usuario WHERE email = :e ");
        $this->db->bind(":e", $email);
        if($this->db->resultado()){
            return true;
        }else{
            return false;
        }
    }

    //Checa login
    public function checarLogin($email,$senha){
        $this->db->query("SELECT * FROM usuario WHERE email = :e ");
        $this->db->bind(":e", $email);
        if($this->db->resultado()){
            $resultado = $this->db->resultado();
            //password_verify compara a senha recebida com a do banco de dados
            if(password_verify($senha, $resultado->senha)){
                return $resultado;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }
}