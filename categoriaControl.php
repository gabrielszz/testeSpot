<?php include 'includes/conexao.php';


$acao = $_POST['acao'];


//---------------
if($acao == 'cadastrar'){
    $id = $_POST['id'];
$descricao = $_POST['descricao'];
$status = $_POST['status'];
    $sql = 'INSERT into CATEGORIAS (descricao, status) values ("'.$descricao.'",1)';

    if ($conn->query($sql)) {
        return true;
    }else if ($conn->errno) {
        printf("Could not insert record into table: %s<br />", $conn->error);
    }
}
//-----------------
if($acao == 'alterar'){
    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];
    $sql = 'UPDATE CATEGORIAS SET descricao = "'.$descricao.'", status = "'.$status.'" where id = '. $id;

    if ($conn->query($sql)) {
        return true;
    }else if ($conn->errno) {
        printf("Could not insert record into table: %s<br />", $conn->error);
    }
}

//---------------
if($acao == 'excluir'){
    $id = $_POST['id'];
    $status = $_POST['status'];
    $sql = 'DELETE from CATEGORIAS where id = '.$id;

    $sql2 = 'UPDATE PRODUTOS SET categoria_id = 0 where categoria_id = '.$id;
    $conn->query($sql2);

    if ($conn->query($sql)) {
        return true;
    }
    if ($conn->errno) {
        printf("Could not insert record into table: %s<br />", $conn->error);
    }
}


if($acao == 'status'){
    $id = $_POST['id'];
    $status = $_POST['status'];
    if($status == 1){
        $status = 0;
    }else{
        $status = 1;
    }
    $sql = 'UPDATE CATEGORIAS set status = '.$status.' where id = '.$id;
    if ($conn->query($sql)) {
        return true;
    }
    if ($conn->errno) {
        printf("Could not insert record into table: %s<br />", $conn->error);
    }
}
?>
