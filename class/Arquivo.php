<?php
class Arquivo{
    private $titulo;
    private $descricao;

    private $caminhoTemporario;
    private $nomeTemporario;

    private $novoNome;
    private $novoCaminho;

    private $data;
    private $tipo_imagem;

    private $erro;
    private $endereco = "img/";

    public function __construct(){
        $this->erro = array();
    }

    public function verificaCampos(){
        if(empty($this->titulo)){
            $this->erro[] = 'O titulo esta vazio';
        }
        if(empty($this->descricao) ){
            $this->erro[] = 'O descricao esta vazio';
        }
    }

    public function moveArquivo($arquivoErro){
        //arquivoErro == 0 significa q usuario enviau algum arquivo
        if(($arquivoErro == 0) && count($this->erro) == 0){


            move_uploaded_file($this->caminhoTemporario,$this->getNovoCaminho());

            echo 'img movida do arquivo temporario para pasta destino';
        }else{
            echo 'deu errado';die();
            if($arquivoErro != 0){
                $erro[] = 'O arquivo nao foi enviado';
            }
        }
    }

    public function getTitulo()
    {
        return $this->titulo;
    }


    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }


    public function getDescricao()
    {
        return $this->descricao;
    }


    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }


    public function getCaminhoTemporario()
    {
        return $this->caminhoTemporario;
    }


    public function setCaminhoTemporario($caminhoTemporario)
    {
        $this->caminhoTemporario = $caminhoTemporario;
    }


    public function getNomeTemporario()
    {
        return $this->nomeTemporario;
    }


    public function setNomeTemporario($nomeTemporario)
    {
        $this->nomeTemporario = $nomeTemporario;
    }


    public function getNovoNome()
    {
        $nomeArquivo = date ('Y-m-d_H:i', time());
        return $nomeArquivo.".".$this->getTipoImagem();
    }


    public function setNovoNome($novoNome)
    {
        $this->novoNome = $novoNome;
    }


    public function getNovoCaminho()
    {
        return $this->endereco.$this->getNovoNome();
    }


    public function setNovoCaminho($novoCaminho)
    {
        $this->novoCaminho = $novoCaminho;
    }


    public function getData()
    {
        return date('H:i:s_Y-m-d');
    }


    public function setData($data)
    {
        $this->data = $data;
    }


    public function getTipoImagem(){
        if(!empty($this->nomeTemporario)) {
            return end(explode(".",$this->nomeTemporario));
        }else{
            echo "nome temporario não esta disponivel";
        }
    }


    public function setTipoImagem($tipo_imagem)
    {
        $this->tipo_imagem = $tipo_imagem;
    }


    public function getErro()
    {
        return $this->erro;
    }


    public function setErro($erro)
    {
        $this->erro = $erro;
    }




}