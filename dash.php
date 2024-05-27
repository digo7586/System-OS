<?php
require_once('include/conn.php');
require_once "include/cabecalho.php";
require_once "include/menu.php";

/* Variaveis padrão */
$osEmAndamento = 0;
$osFinalizada = 0;

######## total de os ##########
// consulta para obter total de O.S cadastradas
$totalOsQuery = $link->query("SELECT COUNT(id_os) as qtd FROM  `ordem`");
$totalOsResult = mysqli_fetch_object($totalOsQuery);
$osAbertas = $totalOsResult->qtd;

// verifica se há o.s aberta antes de calcular a porcentagem de andamento e concluídos

if ($osAbertas > 0) {
    // consulta para obter o total de o.s concluida
    $totalOsConcluidaQuery = $link->query("SELECT COUNT(id_os)as qtd FROM `ordem` WHERE status = 1");
    $totalOsConcluidaResult = mysqli_fetch_object($totalOsConcluidaQuery);
    $osFinalizada = $totalOsConcluidaResult->qtd;

    /* Calculo da Porcent*/
    $osConcluida = ($osFinalizada / $osAbertas) * 100;
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


<link rel="stylesheet" href="assets/css/styleHome.css" />

<script>
    $(document).ready(function() {
        $('.titulo-inicio').click(function() {
            $('.informacao').show('slow')
        })
    })
</script>

<div class="background-container">
    <img src="image/veloci7.jpg" class="background-image">
</div>
<div class="container-fluid p-3">
    
<?php include_once('painel.php') ?>



    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 mb-5">

<div class="col-md-4">
    <div class="card">
        
        <div class="card-head">
        <h3 class="text-light">Entradas</h3>
        </div>
        <div class="card-progress">
        <h2 class="card-title mb-4 text-light">R$ <span><?= $ganhos ?></span></h2>
            <span class="clipBoard"><i class="bi bi-clipboard"></i></span>
            
            <div class="card-indicator">
                <div class="indicator five"></div>
            </div>
        </div>
        
    </div>
</div>

<div class="col-md-4">
    <div class="card">
       
        <div class="card-head">
        <h3 class="text-light">Caixa</h3>
        </div>
        <div class="card-progress">
        <h2 class="card-title mb-4 text-light">R$ <span class="text-success"><?= $ganho ?></span></h2>
            <span class="clipBoard"><i class="bi bi-clipboard"></i></span>
            
            <div class="card-indicator">
                <div class="indicator nine"></div>
            </div>
        </div>
       
    </div>
</div>
  

</div>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3 mb-5">

<div class="col-md-4">
    <div class="card">
       
        <div class="card-head">
        <h3 class="text-light">Saídas</h3>
        </div>
        <div class="card-progress">
        <h2 class="card-title mb-4 text-light">R$ <span class="text-danger"><?= $saidas ?></span></h2>
            <span class="clipBoard"><i class="bi bi-arrow-down-circle"></i></span>
            
            <div class="card-indicator">
                <div class="indicator six"></div>
            </div>
        </div>
       
    </div>
</div>
<div class="col-md-2">
    <div class="card">
       
        <div class="card-head">
        <h3 class="text-light">Terceiros</h3>
        </div>
        <div class="card-progress">
        <h2 class="card-title mb-4 text-light">R$ <span class="text-warning"><?= $gastosterceiros ?></span></h2>
            <span class="clipBoard"><i class="bi bi-clipboard"></i></span>
            
            <div class="card-indicator">
                <div class="indicator seven"></div>
            </div>
        </div>
       
    </div>
</div>
<div class="col-md-3">
    <div class="card">
       
        <div class="card-head">
        <h3 class="text-light">Peças</h3>
        <i class="bi bi-arrow-down-circle"></i>
        </div>
        <div class="card-progress">
        <h2 class="card-title mb-4 text-light">R$ <span class="text-primary"><?= $gastosPecas ?></span></h2>
            <span class="clipBoard"><i class="bi bi-clipboard"></i></span>
            
            <div class="card-indicator">
                <div class="indicator eight"></div>
            </div>
        </div>
       
    </div>
</div>
</div>

<!-- <div class= "img-fluid" style="background-color: #000; width:100vw; height:78vh">
        <img src="image/veloci.jpg" class="mx-auto d-block img-fluid" style="height: 78vh;">
    </div> -->

<!-- <footer>
    
    <h6 class="footer-font text-white">© 2024</h6>
 
</footer> -->
</main>
<?php require_once "include/footer.php";?>



</body>

</html>