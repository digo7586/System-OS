<?php
// Configurações de autenticação
$valid_passwords = array ("admin" => "@info22"); // Nome de usuário e senha
$realm = "Área Restrita"; // Nome da área protegida

// Verificar se o usuário forneceu credenciais
if (empty($_SERVER['PHP_AUTH_USER']) || empty($_SERVER['PHP_AUTH_PW']) || !isset($valid_passwords[$_SERVER['PHP_AUTH_USER']]) || $valid_passwords[$_SERVER['PHP_AUTH_USER']] != $_SERVER['PHP_AUTH_PW']) {
    header('WWW-Authenticate: Basic realm="' . $realm . '"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Você deve fornecer um nome de usuário e senha válidos.';
    exit;
}
?>

<?php
require_once('include/conn.php');
require_once "include/cabecalho.php";
require_once "include/menu.php";

/* Variáveis padrão */
$osEmAndamento = 0;
$osFinalizada = 0;

######## total de os ##########
// consulta para obter total de O.S cadastradas
$totalOsQuery = $link->query("SELECT COUNT(id_os) as qtd FROM  `ordem`");
$totalOsResult = mysqli_fetch_object($totalOsQuery);
$osAbertas = $totalOsResult->qtd;

// verifica se há o.s aberta antes de calcular a porcentagem de andamento e concluídos
if ($osAbertas > 0) {
    // consulta para obter o total de o.s concluída
    $totalOsConcluidaQuery = $link->query("SELECT COUNT(id_os) as qtd FROM `ordem` WHERE status = 1");
    $totalOsConcluidaResult = mysqli_fetch_object($totalOsConcluidaQuery);
    $osFinalizada = $totalOsConcluidaResult->qtd;

    /* Cálculo da Porcentagem */
    $osConcluida = ($osFinalizada / $osAbertas) * 100;
} else {
    $osConcluida = 0;
}

// Consulta para obter o total de clientes cadastrados 
$totalClientesQuery = $link->query("SELECT COUNT(id) as qtd FROM `clientes`");
$totalClienteResult = mysqli_fetch_object($totalClientesQuery);
$clientes = $totalClienteResult->qtd;

/* Análise de gastos e ganhos */

/* Calcular quanto já arrecadou */
$totalValorGanho = $link->query("SELECT SUM(valorTotal) as qtd FROM `ordem`");
$totalGanhoeResult = mysqli_fetch_object($totalValorGanho);
$ganhos = $totalGanhoeResult->qtd;

/* Calcular quanto já arrecadou tirando peças e serviços de terceiros */
$ValorGanho = $link->query("SELECT SUM(valorTotal - valorPecas - valorTerceiros) as qtd FROM `ordem`");
$GanhoeResult = mysqli_fetch_object($ValorGanho);
$ganho = $GanhoeResult->qtd;

/* Calcular quanto já saiu do caixa com peças e serviços de terceiros */
$ValorSaida = $link->query("SELECT SUM(valorPecas + valorTerceiros) as qtd FROM `ordem`");
$saidasResult = mysqli_fetch_object($ValorSaida);
$saidas = $saidasResult->qtd;

/* Calcular quanto já gastou com peças */
$total_gasto_pecas = $link->query("SELECT SUM(valorPecas) as qtd FROM `ordem`");
$total_gastoResult = mysqli_fetch_object($total_gasto_pecas);
$gastosPecas = $total_gastoResult->qtd;

/* Calcular quanto já gastou com terceiros */
$total_gasto_terceiros = $link->query("SELECT SUM(valorTerceiros) as qtd FROM `ordem`");
$total_terceirosResult = mysqli_fetch_object($total_gasto_terceiros);
$gastosterceiros = $total_terceirosResult->qtd;

// Recuperar O.S abertas não finalizadas
$result = $link->query("SELECT * FROM ordem WHERE status = '0' ORDER BY id_os DESC");
$dataOs = mysqli_num_rows($result);

// Função para formatar valores monetários no formato brasileiro
function formatarMoeda($valor) {
    return number_format($valor, 2, ',', '.');
}

// Aplicar formatação aos valores
$ganhos = formatarMoeda($ganhos);
$ganho = formatarMoeda($ganho);
$saidas = formatarMoeda($saidas);
$gastosPecas = formatarMoeda($gastosPecas);
$gastosterceiros = formatarMoeda($gastosterceiros);



?>

<link rel="stylesheet" href="assets/css/styleHome.css" />

<script>
    $(document).ready(function() {
        $('.titulo-inicio').click(function() {
            $('.informacao').show('slow')
        })
    })
</script>


<div class="container-fluid mt-4">
<?php include_once('painel.php') ?>
    <div class="row mb-4">
        <div class="col-12">
            <div class="card overview">
                <div class="card-body">
                    <h4 class="card-title">Visão Geral</h4>
                    <p class="card-text">Aqui você encontra um resumo das informações mais importantes.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <div class="card entrada shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Entradas</h5>
                    <h4 class="card-value">R$ <span><?= $ganhos = formatarMoeda($ganhos);  ?></span></h4>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <div class="card caixa shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Caixa</h5>
                    <h4 class="card-value text-success">R$ <span><?= $$ganho = formatarMoeda($ganho); ?></span></h4>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <div class="card saida shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Saídas</h5>
                    <h4 class="card-value text-danger">R$ <span><?= $saidas = formatarMoeda($saidas); ?></span></h4>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <div class="card pecas shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Peças</h5>
                    <h4 class="card-value text-primary">R$ <span><?= $gastosPecas = formatarMoeda($gastosPecas); ?></span></h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <div class="card terceiro shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Terceiros</h5>
                    <h4 class="card-value text-warning">R$ <span><?= $gastosterceiros = formatarMoeda($gastosterceiros);     ?></span></h4>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once "include/footer.php"; ?>

</body>
</html>
