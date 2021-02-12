<?php


class Database{
    private $host = DB['HOST'];
    private $usuario = DB['USUARIO'];
    private $senha = DB['SENHA'];
    private $banco = DB['BANCO'];
    private $porta = DB['PORTA'];
    private $dbh;
    private $stmt;


    public function __construct()
    {   

        $dsn = 'mysql:host='.$this->host.';port='.$this->porta.';dbname='.$this->banco;
        $opcoes = [
            //Cria uma conexao persistente para evitar a sobrecarga do sistema
            PDO::ATTR_PERSISTENT => true,
            //Lança uma PDOexceptions se ocorrer erro
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        
        try {
            $this->dbh = new PDO($dsn, $this->usuario, $this->senha, $opcoes);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        
    }

    public function query($sql){
        //Prepara a query para ser utilizada
        $this->stmt = $this->dbh->prepare($sql);
    }


    //Função responsável por fazer o bind 
    public function bind($parametro, $valor, $tipo = null){
        if(is_null($tipo)){
            switch(true){
                case is_int($valor):
                    $tipo = PDO::PARAM_INT;
                break;
                case is_bool($valor):
                    $tipo = PDO::PARAM_BOOL;
                break;
                case is_null($valor):
                    $tipo = PDO::PARAM_NULL;
                break;
                default:
                    $tipo = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($parametro, $valor, $tipo);
    }

    public function executa(){
        return $this->stmt->execute();
    }

    //Retorn um resultado
    public function resultado(){
        $this->executa();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    //Retorna varios
    public function resultados(){
        $this->executa();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    //Retorna o total de linhas afetadas pela consulta
    public function totalResultados(){
        return $this->stmt->rowCount();
    }

    //Retorn o ultimo id inserido
    public function ultimoIdInserido(){
        return $this->dbh->lastInsertId();
    }
}





