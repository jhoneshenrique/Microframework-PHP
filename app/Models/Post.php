<?php 

class Post{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //Leitura dos Posts
    public function lerPosts(){
        $this->db->query("SELECT *,
         post.id as postId,
         post.criado_em as postDataCadastro,
         usuario.id as usuarioId,
         usuario.criado_em as usuarioDataCadastro
         FROM post
         INNER JOIN usuario ON 
         post.usuario_id = usuario.id
         ORDER BY post.id DESC
         ");
        return $this->db->resultados();
    }

    //Realiza cadastro
    public function armazenar($dados){
        $this->db->query("INSERT INTO post(usuario_id, titulo,texto) VALUES (:usuario_id,:titulo, :texto)");
        $this->db->bind("usuario_id", $dados['usuario_id']);
        $this->db->bind("titulo", $dados['titulo']);
        $this->db->bind("texto", $dados['texto']);

        if($this->db->executa()){
            return true;
        }else{
            return false;
        }
    }

    //Ler pos individualmente
    public function lerPostPorId($id){
        $this->db->query("SELECT * FROM post WHERE id = :id");
        $this->db->bind('id',$id);
        return $this->db->resultado();
    }

    //update
    public function atualizar($dados){
        $this->db->query("UPDATE post SET titulo = :titulo, texto = :texto WHERE id = :id");

        $this->db->bind("id", $dados['id']);
        $this->db->bind("titulo", $dados['titulo']);
        $this->db->bind("texto", $dados['texto']);

        if($this->db->executa()){
            return true;
        }else{
            return false;
        }
    }

    //delete
    public function destruir($id){
        $this->db->query("DELETE FROM post WHERE id = :id");

        $this->db->bind("id", $id);

        if($this->db->executa()){
            return true;
        }else{
            return false;
        }
    }

}
