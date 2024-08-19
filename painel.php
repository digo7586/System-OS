<?php
require_once('include/conn.php');
require_once "include/cabecalho.php";
require_once "include/menu.php";

/* Variaveis padrão */
$osEmAndamento = 0;
$osFinalizada = 0;

######## total de os ##########
// consulta para obter total de O.S cadastradas
$totalOsQuery = $link->query("SELECT COUNT(id_os) as qtd FROM `ordem`");
$totalOsResult = mysqli_fetch_object($totalOsQuery);
$osAbertasTotal = $totalOsResult->qtd;

//consulta para obter somente os abertas
$abertasQuery = $link->query("SELECT COUNT(id_os) as qtd FROM `ordem` WHERE status = '0'");
$abertasResult = mysqli_fetch_object($abertasQuery);
$osAbertas = $abertasResult->qtd;


// verifica se há o.s aberta antes de calcular a porcentagem de andamento e concluídos
if ($osAbertasTotal > 0) {
    // consulta para obter o total de o.s concluida
    $totalOsConcluidaQuery = $link->query("SELECT COUNT(id_os)as qtd FROM `ordem` WHERE status = 1");
    $totalOsConcluidaResult = mysqli_fetch_object($totalOsConcluidaQuery);
    $osFinalizada = $totalOsConcluidaResult->qtd;

    /* Calculo da Porcent*/
    $osConcluida = ($osFinalizada / $osAbertasTotal) * 100;
} else {
    $osConcluida =  0;
}

// Consulta para obter o total de clientes cadastrados 
$totalClientesQuery = $link->query("SELECT COUNT(id) as qtd FROM `clientes`");
$totalClienteResult = mysqli_fetch_object($totalClientesQuery);
$clientes = $totalClienteResult->qtd;

/* analise de gastos e ganhos */

/* calcular quanto ja arrecadou */
$totalValorGanho = $link->query("SELECT SUM(valorTotal) as qtd FROM `ordem`");
$totalGanhoeResult = mysqli_fetch_object($totalValorGanho);
$ganhos = $totalGanhoeResult->qtd;

/* calcular quanto ja arrecadou tirando peças e serviços de terceiros */
$ValorGanho = $link->query("SELECT SUM(valorTotal - valorPecas - valorTerceiros) as qtd FROM `ordem`");
$GanhoeResult = mysqli_fetch_object($ValorGanho);
$ganho = $GanhoeResult->qtd;

/* calcular quanto ja saiu do caixa com peças e serviços de terceiros */
$ValorSaida = $link->query("SELECT SUM(valorPecas + valorTerceiros) as qtd FROM `ordem`");
$saidasResult = mysqli_fetch_object($ValorSaida);
$saidas = $saidasResult->qtd;

/* calcular quanto já gastou com peças */
$total_gasto_pecas = $link->query("SELECT SUM(valorPecas) as qtd FROM `ordem`");
$total_gastoResult = mysqli_fetch_object($total_gasto_pecas);
$gastosPecas = $total_gastoResult->qtd;

/* calcular quanto já gastou com terceiros */
$total_gasto_terceiros = $link->query("SELECT SUM(valorTerceiros) as qtd FROM `ordem`");
$total_terceirosResult = mysqli_fetch_object($total_gasto_terceiros);
$gastosterceiros = $total_terceirosResult->qtd;

// recuperar O.S abertas não finalizadas
$result = $link->query("SELECT * FROM ordem where status = '0' ORDER BY id_os desc");
$dataOs = mysqli_num_rows($result);
?>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-1 mb-5">
        <div class="col-md-3">
            <div class="card total-os shadow-sm">
                <div class="card-body scale">
                    <a href="total-os.php" class="stretched-link">
                        <h5 class="card-title">TOTAL O.S</h5>
                        <h4 class="card-value"><?= $osAbertasTotal ?></h4>
                        <div class="card-progress">
                            <div class="indicator one"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card abertas shadow-sm">
                <div class="card-body scale">
                    <a href="abertas.php">
                        <h5 class="card-title">ABERTAS</h5>
                        <h4 class="card-value"><?= $osAbertas ?></h4>
                        <div class="card-progress">
                            <div class="indicator two"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card concluidas shadow-sm">
                <div class="card-body scale">
                    <a href="concluidas.php" class="stretched-link">
                        <h5 class="card-title">CONCLUÍDAS</h5>
                        <h4 class="card-value"><?= $osFinalizada ?></h4>
                        <div class="card-progress">
                            <div class="indicator three" style="width: <?= $osConcluida ?>%;"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card clientes shadow-sm">
                <div class="card-body scale">
                    <a href="clientes.php" class="stretched-link">
                        <h5 class="card-title">CLIENTES</h5>
                        <h4 class="card-value"><?= $clientes ?></h4>
                        <div class="card-progress">
                            <div class="indicator four"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>