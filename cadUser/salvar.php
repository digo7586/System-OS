<?php

// Incluindo arquivo de conexão
require_once('conn.php');

// Recupera os dados dos campos

$nivel = addslashes($_POST['nivel']);
$ativo = addslashes($_POST['ativo']);
$data = addslashes($_POST['cadastro']);
$nome = addslashes($_POST['alterado']);
$tipo = addslashes($_POST['tipo']);
$id = 

list($dia,$mes,$ano) = explode("/",$data);
if($_POST['cadastro']){
    $dataCad = "$ano-$mes-$dia";
} else {
    $dataCad = date('Y-m-d');
}

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
 $query = "
 UPDATE tbl_users 
 SET
 nivel = '$nivel',
 ativo = '$ativo',
 alterado = '$nome',
 cadastro = '$dataCad',
 tipo_user = '$tipo'
 WHERE cod_tbl_users =".$_POST['id'];
 
if (mysqli_query($link,$query)) {
    echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='./perfil.php'</script>";
} else {
    echo "Error updating record: " . mysqli_error($link);
}

               
mysqli_close($link);