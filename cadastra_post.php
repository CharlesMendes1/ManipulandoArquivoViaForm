
<?php
require_once "class/Arquivo.php";
$arquivo = new Arquivo();

$arquivo->setTitulo($_POST['titulo']);
$arquivo->setDescricao($_POST['descricao']);
$arquivo->setCaminhoTemporario($_FILES['img']['tmp_name']);
$arquivo->setNomeTemporario($_FILES['img']['name']);

//$dt = $arquivo->getData();

$arquivo->verificaCampos();
$arquivo->moveArquivo($_FILES['img']['error']);



/*

if(empty($arquivo->getErro())){
    // abre conexão
    require_once "class/Database.php";
    $db = new Database('localhost','root','sorvete123','Tabela_de_Post');
    $db->insereBanco($arquivo);
}else{
    //retorna erro para usuario
    session_start();
    $_SESSION['erro'] =  array();

    foreach ($arquivo->getErro() as $item) {
        array_push($_SESSION['erro'],$item);
    }

    $_SESSION['titulo'] = $arquivo->getTitulo();
    $_SESSION['descricao'] = $arquivo->getDescricao();

    header("Location: formulario_post.php");

}
*/