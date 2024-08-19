<?php
require_once "include/cabecalho.php";
require_once "include/menu.php";

   if(isset($_GET['status']) && $_GET['status']  == "sucesso"){
        echo "<div class='alert alert-success text-center'>";
        echo "<h2>Cadastrado com Sucesso</h2>";
        echo "</div>";?>
       <meta http-equiv="Refresh" content="1; cad_user.php">

       <?php
    }

    if(isset($_GET['status']) && $_GET['status'] == "erro"){
        echo "<div class='alert alert-danger text-center'>";
        echo "<h2>Erro ao Cadastrar</h2>";
        echo "</div>";?>
        <meta http-equiv="Refresh" content="1.5; cad_user.php">

        <?php
    }

	else if(isset($_POST['nome']) && isset($_POST['cpf'])) {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
    

        $sql = "INSERT INTO clientes VALUES(0,'$nome', '$cpf', '$telefone', '$endereco')";

        if (mysqli_query($conn, $sql)) {
            ?>

            <meta http-equiv="Refresh" content="0; cad_user.php?status=sucesso">

            <?php
        } else {
            ?>
            <meta http-equiv="Refresh" content="0;cad_user.php?status=erro "
            <?php
        }

    }


	
?>


<div class="container">


<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="formCli mt-5 col-md-8 col-12 mx-auto border py-4 bg-light font-arial">
	<h2 class="py-2 mx-auto bg-light text-center">Cadastro de Cliente</h2>
	<div class="form-row">
		<div class="form-group col-6">
			<label for="nome">Nome Completo</label>
			<input class="form-control" type="text" name="nome" id="nome" placeholder="Nome Completo" required>
		</div>
		<div class="form-group col-6">
			<label for="cpf">CPF</label>
			<input class="form-control" type="text" name="cpf" id="cpf" placeholder="CPF do cliente">
		</div>
	</div>

    <div class="form-row">
        <div class="form-group col-6">
            <label for="telefone">Telefone</label>
            <input class="form-control" type="text" name="telefone" id="telefone" placeholder="Telefone">
        </div>
        <div class="form-group col-6">
        <label for="endereco">Endereço</label>
			<input class="form-control" type="text" name="endereco" id="endereco">
        </div>
    </div>
		
    <!--
	<div class="form-row">
             <div class="form-group col-8">
			<label for="endereco">endereco</label>
			<input class="form-control" type="text" name="endereco" id="endereco" required>
		</div> -->
		<!-- <div class="form-group col-4">
			<label for="bairro">Bairro</label>
			<input class="form-control" type="text" name="bairro" id="bairro" required>
		</div>		
	</div>

	<div class="form-row">
		<div class="form-group col-5">
			<label for="cidade">Cidade</label>
			<input type="text" name="cidade" id="cidade" class="form-control" required>
		</div>
		
		<div class="form-group col-3">
			<label for="estado">Estado</label>
			<select class="custom-select" name="estado" required>
				<option value="SP">SP</option>
				
			</select>
		</div>

		<div class="form-group col-4">
			<label for="cep">CEP</label>
			<input type="text" name="cep" id="cep" class="form-control">
		</div> 
	</div> 
-->

	<div class="text-center my-3">
		<input type="submit" class="btn btn-lg btn-primary" name="salvar" value="Cadastrar">
	</div>
</form>
</div>


<?php require_once "include/footer.php"?>

<script>
    function formatPhoneNumber(phoneNumber) {
        const cleaned = ('' + phoneNumber).replace(/\D/g, '');
        const match = cleaned.match(/^(\d{2})(\d{5})(\d{4})$/);
        if (match) {
            return `(${match[1]}) ${match[2]}-${match[3]}`;
        }
        return phoneNumber;
    }

    const phoneInput = document.getElementById('telefone');

    phoneInput.addEventListener('input', function () {
        this.value = formatPhoneNumber(this.value);
    });
</script>


