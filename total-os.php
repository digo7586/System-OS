<?php


require_once('include/conn.php');
require_once "include/cabecalho.php";
require_once "include/menu.php";

// recuperar O.S na tabela
$resultTotal = $link->query("SELECT * FROM ordem  ORDER BY id_os desc");
$dataOsTotal = mysqli_num_rows($resultTotal);


?>
<link rel="stylesheet" href="assets/css/styleHome.css" />
<script>
    $(document).ready(function() {
        $('.titulo-inicio').click(function() {
            $('.informacao').show('slow')
        })
    })
</script>

<!-- <div class="background-container">
    <img src="image/veloci7.jpg" class="background-image">
</div> -->
<div class="container-fluid p-3">
    
<?php include_once('painel.php') ?>


    <!-- Campo de Data -->
    <label for="dataEntrada">Selecione uma data:</label>
    <input type="date" id="dataEntrada" name="dataEntrada">

    <!-- Botão de Filtro -->
    <button id="filtrarBtn">Filtrar</button>


    <!-- inicio da listagem das o.s -->
    <table class="table table-hover table-bordered mt-2">
        <h5>Total de Ordens de serviço: <b> <?= $dataOsTotal ?></b></h5>
		<thead>
			<tr>
				<th scope="col">N°</th>
				<th scope="col">Cliente</th>
				<th scope="col">Modelo</th>
				<th scope="col">Placa</th>
				<th scope="col">Data-Entarda</th>
				<!-- <th scope="col">Valor das peças</th>
				<th scope="col">Mão de Obra</th>-->
				<th scope="col">Total</th> 
			</tr>
		</thead>
        <tbody id="tabelaResultados">
        <?php
while ($OSTotal = mysqli_fetch_object($resultTotal)) {

    // Recupere o cliente associado a esta ordem de serviço
    $cliente_query = $link->query("SELECT * FROM clientes WHERE id = '{$OSTotal->id_cliente}'");
    $cliente = mysqli_fetch_object($cliente_query);

    // Adicione a classe 'status-aberta' se o status for igual a '0' (aberta), caso contrário, não adicione nenhuma classe
    $status_class = ($OSTotal->status == '0') ? 'status-aberta' : 'status-fechada';
    ?>
    <tr class="<?= $status_class ?>" onclick="window.open('busca_os.php?id=<?= $OSTotal->id_os ?>', '_blank')">
        <td><?= $OSTotal->id_os; ?></td>
        <td><?= $cliente->nome; ?></td>
        <td><?= $OSTotal->modelo; ?></td>
        <td><?= $OSTotal->placa; ?></td>
        <td><?= date("d/m/Y", strtotime($OSTotal->data_entrada)) ?></td>
       <!--  <td><?= $OSTotal->valorPecas; ?></td>
        <td><?= $OSTotal->valorMobra; ?></td>-->
        <td><?= $OSTotal->valorTotal; ?></td> 
    </tr>
<?php } ?>
</tbody>
	</table>
	

</div>

<!-- <div class= "img-fluid" style="background-color: #000; width:100vw; height:78vh">
        <img src="image/veloci.jpg" class="mx-auto d-block img-fluid" style="height: 78vh;">
    </div> -->

<!-- <footer>
    
    <h6 class="footer-font text-white">© 2024</h6>
 
</footer> -->
</main>

<script>
        document.getElementById("filtrarBtn").addEventListener("click", function() {
            // Pega a data selecionada
            const dataSelecionada = document.getElementById("dataEntrada").value;

            // Verifica se a data foi selecionada
            if (dataSelecionada) {
                // Envia a data para o back-end via AJAX
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "filtrar_ordens.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Atualiza a tabela com os resultados
                        document.getElementById("tabelaResultados").innerHTML = xhr.responseText;
                    }
                };
                xhr.send("dataEntrada=" + dataSelecionada);
            } else {
                alert("Por favor, selecione uma data.");
            }
        });
    </script>

    
<?php require_once "include/footer.php";?>


</body>

</html>