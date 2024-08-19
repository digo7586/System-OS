
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

$qtd1 = empty($_POST['qtd1']) ? "" : $_POST['qtd1'];
$qtd2 = empty($_POST['qtd2']) ? "" : $_POST['qtd2'];
$qtd3 = empty($_POST['qtd3']) ? "" : $_POST['qtd3'];
$qtd4 = empty($_POST['qtd4']) ? "" : $_POST['qtd4'];
$qtd5 = empty($_POST['qtd5']) ? "" : $_POST['qtd5'];
$qtd6 = empty($_POST['qtd6']) ? "" : $_POST['qtd6'];
$qtd7 = empty($_POST['qtd7']) ? "" : $_POST['qtd7'];
$qtd8 = empty($_POST['qtd8']) ? "" : $_POST['qtd8'];
$qtd9 = empty($_POST['qtd9']) ? "" : $_POST['qtd9'];
$qtd10 = empty($_POST['qtd10']) ? "" : $_POST['qtd10'];
$qtd11 = empty($_POST['qtd11']) ? "" : $_POST['qtd11'];
$qtd12 = empty($_POST['qtd12']) ? "" : $_POST['qtd12'];
$qtd13 = empty($_POST['qtd13']) ? "" : $_POST['qtd13'];
$qtd14 = empty($_POST['qtd14']) ? "" : $_POST['qtd14'];
$qtd15 = empty($_POST['qtd15']) ? "" : $_POST['qtd15'];
$qtd16 = empty($_POST['qtd16']) ? "" : $_POST['qtd16'];


$peca1 = empty($_POST['peca1']) ? "" : $_POST['peca1'];
$peca2 = empty($_POST['peca2']) ? "" : $_POST['peca2'];
$peca3 = empty($_POST['peca3']) ? "" : $_POST['peca3'];
$peca4 = empty($_POST['peca4']) ? "" : $_POST['peca4'];
$peca5 = empty($_POST['peca5']) ? "" : $_POST['peca5'];
$peca6 = empty($_POST['peca6']) ? "" : $_POST['peca6'];
$peca7 = empty($_POST['peca7']) ? "" : $_POST['peca7'];
$peca8 = empty($_POST['peca8']) ? "" : $_POST['peca8'];
$peca9 = empty($_POST['peca9']) ? "" : $_POST['peca9'];
$peca10 = empty($_POST['peca10']) ? "" : $_POST['peca10'];
$peca11 = empty($_POST['peca11']) ? "" : $_POST['peca11'];
$peca12 = empty($_POST['peca12']) ? "" : $_POST['peca12'];
$peca13 = empty($_POST['peca13']) ? "" : $_POST['peca13'];
$peca14 = empty($_POST['peca14']) ? "" : $_POST['peca14'];
$peca15 = empty($_POST['peca15']) ? "" : $_POST['peca15'];
$peca16 = empty($_POST['peca16']) ? "" : $_POST['peca16'];



$preco1 = empty($_POST['preco1']) ? "" : $_POST['preco1'];
$preco2 = empty($_POST['preco2']) ? "" : $_POST['preco2'];
$preco3 = empty($_POST['preco3']) ? "" : $_POST['preco3'];
$preco4 = empty($_POST['preco4']) ? "" : $_POST['preco4'];
$preco5 = empty($_POST['preco5']) ? "" : $_POST['preco5'];
$preco6 = empty($_POST['preco6']) ? "" : $_POST['preco6'];
$preco7 = empty($_POST['preco7']) ? "" : $_POST['preco7'];
$preco8 = empty($_POST['preco8']) ? "" : $_POST['preco8'];
$preco9 = empty($_POST['preco9']) ? "" : $_POST['preco9'];
$preco10 = empty($_POST['preco10']) ? "" : $_POST['preco10'];
$preco11 = empty($_POST['preco11']) ? "" : $_POST['preco11'];
$preco12 = empty($_POST['preco12']) ? "" : $_POST['preco12'];
$preco13 = empty($_POST['preco13']) ? "" : $_POST['preco13'];
$preco14 = empty($_POST['preco14']) ? "" : $_POST['preco14'];
$preco15 = empty($_POST['preco15']) ? "" : $_POST['preco15'];
$preco16 = empty($_POST['preco16']) ? "" : $_POST['preco16'];



$qtdTotal1 = empty($_POST['qtdTotal1']) ? "" : $_POST['qtdTotal1'];
$qtdTotal2 = empty($_POST['qtdTotal2']) ? "" : $_POST['qtdTotal2'];
$qtdTotal3 = empty($_POST['qtdTotal3']) ? "" : $_POST['qtdTotal3'];
$qtdTotal4 = empty($_POST['qtdTotal4']) ? "" : $_POST['qtdTotal4'];
$qtdTotal5 = empty($_POST['qtdTotal5']) ? "" : $_POST['qtdTotal5'];
$qtdTotal6 = empty($_POST['qtdTotal6']) ? "" : $_POST['qtdTotal6'];
$qtdTotal7 = empty($_POST['qtdTotal7']) ? "" : $_POST['qtdTotal7'];
$qtdTotal8 = empty($_POST['qtdTotal8']) ? "" : $_POST['qtdTotal8'];
$qtdTotal9 = empty($_POST['qtdTotal9']) ? "" : $_POST['qtdTotal9'];
$qtdTotal10 = empty($_POST['qtdTotal10']) ? "" : $_POST['qtdTotal10'];
$qtdTotal11 = empty($_POST['qtdTotal11']) ? "" : $_POST['qtdTotal11'];
$qtdTotal12 = empty($_POST['qtdTotal12']) ? "" : $_POST['qtdTotal12'];
$qtdTotal13 = empty($_POST['qtdTotal13']) ? "" : $_POST['qtdTotal13'];
$qtdTotal14 = empty($_POST['qtdTotal14']) ? "" : $_POST['qtdTotal14'];
$qtdTotal15 = empty($_POST['qtdTotal15']) ? "" : $_POST['qtdTotal15'];
$qtdTotal16 = empty($_POST['qtdTotal16']) ? "" : $_POST['qtdTotal16'];


$pecas = empty($_POST['totpecas']) ? "" : $_POST['totpecas'];
$Mobra = empty($_POST['totmDobra']) ? "" : $_POST['totmDobra'];
$terceiros = empty($_POST['totterceiros']) ? "" : $_POST['totterceiros'];

$defeito = empty($_POST['defeito']) ? Null : $_POST['defeito'];
$solucao = empty($_POST['solucao']) ? Null : $_POST['solucao'];
$valor = empty($_POST['valor']) ? 0 : $_POST['valor'];

if(isset($_POST['concluir'])){
    $nome_cliente = $_POST['nome_cliente'];
    $id_cliente = $_POST['id_cliente'];
    $data = date("Y-m-d"); // Adicionei a obtenção da data atual

    $sql = "INSERT INTO ordem 
            (veiculo, modelo, placa, km, qtd1, qtd2, qtd3, qtd4, qtd5, qtd6, qtd7, qtd8, qtd9, qtd10, qtd11, qtd12, qtd13, qtd14, qtd15, qtd16, 
            peca1, peca2, peca3, peca4, peca5, peca6, peca7, peca8, peca9, peca10, peca11, peca12, peca13, peca14, peca15, peca16, 
            preco1, preco2, preco3, preco4, preco5, preco6, preco7, preco8, preco9, preco10, preco11, preco12, preco13, preco14, preco15, preco16,
            qtdTotal1, qtdTotal2, qtdTotal3, qtdTotal4, qtdTotal5, qtdTotal6, qtdTotal7, qtdTotal8, qtdTotal9,
            qtdTotal10, qtdTotal11, qtdTotal12, qtdTotal13, qtdTotal14, qtdTotal15, qtdTotal16,
            valorPecas, valorMobra, valorTerceiros, defeito, solucao, valorTotal, status, id_cliente, data_entrada) 
            VALUES 
            ('$veiculo', '$modelo', '$placa', '$km', '$qtd1', '$qtd2', '$qtd3', '$qtd4', '$qtd5', '$qtd6', '$qtd7', '$qtd8', '$qtd9', '$qtd10', '$qtd11', '$qtd12', '$qtd13', '$qtd14', '$qtd15', '$qtd16', 
            '$peca1', '$peca2', '$peca3', '$peca4', '$peca5', '$peca6', '$peca7', '$peca8', '$peca9', '$peca10', '$peca11', '$peca12', '$peca13', '$peca14', '$peca15', '$peca16',  
            '$preco1', '$preco2', '$preco3', '$preco4', '$preco5', '$preco6', '$preco7', '$preco8', '$preco9', '$preco10','$preco11', '$preco12', '$preco13', '$preco14', '$preco15', '$preco16',
            '$qtdTotal1', '$qtdTotal2', '$qtdTotal3', '$qtdTotal4', '$qtdTotal5', '$qtdTotal6',
            '$qtdTotal7', '$qtdTotal8', '$qtdTotal9', '$qtdTotal10', '$qtdTotal11', '$qtdTotal12',
            '$qtdTotal13', '$qtdTotal14', '$qtdTotal15', '$qtdTotal16',
            '$pecas', '$Mobra', '$terceiros', '$defeito', '$solucao', '$valor', 0, '$id_cliente', '$data')";

    if(mysqli_query($conn,$sql)){
        $id_os = mysqli_insert_id($conn);
        echo "<div class='alert alert-success text-center'>";
        echo "<h2>Ordem de Serviço Salva com Sucesso</h2>";
        echo "</div>";
        echo "<meta http-equiv='Refresh' content='2; abertas.php?id_cliente=$id_cliente&id_os=$id_os'>";
    }
    else{
        echo "<div class='alert alert-danger text-center'>";
        echo "<h2>ERRO ao Salvar</h2>";
        echo "</div>";
        echo "ERRO" . "<br>" . $sql . "<br>". mysqli_error($conn);
    }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="col-12 col-md-10 mx-auto my-5">
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
        

        <div class="form-group col-6">
            <label for="itens">Peças utilizadas</label>
            <input type="text" class="form-control hide m-2" name="peca1" id="peca-1" value="<?php echo $peca1;?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca2" id="peca-2" value="<?php echo $peca2;?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca3" id="peca-3" value="<?php echo $peca3;?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca4" id="peca-4" value="<?php echo $peca4;?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca5" id="peca-5" value="<?php echo $peca5;?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca6" id="peca-6" value="<?php echo $peca6;?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca7" id="peca-7" value="<?php echo $peca7;?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca8" id="peca-8" value="<?php echo $peca8;?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca9" id="peca-9" value="<?php echo $peca9;?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca10" id="peca-10" value="<?php echo $peca10;?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca11" id="peca-11" value="<?php echo $peca11;?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca12" id="peca-12" value="<?php echo $peca12;?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca13" id="peca-13" value="<?php echo $peca13;?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca14" id="peca-14" value="<?php echo $peca14;?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca15" id="peca-15" value="<?php echo $peca15;?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca16" id="peca-16" value="<?php echo $peca16;?>" readonly>
            
           
        </div>

        <div class="form-group col-2">
            <label for="priceItens">Preço (Un)</label>
            <input type="text" class="form-control hide item-input m-2" name="preco1" id="iten-1" value="<?php echo $preco1;?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco2" id="iten-2" value="<?php echo $preco2;?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco3" id="iten-3" value="<?php echo $preco3;?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco4" id="iten-4" value="<?php echo $preco4;?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco5" id="iten-5" value="<?php echo $preco5;?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco6" id="iten-6" value="<?php echo $preco6;?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco7" id="iten-7" value="<?php echo $preco7;?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco8" id="iten-8" value="<?php echo $preco8;?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco9" id="iten-9" value="<?php echo $preco9;?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco10" id="iten-10" value="<?php echo $preco10;?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco11" id="iten-11" value="<?php echo $preco11;?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco12" id="iten-12" value="<?php echo $preco12;?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco13" id="iten-13" value="<?php echo $preco13;?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco14" id="iten-14" value="<?php echo $preco14;?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco15" id="iten-15" value="<?php echo $preco15;?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco16" id="iten-16" value="<?php echo $preco16;?>" readonly>
           

           
        </div>
        
        <div class="form-group col-1">
            <label for="priceItens">Qtd</label>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd1" id="qtd1"  value="<?php echo $qtd1;?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd2" id="qtd2"  value="<?php echo $qtd2;?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd3" id="qtd3"  value="<?php echo $qtd3;?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd4" id="qtd4"  value="<?php echo $qtd4;?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd5" id="qtd5"  value="<?php echo $qtd5;?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd6" id="qtd6"  value="<?php echo $qtd6;?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd7" id="qtd7"  value="<?php echo $qtd7;?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd8" id="qtd8"  value="<?php echo $qtd8;?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd9" id="qtd9"  value="<?php echo $qtd9;?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd10" id="qtd10"  value="<?php echo $qtd10;?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd11" id="qtd11"  value="<?php echo $qtd11;?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd12" id="qtd12"  value="<?php echo $qtd12;?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd13" id="qtd13"  value="<?php echo $qtd13;?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd14" id="qtd14"  value="<?php echo $qtd14;?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd15" id="qtd15"  value="<?php echo $qtd15;?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd16" id="qtd16"  value="<?php echo $qtd16;?>" readonly>
            <br>
            <p class="tItens mt-3">Total em peças</p>
            <p class="tItens mt-4">Mão de Obra</p>
            <p class="tItens mt-4">Terceiros</p>
           
        </div>

        <div class="form-group col-1">
            <label for="qtdItens">Total</label>
            <input type="text" class="form-control hide qtdTotal-input m-2" name="qtdTotal1" id="qtdTotal1" value="<?php echo $qtdTotal1;?>" readonly>
            <input type="text" class="form-control hide qtdTotal-input m-2" name="qtdTotal2" id="qtdTotal2" value="<?php echo $qtdTotal2;?>" readonly>
            <input type="text" class="form-control hide qtdTotal-input m-2" name="qtdTotal3" id="qtdTotal3" value="<?php echo $qtdTotal3;?>" readonly>
            <input type="text" class="form-control hide qtdTotal-input m-2" name="qtdTotal4" id="qtdTotal4" value="<?php echo $qtdTotal4;?>" readonly>
            <input type="text" class="form-control hide qtdTotal-input m-2" name="qtdTotal5" id="qtdTotal5" value="<?php echo $qtdTotal5;?>" readonly>
            <input type="text" class="form-control hide qtdTotal-input m-2" name="qtdTotal6" id="qtdTotal6" value="<?php echo $qtdTotal6;?>" readonly>
            <input type="text" class="form-control hide qtdTotal-input m-2" name="qtdTotal7" id="qtdTotal7" value="<?php echo $qtdTotal7;?>" readonly>
            <input type="text" class="form-control hide qtdTotal-input m-2" name="qtdTotal8" id="qtdTotal8" value="<?php echo $qtdTotal8;?>" readonly>
            <input type="text" class="form-control hide qtdTotal-input m-2" name="qtdTotal9" id="qtdTotal9" value="<?php echo $qtdTotal9;?>" readonly>
            <input type="text" class="form-control hide qtdTotal-input m-2" name="qtdTotal10" id="qtdTotal10" value="<?php echo $qtdTotal10;?>" readonly>
            <input type="text" class="form-control hide qtdTotal-input m-2" name="qtdTotal11" id="qtdTotal11" value="<?php echo $qtdTotal11;?>" readonly>
            <input type="text" class="form-control hide qtdTotal-input m-2" name="qtdTotal12" id="qtdTotal12" value="<?php echo $qtdTotal12;?>" readonly>
            <input type="text" class="form-control hide qtdTotal-input m-2" name="qtdTotal13" id="qtdTotal13" value="<?php echo $qtdTotal13;?>" readonly>
            <input type="text" class="form-control hide qtdTotal-input m-2" name="qtdTotal14" id="qtdTotal14" value="<?php echo $qtdTotal14;?>" readonly>
            <input type="text" class="form-control hide qtdTotal-input m-2" name="qtdTotal15" id="qtdTotal15" value="<?php echo $qtdTotal15;?>" readonly>
            <input type="text" class="form-control hide qtdTotal-input m-2" name="qtdTotal16" id="qtdTotal16" value="<?php echo $qtdTotal16;?>" readonly>
            <br>
            <input type="text" class="form-control item-input m-2" name="totpecas" id="tItens" value="<?php echo $pecas;?>" readonly>
            <input type="text" class="form-control item-input m-2 mt-2" name="totmDobra" id="tot-mDobra" value="<?php echo $Mobra;?>" readonly>
            <input type="text" class="form-control item-input m-2 mt-2" name="totterceiros" id="tot-terceiros" value="<?php echo $terceiros;?>" readonly>
    
           
           
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
        <h2 class="col-5 offset-1 text-center pt-2">Valor total</h2>
        <h2 class="col-1 text-right pt-2 mr-2">R$</h2>
        <input class="col-3" type="text" name="valor" id="valor" value="<?php echo $valor;?>" readonly style="background: none; border: none; font-size: 24pt;">
    </div>
    <div class="form-group">
        <input type="text" name="data" id="data" class="form-control " value="<?php echo "Data de Entrada   " . date('d/m/Y');?>" readonly style="background:none;border: none; font-size: 14pt;">
    </div>
    <div class="text-center my-4" id="botaoFim">
        <input type="submit" name="concluir" class="btn btn-lg btn-primary" value="Concluir">
        <input type="button" class="btn btn-lg btn-warning" value="Imprimir" onclick="imprimir()">
        <a href="nova_os.php" class="btn btn-lg btn-danger">Voltar</a>
    </div>
</form>

<?php require_once "include/footer.php";?>

<script src="assets/js/imprimir.js"></script>
<script src="assets/js/escondeImput.js"></script>