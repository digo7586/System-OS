<?php 
require_once "include/cabecalho.php";
require_once "include/menu.php";

// SEPARANDO O ID DO NOME
if(isset($_POST['cliente'])){
    $nomeid = empty($_POST['cliente']) ? Null : $_POST['cliente'];
    $nomeid = explode('+', $nomeid);

    $id_cliente = $nomeid[0];
    $nome_cliente = $nomeid[1];
}

$veiculo = empty($_POST['veiculo']) ? Null : $_POST['veiculo'];
$modelo = empty($_POST['modelo']) ? "Não Informado" : $_POST['modelo'];
$placa = empty($_POST['placa']) ? "Não Informado" : $_POST['placa'];
$km = empty($_POST['km']) ? "Não Informado" : $_POST['km'];

$defeito = empty($_POST['defeito']) ? Null : $_POST['defeito'];
$solucao = empty($_POST['solucao']) ? Null : $_POST['solucao'];
$valor = empty($_POST['valor']) ? 0 : $_POST['valor'];

$qtd = empty($_POST['quantidade']) ? 0 : $_POST['quantidade'];
$pecas_utilizadas = empty($_POST['peca']) ? 
"Não informado" : $_POST['peca'];
$preco_itens = empty($_POST['preco']) ? 0 : $_POST['preco'];


if(isset($_POST['concluir'])){
    // Recuperando os dados dos itens da ordem de serviço
    $qtd_itens = array();
    $pecas_utilizadas = array();
    $preco_itens = array();
    for ($i = 1; $i <= 16; $i++) {
        $qtd_itens[$i] = empty($_POST['qtd-'.$i]) ? 0 : $_POST['qtd-'.$i];
        $pecas_utilizadas[$i] = empty($_POST['peca-'.$i]) ? "" : $_POST['peca-'.$i];
        $preco_itens[$i] = empty($_POST['iten-'.$i]) ? 0 : $_POST['iten-'.$i];
    }

    // Conexão com o banco de dados
    require_once "include/conexao.php";

    // Inserindo a ordem de serviço na tabela "ordem"
    $sql_ordem = "INSERT INTO ordem (veiculo, placa, modelo, km, defeito, solucao, valorTotal, id_cliente, data_entrada) 
                    VALUES ('$veiculo', '$placa', '$modelo', '$km', '$defeito', '$solucao', $valor, $id_cliente, NOW())";

    if(mysqli_query($conn, $sql_ordem)){
        $id_os = mysqli_insert_id($conn); // Obtendo o ID da ordem de serviço inserida
        
        // Inserindo os itens da ordem de serviço na tabela "itens_os"
        for ($i = 1; $i <= 16; $i++) {
            $qtd = $qtd_itens[$i];
            $peca = $pecas_utilizadas[$i];
            $preco = $preco_itens[$i];

            $sql_itens = "INSERT INTO itens_os (idOs, peca, quantidade,  preco) 
                            VALUES ($idOs, '$peca', $qtd,  $preco)";
            mysqli_query($conn, $sql_itens);
        }

        echo "<div class='alert alert-success text-center'>";
        echo "<h2>Ordem de Serviço Salva com Sucesso</h2>";
        echo "</div>";
        echo "<meta http-equiv='Refresh' content='3; nova_os.php?id_cliente=$id_cliente&id_os=$id_os'>";
    }
    else{
        echo "<div class='alert alert-danger text-center'>";
        echo "<h2>ERRO ao Salvar</h2>";
        echo "</div>";
        echo "ERRO" . "<br>" . $sql_ordem . "<br>". mysqli_error($conn);
    }

    // Fechando a conexão com o banco de dados
    mysqli_close($conn);
   
}
?>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" class="col-12 col-md-10 mx-auto my-5">
<h2 class="py-4 mx-auto bg-light text-center mb-4">Ordem de Serviço</h2>
	<div class="form-group">
		<label for='cliente'>Cliente</label>
		<input type="text" name="id_cliente" class="form-control" value="<?php echo $id_cliente;?>" readonly hidden>
		<input type="text" name="nome_cliente" class="form-control" value="<?php echo $nome_cliente;?>" readonly style="background:none;">
	</div>

	<div class="form-row ">
        <div class="form-group col-md-3 col-3">
            <label for="veiculo">veiculo</label>
            <input type="text" name="veiculo" id="veiculo" class="form-control" value="<?php echo $veiculo; ?>" readonly style="background:none;">
        </div>

        <div class="form-group col-md-3 col-3">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo" class="form-control" value="<?php echo $modelo;?>" readonly style="background:none;">
        </div>

        <div class="form-group col-md-3 col-3">
            <label for="placa">placa</label>
            <input type="text" name="placa" id="placa" class="form-control" value="<?php echo $placa;?>" readonly style="background:none;">
        </div>


        <div class="form-group col-md-3 col-3">
            <label for="km">Km</label>
            <input type="text" name="km" id="km" class="form-control" value="<?php echo $km;?>" readonly style="background:none;">
        </div>

    </div>
    <hr>

    <div class="form-row">
        <div class="form-group col-1">
            <label for="priceItens">Qtd</label>
            <input type="text" class="form-control item-input m-2" name="qtd" id="qtd" value="<?php echo $qtd;?>" readonly style="background: none;">
            <input type="text" class="form-control item-input m-2" id="qtd-2">
            <input type="text" class="form-control item-input m-2" id="qtd-3">
            <input type="text" class="form-control item-input m-2" id="qtd-4">
            <input type="text" class="form-control item-input m-2" id="qtd-5">
            <input type="text" class="form-control item-input m-2" id="qtd-6">
            <input type="text" class="form-control item-input m-2" id="qtd-7">
            <input type="text" class="form-control item-input m-2" id="qtd-8">
            <input type="text" class="form-control item-input m-2" id="qtd-9">
            <input type="text" class="form-control item-input m-2" id="qtd-10">
            <input type="text" class="form-control item-input m-2" id="qtd-11">
            <input type="text" class="form-control item-input m-2" id="qtd-12">
            <input type="text" class="form-control item-input m-2" id="qtd-13">
            <input type="text" class="form-control item-input m-2" id="qtd-14">
            <input type="text" class="form-control item-input m-2" id="qtd-15">
            <input type="text" class="form-control item-input m-2" id="qtd-16">
           
        </div>

        <div class="form-group col-8">
            <label for="itens">Peças ultilizadas</label>
            <input type="text" class="form-control m-2" id="peca-1">
            <input type="text" class="form-control m-2" id="peca-2">
            <input type="text" class="form-control m-2" id="peca-3">
            <input type="text" class="form-control m-2" id="peca-4">
            <input type="text" class="form-control m-2" id="peca-5">
            <input type="text" class="form-control m-2" id="peca-6">
            <input type="text" class="form-control m-2" id="peca-7">
            <input type="text" class="form-control m-2" id="peca-8">
            <input type="text" class="form-control m-2" id="peca-9">
            <input type="text" class="form-control m-2" id="peca-10">
            <input type="text" class="form-control m-2" id="peca-11">
            <input type="text" class="form-control m-2" id="peca-12">
            <input type="text" class="form-control m-2" id="peca-13">
            <input type="text" class="form-control m-2" id="peca-14">
            <input type="text" class="form-control m-2" id="peca-15">
            <input type="text" class="form-control m-2" id="peca-16">
            <p class="tItens mt-3">Total em Peças</p>
            <p class="tItens mt-4">Mão de Obra</p>
            <p class="tItens">Terceiros</p>
        </div>

        <div class="form-group col-3">
            <label for="priceItens">Preço</label>
            <input type="text" class="form-control item-input m-2" id="iten-1">
            <input type="text" class="form-control item-input m-2" id="iten-2">
            <input type="text" class="form-control item-input m-2" id="iten-3">
            <input type="text" class="form-control item-input m-2" id="iten-4">
            <input type="text" class="form-control item-input m-2" id="iten-5">
            <input type="text" class="form-control item-input m-2" id="iten-6">
            <input type="text" class="form-control item-input m-2" id="iten-7">
            <input type="text" class="form-control item-input m-2" id="iten-8">
            <input type="text" class="form-control item-input m-2" id="iten-9">
            <input type="text" class="form-control item-input m-2" id="iten-10">
            <input type="text" class="form-control item-input m-2" id="iten-11">
            <input type="text" class="form-control item-input m-2" id="iten-12">
            <input type="text" class="form-control item-input m-2" id="iten-13">
            <input type="text" class="form-control item-input m-2" id="iten-14">
            <input type="text" class="form-control item-input m-2" id="iten-15">
            <input type="text" class="form-control item-input m-2" id="iten-16">
            <input type="text" class="form-control item-input m-2" id="tItens" disabled>
            <input type="text" class="form-control item-input m-2 mt-2" id="tot-mDobra">
            <input type="text" class="form-control item-input m-2 mt-1" id="tot-terceiros">
        </div>    
    </div>


    <div class="form-row">
        <div class="form-group col-6">
            <label for="defeito">Problema apresentado</label>
            <textarea id="defeito" name="defeito" class="form-control" rows="4" readonly style="background:none;"><?php echo $defeito;?></textarea>
        </div>
        <div class="form-group col-6">
            <label for="solucao">Serviço feito</label>
            <textarea id="solucao" name="solucao" class="form-control" rows="4" readonly style="background:none;"><?php echo $solucao;?></textarea>
        </div>
    </div>

    <div class="form-row ">
        <h2 class="col-5 offset-1 text-center pt-2">Valor Total</h2>
        <h2 class="col-1 text-right pt-2 mr-2">R$</h2>
        <input class="col-3" type="text" name="valor" id="valor" value="<?php echo $valor;?>" readonly style="background: none; border: none; font-size: 24pt;">
    </div>
    <div class="form-group">
        <input type="text" name="data" id="data" class="form-control " value="<?php echo "Data de Entrada   " . exibiData($data)?>" readonly style="background:none;border: none; font-size: 14pt;">
    </div>
    <div class="text-center my-4" id="botaoFim">
        <input type="submit" name="concluir" class="btn btn-lg btn-primary" value="Concluir">
        <a href="nova_os.php" class="btn btn-lg btn-danger">Voltar</a>
    </div>
</form>
<?php require_once "include/footer.php";?>
