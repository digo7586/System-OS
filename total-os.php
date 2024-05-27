<?php


require_once('include/conn.php');
require_once "include/cabecalho.php";
require_once "include/menu.php";

// recuperar O.S na tabela
$result = $link->query("SELECT * FROM ordem  ORDER BY id_os desc");
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


    


    <!-- inicio da listagem das o.s -->
    <table class="table table-dark table-hover table-bordered mt-2">
        <h5>Total de Ordens de serviço: <b> <?= $dataOs ?></b></h5>
		<thead>
			<tr>
				<th scope="col">N°</th>
				<th scope="col">Cliente</th>
				<th scope="col">Modelo</th>
				<th scope="col">Placa</th>
				<th scope="col">Data-Entarda</th>
				<!-- <th scope="col">Valor das peças</th>
				<th scope="col">Mão de Obra</th>
				<th scope="col">Total</th> -->
			</tr>
		</thead>
        <tbody>
        <?php
while ($OS = mysqli_fetch_object($result)) {
    // Recupere o cliente associado a esta ordem de serviço
    $cliente_query = $link->query("SELECT * FROM clientes WHERE id = '{$OS->id_cliente}'");
    $cliente = mysqli_fetch_object($cliente_query);
    // Adicione a classe 'status-aberta' se o status for igual a '0' (aberta), caso contrário, não adicione nenhuma classe
    
    $status_class = ($OS->status == '0') ? 'status-aberta' : 'status-fechada';
    ?>
    <tr class="<?= $status_class ?>" onclick="window.open('busca_os.php?id=<?= $OS->id_os ?>', '_blank')">
        <td><?= $OS->id_os; ?></td>
        <td><?= $cliente->nome; ?></td>
        <td><?= $OS->modelo; ?></td>
        <td><?= $OS->placa; ?></td>
        <td><?= date("d/m/Y", strtotime($OS->data_entrada)) ?></td>
       <!--  <td><?= $OS->valorPecas; ?></td>
        <td><?= $OS->valorMobra; ?></td>
        <td><?= $OS->valorTotal; ?></td> -->
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
<?php require_once "include/footer.php";?>


</body>

</html>