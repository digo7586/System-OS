<?php
require_once('include/conn.php');
require_once "include/cabecalho.php";
require_once "include/menu.php";


// recuperar O.S na tabela
$result = $link->query("SELECT * FROM clientes ORDER BY id desc");
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
        <h5>O.S Clientes: <b> <?= $dataOs ?></b></h5>
        <thead>
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Cliente</th>
                <th scope="col">Telefone</th>
                <th scope="col">Endereço</th>
            </tr>
        </thead>
        <tbody>

        <?php
            while ($cliente = mysqli_fetch_object($result)) {
                // Recuperar os cliente
                $cliente_query = $link->query("SELECT * FROM clientes WHERE id = '{$cliente->id}'");
                $cliente = mysqli_fetch_object($cliente_query);
              
            ?>
                
                    <td><?= $cliente->id; ?></td>
                    <td><?= $cliente->nome; ?></td>
                    <td><?= $cliente->telefone; ?></td>
                    <td><?= $cliente->endereco; ?></td>
                    
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

</body>

</html>