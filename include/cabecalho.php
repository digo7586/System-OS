<?php
ini_set('default_charset', 'UTF-8');

session_start();


require_once "include/config.php";
require_once "conn.php";

/* Variaveis padrão */
$osEmAndamento = 0;
$osFinalizada = 0;

// Consulta para obter o total de clientes cadastrados 
$totalClientesQuery = $link->query("SELECT COUNT(id) as qtd FROM `clientes`");
$totalClienteResult = mysqli_fetch_object($totalClientesQuery);
$clientes = $totalClienteResult->qtd;

// consulta para obter total de O.S cadastradas
$totalOsQuery = $link->query("SELECT COUNT(id_os) as qtd FROM  `ordem`");
$totalOsResult = mysqli_fetch_object($totalOsQuery);
$totalAbertas = $totalOsResult->qtd;

// consulta para obter a quantidade de O.S abertas
$abertasQuery = $link->query("SELECT COUNT(`id_os`) AS 'quantidade' FROM `ordem` WHERE `status`='0' ");
$abertasResultado = mysqli_fetch_object($abertasQuery);
$abertas = $abertasResultado->quantidade;

// verifica se há o.s aberta antes de calcular a porcentagem de andamento e concluídos

if ($totalAbertas > 0) {
    // consulta para obter o total de o.s concluida
    $totalOsConcluidaQuery = $link->query("SELECT COUNT(id_os)as qtd FROM `ordem` WHERE status = 1");
    $totalOsConcluidaResult = mysqli_fetch_object($totalOsConcluidaQuery);
    $osFinalizada = $totalOsConcluidaResult->qtd;

    /* Calculo da Porcent*/
    $osConcluida = ($osFinalizada / $totalAbertas) * 100;
} else {
    $osConcluida =  0;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ordem de Serviço</title>
    <link rel="shortcut icon" href="image/logo-icone.png">

    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
 
 

    <link rel="stylesheet" type="text/css" href="assets/css/contato.css">
    <link rel="stylesheet" type="text/css" href="assets/css/menu.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <script src="assets/js/jquery.js"></script>


    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
    <script src="assets/js/menu.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

   
</head>


