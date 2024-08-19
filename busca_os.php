<?php
require_once "include/cabecalho.php";
require_once "include/menu.php";


//FINALIZANDO ORDEM DE SERVIÇO E REDIRECIONANDO PARA A TELA DE IMPRESSÃO
if(isset($_POST['finalizar'])){
    $num_os = $_POST['num_os'];
    $id_cliente = $_POST['id'];
    $sql = "UPDATE ordem SET status= 1, data_saida='$data'WHERE id_os = $num_os";
    if(mysqli_query($conn, $sql)){
        echo "<div class='alert alert-success text-center'>";
        echo "<h2>Ordem de Serviço FINALIZADA</h2>";
        echo "</div>";

      /*   echo "<meta http-equiv='Refresh' content='2; busca_os.php?id_os=$num_os&&id_cliente=$id_cliente'>"; */
        echo "<meta http-equiv='Refresh' content='2; abertas.php'>";
    }
    else{
        echo "<div class='alert alert-dark text-center'>";
        echo "<h2>ERRO NA BASE DE DADOS</h2>";
        echo "</div>";
        echo "<br>".mysqli_error($conn);
        exit();
    }
}



//ALTERANDO ORDEM DE SERVIÇO
if(isset($_POST['alterar'])){
    $num_os = $_POST['num_os'];
    $id_cliente = $_POST['id'];
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
    $qtd7 = empty($_POST['qtd9']) ? "" : $_POST['qtd9'];
    $qtd8 = empty($_POST['qtd10']) ? "" : $_POST['qtd10'];
    $qtd1 = empty($_POST['qtd11']) ? "" : $_POST['qtd11'];
    $qtd2 = empty($_POST['qtd12']) ? "" : $_POST['qtd12'];
    $qtd3 = empty($_POST['qtd13']) ? "" : $_POST['qtd13'];
    $qtd4 = empty($_POST['qtd14']) ? "" : $_POST['qtd14'];
    $qtd5 = empty($_POST['qtd15']) ? "" : $_POST['qtd15'];
    $qtd6 = empty($_POST['qtd16']) ? "" : $_POST['qtd16'];

    $peca1 = empty($_POST['peca1']) ? "" : $_POST['peca1'];
    $peca2 = empty($_POST['peca2']) ? "" : $_POST['peca2'];
    $peca3 = empty($_POST['peca3']) ? "" : $_POST['peca3'];
    $peca4 = empty($_POST['peca4']) ? "" : $_POST['peca4'];
    $peca5 = empty($_POST['peca5']) ? "" : $_POST['peca5'];
    $peca6 = empty($_POST['peca6']) ? "" : $_POST['peca6'];
    $peca7 = empty($_POST['peca7']) ? "" : $_POST['peca7'];
    $peca8 = empty($_POST['peca8']) ? "" : $_POST['peca8'];
    $peca7 = empty($_POST['peca9']) ? "" : $_POST['peca9'];
    $peca8 = empty($_POST['peca10']) ? "" : $_POST['peca10'];
    $peca1 = empty($_POST['peca11']) ? "" : $_POST['peca11'];
    $peca2 = empty($_POST['peca12']) ? "" : $_POST['peca12'];
    $peca3 = empty($_POST['peca13']) ? "" : $_POST['peca13'];
    $peca4 = empty($_POST['peca14']) ? "" : $_POST['peca14'];
    $peca5 = empty($_POST['peca15']) ? "" : $_POST['peca15'];
    $peca6 = empty($_POST['peca16']) ? "" : $_POST['peca16'];

    $preco1 = empty($_POST['preco1']) ? "" : $_POST['preco1'];
    $preco2 = empty($_POST['preco2']) ? "" : $_POST['preco2'];
    $preco3 = empty($_POST['preco3']) ? "" : $_POST['preco3'];
    $preco4 = empty($_POST['preco4']) ? "" : $_POST['preco4'];
    $preco5 = empty($_POST['preco5']) ? "" : $_POST['preco5'];
    $preco6 = empty($_POST['preco6']) ? "" : $_POST['preco6'];
    $preco7 = empty($_POST['preco7']) ? "" : $_POST['preco7'];
    $preco8 = empty($_POST['preco8']) ? "" : $_POST['preco8'];
    $preco7 = empty($_POST['preco9']) ? "" : $_POST['preco9'];
    $preco8 = empty($_POST['preco10']) ? "" : $_POST['preco10'];
    $preco1 = empty($_POST['preco11']) ? "" : $_POST['preco11'];
    $preco2 = empty($_POST['preco12']) ? "" : $_POST['preco12'];
    $preco3 = empty($_POST['preco13']) ? "" : $_POST['preco13'];
    $preco4 = empty($_POST['preco14']) ? "" : $_POST['preco14'];
    $preco5 = empty($_POST['preco15']) ? "" : $_POST['preco15'];
    $preco6 = empty($_POST['preco16']) ? "" : $_POST['preco16'];

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



    $sql= "UPDATE ordem SET veiculo='$veiculo', modelo='$modelo', placa='$placa', km='$km', 
    qtd1='$qtd1',
    qtd2='$qtd2',
    qtd3='$qtd3',
    qtd4='$qtd4',
    qtd5='$qtd5',
    qtd6='$qtd6',
    qtd7='$qtd7',
    qtd8='$qtd8',
    qtd9='$qtd9',
    qtd10='$qtd10',
    qtd11='$qtd11',
    qtd12='$qtd12',
    qtd13='$qtd13',
    qtd14='$qtd14',
    qtd15='$qtd15',
    qtd16='$qtd16',
    peca1='$peca1', 
    peca2='$peca2', 
    peca3='$peca3', 
    peca4='$peca4', 
    peca5='$peca5', 
    peca6='$peca6',
    peca7='$peca7',
    peca8='$peca8',
    peca9='$peca9', 
    peca10='$peca10', 
    peca11='$peca11', 
    peca12='$peca12', 
    peca13='$peca13', 
    peca14='$peca14', 
    peca15='$peca15', 
    peca16='$peca16',
    preco1='$preco1', 
    preco2='$preco2', 
    preco3='$preco3', 
    preco4='$preco4', 
    preco5='$preco5', 
    preco6='$preco6', 
    preco7='$preco7', 
    preco8='$preco8',
    preco9='$preco9', 
    preco10='$preco10', 
    preco11='$preco11', 
    preco12='$preco12', 
    preco13='$preco13', 
    preco14='$preco14', 
    preco15='$preco15', 
    preco16='$preco16',
    qtdTotal1='$qtdTotal1',
    qtdTotal2='$qtdTotal2',
    qtdTotal3='$qtdTotal3',
    qtdTotal4='$qtdTotal4',
    qtdTotal5='$qtdTotal5',
    qtdTotal6='$qtdTotal6',
    qtdTotal7='$qtdTotal7',
    qtdTotal8='$qtdTotal8',
    qtdTotal9='$qtdTotal9',
    qtdTotal10='$qtdTotal10',
    qtdTotal11='$qtdTotal11',
    qtdTotal12='$qtdTotal12',
    qtdTotal13='$qtdTotal13',
    qtdTotal14='$qtdTotal14',
    qtdTotal15='$qtdTotal15',
    qtdTotal16='$qtdTotal16',
    valorPecas='$pecas', 
    valorMobra='$Mobra',
    valorTerceiros='$terceiros',
    defeito='$defeito',
    solucao='$solucao',
    valorTotal=$valor WHERE id_os = $num_os";

    if(mysqli_query($conn, $sql)){
        echo "<div class='alert alert-warning text-center'>";
        echo "<h2>Ordem de Serviço ALTERADA</h2>";
        echo "</div>";
        echo "<meta http-equiv='Refresh' content='2; abertas.php'>";
    }
    else{
        echo "<div class='alert alert-dark text-center'>";
        echo "<h2>ERRO NA BASE DE DADOS CONTATE UM TÉCNICO</h2>";
        echo "</div>";
        echo "<br>".mysqli_error($conn);
        exit();
    }



}

//DELETANDO ORDEM DE SERVIÇO
if(isset($_POST['deletar'])){
    $num_os = $_POST['num_os'];
    $sql = "DELETE FROM ordem WHERE id_os = $num_os";
    if(mysqli_query($conn, $sql)){
        echo "<div class='alert alert-danger text-center'>";
        echo "<h2>Ordem de Serviço DELETADA</h2>";
        echo "</div>";
        echo "<meta http-equiv='Refresh' content='3; abertas.php'>";
    }
    else{
        echo "<div class='alert alert-dark text-center'>";
        echo "<h2>ERRO NA BASE DE DADOS CONTATE UM TÉCNICO</h2>";
        echo "</div>";
        echo "<br>".mysqli_error($conn);
        exit();
    }
}


//BUSCANDO E EXIBINDO ORDEM DE SERVIÇO
if((isset($_POST['num_os']) && isset($_POST['buscar'])) || isset($_GET['num_os'])){
    $num_os = empty($_POST['num_os'])?$_GET['num_os']:$_POST['num_os'] ;
    $sql = "SELECT * FROM ordem INNER JOIN clientes ON ordem.id_cliente = clientes.id WHERE ordem.id_os =$num_os";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $dados = mysqli_fetch_assoc($result);
    }
    else{
        echo "<div class='alert alert-secondary text-center'>";
        echo "<h2>Ordem de Serviço NÃO EXISTE</h2>";
        echo "</div>";
        echo "<meta http-equiv='Refresh' content='2; busca_os.php'>";
        exit();
    }
 
// Verifica se o campo não está vazio ou é zero antes de exibi-lo
function exibirCampo($valor) {
    return !empty($valor) && $valor != 0 ? $valor : '';
}
?>

<!-- //FORM PARA EXIBIÇÃO DOS DADOS -->

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="border mx-auto col-md-8 col-12 bg-light font-arial rounded my-4">
    <div class="card-container">
        <div>

            <img src="assets/img/autome.png" class="logoForm" alt="logo">
        </div>


        <div class="texto">
            <h2 class="title">AUTOMECÂNICA DO GORDO</h2>
            <span class="icon-text">
                <i class="fa-brands fa-whatsapp"></i>
                <p class="phone">(19) 98348-2130</p>
            </span>
            <span class="icon-text">
                <i class="fa-solid fa-location-dot"></i>
                <p class="address">Rua Pedro Gonçalves de Lima, 735</p>
            </span>
            <p class="address">Residencial Cidade Nova - Iracemápolis</p>
        </div>

    </div>
        <h3 class="pt-5 pb-3 mx-auto bg-light text-center mb-4">Buscar Ordem de Serviço</h3>
        <div class="form-group">
            <label for="num_os">Nº Ordem de Serviço</label><br>
            <input type="text" name="num_os" id="num_os" class="form-control col-5" value="<?php echo $num_os ?>" readonly>
        </div>
        <div class="form-group">
            <label for="cliente">Cliente</label>
            <input type="text" name="id"class="form-control" value="<?php echo $dados['id'] ?>" hidden>
            <input type="text" name="cliente" id="cliente" class="form-control" value="<?php echo $dados['nome'] ?>" readonly>
        </div>

        <div class="form-row ">
            <div class="form-group col-md-3 col-3">
                <label for="veiculo">veiculo</label>
                <input type="text" name="veiculo" id="veiculo" class="form-control" value="<?php echo $dados['veiculo'] ?>">
            </div>

            <div class="form-group col-md-3 col-3">
                <label for="modelo">Modelo</label>
                <input type="text" name="modelo" id="modelo" class="form-control" value="<?php echo $dados['modelo'] ?>">
            </div>

            <div class="form-group col-md-3 col-3">
                <label for="placa">placa</label>
                <input type="text" name="placa" id="placa" class="form-control" value="<?php echo $dados['placa'] ?>">
            </div>


            <div class="form-group col-md-3 col-3">
                <label for="km">Km</label>
                <input type="text" name="km" id="km" class="form-control" value="<?php echo $dados['km'] ?>">
            </div>

        </div>
        <hr>

        <div class="form-row">
       
        <div class="form-group col-4">
            <label for="itens">Peças utilizadas</label>
            <input type="text" class="form-control hide m-2" name="peca1" id="peca-1" value="<?php echo $dados['peca1'];?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca2" id="peca-2" value="<?php echo $dados['peca2'];?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca3" id="peca-3" value="<?php echo $dados['peca3'];?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca4" id="peca-4" value="<?php echo $dados['peca4'];?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca5" id="peca-5" value="<?php echo $dados['peca5'];?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca6" id="peca-6" value="<?php echo $dados['peca6'];?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca7" id="peca-7" value="<?php echo $dados['peca7'];?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca8" id="peca-8" value="<?php echo $dados['peca8'];?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca9" id="peca-9" value="<?php echo $dados['peca9'];?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca10" id="peca-10" value="<?php echo $dados['peca10'];?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca11" id="peca-11" value="<?php echo $dados['peca11'];?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca12" id="peca-12" value="<?php echo $dados['peca12'];?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca13" id="peca-13" value="<?php echo $dados['peca13'];?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca14" id="peca-14" value="<?php echo $dados['peca14'];?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca15" id="peca-15" value="<?php echo $dados['peca15'];?>" readonly>
            <input type="text" class="form-control hide m-2" name="peca16" id="peca-16" value="<?php echo $dados['peca16'];?>" readonly>
           
            
        </div>

        <div class="form-group col-1">
            <label for="priceItens">Qtd</label>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd1" id="qtd1" value="<?php echo exibirCampo($dados['qtd1']);?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd2" id="qtd2" value="<?php echo exibirCampo($dados['qtd2']);?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd3" id="qtd3" value="<?php echo exibirCampo($dados['qtd3']);?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd4" id="qtd4" value="<?php echo exibirCampo($dados['qtd4']);?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd5" id="qtd5" value="<?php echo exibirCampo($dados['qtd5']);?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd6" id="qtd6" value="<?php echo exibirCampo($dados['qtd6']);?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd7" id="qtd7" value="<?php echo exibirCampo($dados['qtd7']);?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd8" id="qtd8" value="<?php echo exibirCampo($dados['qtd8']);?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd9" id="qtd9" value="<?php echo exibirCampo($dados['qtd9']);?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd10" id="qtd10" value="<?php echo exibirCampo($dados['qtd10']);?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd11" id="qtd11" value="<?php echo exibirCampo($dados['qtd11']);?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd12" id="qtd12" value="<?php echo exibirCampo($dados['qtd12']);?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd13" id="qtd13" value="<?php echo exibirCampo($dados['qtd13']);?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd14" id="qtd14" value="<?php echo exibirCampo($dados['qtd14']);?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd15" id="qtd15" value="<?php echo exibirCampo($dados['qtd15']);?>" readonly>
            <input type="text" class="form-control hide qtd-input m-2" name="qtd16" id="qtd16" value="<?php echo exibirCampo($dados['qtd16']);?>" readonly>
           
           
        </div>

        <div class="form-group col-2">
            <label for="qtdItens">Valor (Un)</label>
            <input type="text" class="form-control hide valor-inputs m-2" name="qtdTotal1" id="qtdTotal1" value="<?php echo exibirCampo($dados['preco1']);?>" readonly>
            <input type="text" class="form-control hide valor-inputs m-2" name="qtdTotal2" id="qtdTotal2" value="<?php echo exibirCampo($dados['preco2']);?>" readonly>
            <input type="text" class="form-control hide valor-inputs m-2" name="qtdTotal3" id="qtdTotal3" value="<?php echo exibirCampo($dados['preco3']);?>" readonly>
            <input type="text" class="form-control hide valor-inputs m-2" name="qtdTotal4" id="qtdTotal4" value="<?php echo exibirCampo($dados['preco4']);?>" readonly>
            <input type="text" class="form-control hide valor-inputs m-2" name="qtdTotal5" id="qtdTotal5" value="<?php echo exibirCampo($dados['preco5']);?>" readonly>
            <input type="text" class="form-control hide valor-inputs m-2" name="qtdTotal6" id="qtdTotal6" value="<?php echo exibirCampo($dados['preco6']);?>" readonly>
            <input type="text" class="form-control hide valor-inputs m-2" name="qtdTotal7" id="qtdTotal7" value="<?php echo exibirCampo($dados['preco7']);?>" readonly>
            <input type="text" class="form-control hide valor-inputs m-2" name="qtdTotal8" id="qtdTotal8" value="<?php echo exibirCampo($dados['preco8']);?>" readonly>
            <input type="text" class="form-control hide valor-inputs m-2" name="qtdTotal9" id="qtdTotal9" value="<?php echo exibirCampo($dados['preco9']);?>" readonly>
            <input type="text" class="form-control hide valor-inputs m-2" name="qtdTotal10" id="qtdTotal10" value="<?php echo exibirCampo($dados['preco10']);?>" readonly>
            <input type="text" class="form-control hide valor-inputs m-2" name="qtdTotal11" id="qtdTotal11" value="<?php echo exibirCampo($dados['preco11']);?>" readonly>
            <input type="text" class="form-control hide valor-inputs m-2" name="qtdTotal12" id="qtdTotal12" value="<?php echo exibirCampo($dados['preco12']);?>" readonly>
            <input type="text" class="form-control hide valor-inputs m-2" name="qtdTotal13" id="qtdTotal13" value="<?php echo exibirCampo($dados['preco13']);?>" readonly>
            <input type="text" class="form-control hide valor-inputs m-2" name="qtdTotal14" id="qtdTotal14" value="<?php echo exibirCampo($dados['preco14']);?>" readonly>
            <input type="text" class="form-control hide valor-inputs m-2" name="qtdTotal15" id="qtdTotal15" value="<?php echo exibirCampo($dados['preco15']);?>" readonly>
            <input type="text" class="form-control hide valor-inputs m-2" name="qtdTotal16" id="qtdTotal16" value="<?php echo exibirCampo($dados['preco16']);?>" readonly>
            <br>
            <p class="tItens mt-2">Total em Peças</p>
            <p class="tItens">Mão de Obra</p>
            <p class="tItens">Terceiros</p>
        </div>

       

       

        <div class="form-group col-3">
            <label for="priceItens">Total</label>
            <input type="text" class="form-control hide item-input m-2" name="preco1" id="iten-1" value="<?php echo exibirCampo($dados['qtdTotal1']);?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco2" id="iten-2" value="<?php echo exibirCampo($dados['qtdTotal2']);?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco3" id="iten-3" value="<?php echo exibirCampo($dados['qtdTotal3']);?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco4" id="iten-4" value="<?php echo exibirCampo($dados['qtdTotal4']);?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco5" id="iten-5" value="<?php echo exibirCampo($dados['qtdTotal5']);?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco6" id="iten-6" value="<?php echo exibirCampo($dados['qtdTotal6']);?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco7" id="iten-7" value="<?php echo exibirCampo($dados['qtdTotal7']);?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco8" id="iten-8" value="<?php echo exibirCampo($dados['qtdTotal8']);?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco9" id="iten-9" value="<?php echo exibirCampo($dados['qtdTotal9']);?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco10" id="iten-10" value="<?php echo exibirCampo($dados['qtdTotal10']);?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco11" id="iten-11" value="<?php echo exibirCampo($dados['qtdTotal11']);?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco12" id="iten-12" value="<?php echo exibirCampo($dados['qtdTotal12']);?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco13" id="iten-13" value="<?php echo exibirCampo($dados['qtdTotal13']);?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco14" id="iten-14" value="<?php echo exibirCampo($dados['qtdTotal14']);?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco15" id="iten-15" value="<?php echo exibirCampo($dados['qtdTotal15']);?>" readonly>
            <input type="text" class="form-control hide item-input m-2" name="preco16" id="iten-16" value="<?php echo exibirCampo($dados['qtdTotal16']);?>" readonly>
            <br>

            <input type="text" class="form-control item-input m-2" name="totpecas" id="tItens" value="<?php echo $dados['valorPecas'];?>" readonly>
            <input type="text" class="form-control item-input m-2" name="totmDobra" id="tot-mDobra" value="<?php echo $dados['valorMobra'];?>" readonly>
            <input type="text" class="form-control item-input m-2" name="totterceiros" id="tot-terceiros" value="<?php echo exibirCampo($dados['valorTerceiros']);?>" readonly>
        </div>    

       

       

        
    </div>

        <div class="form-row">
            <div class="form-group col-6">
                <label for="defeito">Problema apresentado</label>
                <textarea id="defeito" class="form-control" rows="4" name="defeito"><?php echo $dados['defeito'] ?></textarea>
            </div>
            <div class="form-group col-6">
                <label for="solucao">Serviço feito</label>
                <textarea id="solucao" class="form-control" rows="4" name="solucao"><?php echo $dados['solucao'] ?></textarea>
            </div>
        </div>

        <div class="form-row">
            <h2 class="col-6 text-center pt-2">Valor total</h2>
            <span class="col-2" style="margin-top: 12px;">R$</span><input type="text" name="valor" id="valor" value="<?php echo $dados['valorTotal'] ?>" class="col-4" style="border:none;background: none;">
        </div>
        <div class="form-row ">
            <div class="form-group col-6">
                <input type="text" name="data" id="data" class="form-control data" value="<?php echo "Entrada: " . exibiData($dados['data_entrada'])?>" readonly style="background:none;border: none;">
            </div>
            <div class="form-group col-6">
                <input type="text" name="data" id="data" class="form-control data" value="<?php echo "Saida: " . empty($dados['data_saida'])?Null: exibiData($dados['data_saida']) ?>" readonly style="background:none;border: none;">
            </div>
        </div>
        <div class="text-center">
            <?php
                if($dados['status']){
                    echo "<h2 class='text-success imprimir'>Finalizada</h2>";
                }
                else{
                    echo "<h2 class='text-danger imprimir'>Aberta</h2>";
                }

            ?>
        </div>
        <div class="text-center my-4">
            <?php
                if($dados['status']){
                    echo '<input type="button" class="btn btn-lg btn-primary m-1 imprimir" value="Imprimir" onclick="imprimir()">';
                    echo '<input type="submit" name="deletar"  class="btn btn-lg btn-danger m-1 imprimir" value="Deletar">';
                    echo '<input type="submit" name="voltar" class="btn btn-lg btn-secondary m-1 imprimir" value="Voltar">';
                }
                else{
                    ?>
                    <div id="botaoFim">
                        <input type="submit" name="finalizar" class="btn btn-lg btn-success m-1" value="Finalizar">
                        <input type="submit" name="alterar" class="btn btn-lg btn-warning m-1" value="Alterar">
                        <input type="button" class="btn btn-lg btn-primary m-1" value="Imprimir" onclick="imprimir()">
                        <input type="submit" name="deletar"  class="btn btn-lg btn-danger m-1" value="Deletar">
                        <input type="submit" name="voltar" class="btn btn-lg btn-secondary m-1" value="Voltar">
                    </div>
                    <?php
                }
            ?>

        </div>
    </form>





<?php
}
//FORM PARA BUSCA DA ORDEM DE SERVIÇO
else{
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="border mx-auto col-md-8 col-12 bg-light font-arial my-4">
        <h2 class="pt-5 pb-3 mx-auto bg-light text-center mb-4">Buscar Ordem de Serviço</h2>
        <div class="form-group">
            <label for="num_os">Nº Ordem de Serviço</label>
            <input type="text" name="num_os" id="num_os" class="form-control col-5">
        </div>
       
        
        <div class="my-4">
            <button class="btn btn-lg btn-primary text-center" name="buscar">Buscar</button>
        </div>
    </form>

<?php
}
require_once "include/footer.php";
?>

<script src="assets/js/imprimir.js"></script>
<script src="assets/js/escondeImput.js"></script>

