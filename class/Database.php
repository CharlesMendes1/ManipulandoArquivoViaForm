<?php

class Database{
    private $host;
    private $usuario;
    private $senha;
    private $database;

    function __construct($host,$usuario,$senha,$database){
            $this->host = $host;
            $this->usuario = $usuario;
            $this->senha = $senha;
            $this->database = $database;
    }
    public function insereBanco($arquivo){

            $conexao = $this->criaConexao();

            $titulo = $arquivo->getTitulo();
            $descricao = $arquivo->getDescricao();
            $novoNome = $arquivo->getNovoNome().$arquivo->getTipoImagem();
            $dt = $arquivo->getData();

            $query = "insert into post(titulo,descricao,img,data)values ('{$titulo}','{$descricao}','{$novoNome}','{$dt}')";

            if (mysqli_query($conexao, $query)){
                header("Location: formulario_post.php");
            } else {
                echo "Erro no armazenamento dos dados";
            }

            mysqli_close($conexao);
    }

    private function criaConexao(){
        return mysqli_connect("$this->host", "$this->usuario","$this->senha", "$this->database");
    }


}