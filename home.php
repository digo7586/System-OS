<?php
require_once "include/cabecalho.php";
require_once "include/menu.php";

$result = todosClientes($conn);
?>

<div class="circle"></div>
	<div class="circle1"></div>
    
    <div class="card-container">
        <div>
            <img src="assets/img/autome.png" style="width: 250px;" class="logoForm" alt="logo">
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

<script src="assets/js/somaInput.js"></script>
<script src="assets/js/mult.js"></script>

<?php require_once "include/footer.php"; ?>