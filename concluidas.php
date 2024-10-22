<?php
require_once('include/conn.php');
require_once "include/cabecalho.php";
require_once "include/menu.php";

// recuperar O.S na tabela
$resultConcluidas = $link->query("SELECT * FROM ordem where status = '1' ORDER BY id_os desc");
$dataOsConcluidas = mysqli_num_rows($resultConcluidas);

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



    <!-- inicio da listagem das o.s -->
    <table class="table table-hover table-bordered mt-2">
        <h5>O.S Concluídas: <b> <?= $dataOsConcluidas ?></b></h5>
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
            while ($OSConcluidas = mysqli_fetch_object($resultConcluidas)) {

                // Recupere o cliente associado a esta ordem de serviço
                $cliente_query = $link->query("SELECT * FROM clientes WHERE id = '{$OSConcluidas->id_cliente}'");
                $cliente = mysqli_fetch_object($cliente_query);

                // Adicione a classe 'status-fechada' se o status for igual a '1' (fechada), caso contrário, não adicione nenhuma classe
                $status_class = ($OSConcluidas->status == '1') ? 'status-fechada' : 'status-aberta';
            ?>
                <tr class="<?= $status_class ?>" onclick="window.open('busca_os.php?id=<?= $OSConcluidas->id_os ?>', '_blank')">
                    <td><?= $OSConcluidas->id_os; ?></td>
                    <td><?= $cliente->nome; ?></td>
                    <td><?= $OSConcluidas->modelo; ?></td>
                    <td><?= $OSConcluidas->placa; ?></td>
                    <td><?= date("d/m/Y", strtotime($OSConcluidas->data_entrada)) ?></td>
                    <!-- <td><?= $OSConcluidas->valorPecas; ?></td>
                    <td><?= $OSConcluidas->valorMobra; ?></td>
                    <td><?= $OSConcluidas->valorTotal; ?></td> -->
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
<?php require_once "include/footer.php"; ?>


</body>

</html>