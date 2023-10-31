<?php include 'includes/conexao.php';


$acao = $_POST['acao'];


//---------------
if($acao == 'cadastrar'){
    $id = $_POST['id'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria'];
    $sql = 'INSERT into PRODUTOS (descricao, categoria_id) values ("'.$descricao.'", "'.$categoria.'")';

    if ($conn->query($sql)) {
        return true;
    }else if ($conn->errno) {
        printf("Could not insert record into table: %s<br />", $conn->error);
    }
}
//---------------
if($acao == 'alterar'){
    $id = $_POST['id'];
$descricao = $_POST['descricao'];
$categoria = $_POST['categoria'];
    $sql = 'UPDATE PRODUTOS SET descricao = "'.$descricao.'", categoria_id = "'.$categoria.'" where id = '. $id;

    if ($conn->query($sql)) {
        return true;
    }else if ($conn->errno) {
        printf("Could not insert record into table: %s<br />", $conn->error);
    }
}

//---------------
if($acao == 'excluir'){
    $id = $_POST['id'];
$categoria = $_POST['categoria'];
    $sql = 'DELETE from PRODUTOS where id = '.$id;

    if ($conn->query($sql)) {
        return true;
    }
    if ($conn->errno) {
        printf("Could not insert record into table: %s<br />", $conn->error);
    }
}


if($acao == 'categoria'){
    $id = $_POST['id'];
    $categoria = $_POST['categoria'];
    if($categoria == 1){
        $categoria = 0;
    }else{
        $categoria = 1;
    }
    $sql = 'UPDATE CATEGORIAS set categoria = '.$categoria.' where id = '.$id;
    if ($conn->query($sql)) {
        return true;
    }
    if ($conn->errno) {
        printf("Could not insert record into table: %s<br />", $conn->error);
    }
}
?>
