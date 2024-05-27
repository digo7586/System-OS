<?php
require_once "include/cabecalho.php";
require_once "include/menu.php";

$result = todosClientes($conn);
?>

<!-- Criar nova ordem de serviço -->

<form action="salvar_os.php" method="POST" class="border mx-auto col-md-8 col-12 bg-light font-arial my-4 rounded">
    <div class="hero">
        <img src="assets/img/autome.png" style="width:8.7rem" alt="logo">
    </div>
    <h2 class="pt-5 pb-3 mx-auto bg-light text-center mb-4">Nova Ordem de Serviço</h2>
    <div class="form-group">
        <label for="cliente">Cliente</label>
        <select class="custom-select form-control" name="cliente">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['id'] . "+" . $row['nome'] . "'>" . $row['nome'] . "</option>";
                }
            } else {
                echo "<option>Não Existe Clientes Cadastrados</option>";
            }
            ?>
        </select>
    </div>


    <div class="form-row ">
        <div class="form-group col-md-3 col-3">
            <label for="veiculo">Veiculo</label>
            <select name="veiculo" class="custom-select form-control" id="veiculo">
                <option value="Carro">Carro</option>
                <option value="Moto">Moto</option>
                <option value="Caminhão">Caminhão</option>
            </select>
        </div>

        <div class="form-group col-md-3 col-3">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo" class="form-control">
        </div>

        <div class="form-group col-md-3 col-3">
            <label for="placa">Placa</label>
            <input type="text" name="placa" id="placa" class="form-control">
        </div>

        <div class="form-group col-md-3 col-3">
            <label for="km">Km</label>
            <input type="text" name="km" id="km" class="form-control">
        </div>

    </div>
    <hr>

    <div class="form-row">
    <div class="form-group col-1">
            <label for="qtdItens">Qtd</label>
            <input type="text" class="form-control qtd-input m-2" name="qtd1" id="qtd1">
            <input type="text" class="form-control qtd-input m-2" name="qtd2" id="qtd2">
            <input type="text" class="form-control qtd-input m-2" name="qtd3" id="qtd3">
            <input type="text" class="form-control qtd-input m-2" name="qtd4" id="qtd4">
            <input type="text" class="form-control qtd-input m-2" name="qtd5" id="qtd5">
            <input type="text" class="form-control qtd-input m-2" name="qtd6" id="qtd6">
            <input type="text" class="form-control qtd-input m-2" name="qtd7" id="qtd7">
            <input type="text" class="form-control qtd-input m-2" name="qtd8" id="qtd8">
            <input type="text" class="form-control qtd-input m-2" name="qtd9" id="qtd9">
            <input type="text" class="form-control qtd-input m-2" name="qtd10" id="qtd10">
            <input type="text" class="form-control qtd-input m-2" name="qtd11" id="qtd11">
            <input type="text" class="form-control qtd-input m-2" name="qtd12" id="qtd12">
            <input type="text" class="form-control qtd-input m-2" name="qtd13" id="qtd13">
            <input type="text" class="form-control qtd-input m-2" name="qtd14" id="qtd14">
            <input type="text" class="form-control qtd-input m-2" name="qtd15" id="qtd15">
            <input type="text" class="form-control qtd-input m-2" name="qtd16" id="qtd16">
        </div>

        <div class="form-group col-8">
            <label for="itens">Peças ultilizadas</label>
            <input type="text" class="form-control m-2" name="peca1" id="peca1">
            <input type="text" class="form-control m-2" name="peca2" id="peca2">
            <input type="text" class="form-control m-2" name="peca3" id="peca3">
            <input type="text" class="form-control m-2" name="peca4" id="peca4">
            <input type="text" class="form-control m-2" name="peca5" id="peca5">
            <input type="text" class="form-control m-2" name="peca6" id="peca6">
            <input type="text" class="form-control m-2" name="peca7" id="peca7">
            <input type="text" class="form-control m-2" name="peca8" id="peca8">
            <input type="text" class="form-control m-2" name="peca9" id="peca9">
            <input type="text" class="form-control m-2" name="peca10" id="peca10">
            <input type="text" class="form-control m-2" name="peca11" id="peca11">
            <input type="text" class="form-control m-2" name="peca12" id="peca12">
            <input type="text" class="form-control m-2" name="peca13" id="peca13">
            <input type="text" class="form-control m-2" name="peca14" id="peca14">
            <input type="text" class="form-control m-2" name="peca15" id="peca15">
            <input type="text" class="form-control m-2" name="peca16" id="peca16">
           
            <p class="tItens">Total em Peças</p>
            <p class="tItens">Mão de Obra</p>
            <p class="tItens">Terceiros</p>
        </div>

        <div class="form-group col-3">
            <label for="priceItens">Preço</label>
            <input type="text" class="form-control item-input m-2" name="preco1" id="iten-1">
            <input type="text" class="form-control item-input m-2" name="preco2" id="iten-2">
            <input type="text" class="form-control item-input m-2" name="preco3" id="iten-3">
            <input type="text" class="form-control item-input m-2" name="preco4" id="iten-4">
            <input type="text" class="form-control item-input m-2" name="preco5" id="iten-5">
            <input type="text" class="form-control item-input m-2" name="preco6" id="iten-6">
            <input type="text" class="form-control item-input m-2" name="preco7" id="iten-7">
            <input type="text" class="form-control item-input m-2" name="preco8" id="iten-8">
            <input type="text" class="form-control item-input m-2" name="preco9" id="iten-9">
            <input type="text" class="form-control item-input m-2" name="preco10" id="iten-10">
            <input type="text" class="form-control item-input m-2" name="preco11" id="iten-11">
            <input type="text" class="form-control item-input m-2" name="preco12" id="iten-12">
            <input type="text" class="form-control item-input m-2" name="preco13" id="iten-13">
            <input type="text" class="form-control item-input m-2" name="preco14" id="iten-14">
            <input type="text" class="form-control item-input m-2" name="preco15" id="iten-15">
            <input type="text" class="form-control item-input m-2" name="preco16" id="iten-16">
           

            <input type="text" class="form-control item-input m-2" name="totpecas" id="tItens" readonly>
            <input type="text" class="form-control item-input m-2 mt-4" name="totmDobra" id="tot-mDobra">
            <input type="text" class="form-control item-input m-2 mt-3" name="totterceiros" id="tot-terceiros">
        </div>    
    </div>


    <div class="form-row">
        <div class="form-group col-6">
            <label for="defeito">Problema apresentado</label>
            <textarea id="defeito" class="form-control" rows="4" name="defeito"></textarea>
        </div>
        <div class="form-group col-6">
            <label for="solucao">Serviço feito</label>
            <textarea id="solucao" class="form-control" rows="4" name="solucao"></textarea>
        </div>
    </div>

    <div class="form-row">
        <h2 class="col-6 text-center pt-2">Valor Total</h2>
        <input type="text" name="valor" id="valor" class="col-3 form-control mt-2" readonly>
    </div>
    <div class="text-center my-4 btCriar">
        <button class="btn btn-lg btn-primary text-center">Criar</button>
    </div>
</form>

<script src="assets/js//somaInput.js"></script>
<?php require_once "include/footer.php"; ?>