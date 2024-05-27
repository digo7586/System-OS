<?php
session_start();
if ($_SESSION['ativo'] == '0') {
    header("Location: index.php"); // Chamar um form de login por exemplo.
} else {
    $id = $_SESSION['id'];
    $usuario = $_SESSION['usuario'];
    $tipo = $_SESSION['tipo'];
    $nivel = '2';
}

?>
<?php
// Incluindo arquivo de conexão
require_once('conn.php');

// Selecionando fotos
$stmt = $link->query('SELECT * FROM tbl_users order by userName asc');
?>
<!DOCTYPE html>
<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Gerenciar Usuários</title>
    <html lang="pt-br">
    
    
    <!-- <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff"> -->

   
    <title>Gerenciar Usuários</title>
    <link href="../assets/authchoice.css" rel="stylesheet">
    <link href="../css/mobile.min.css" rel="stylesheet">
    <link href="../css/fontawesome.all.min.css" rel="stylesheet">
    <link href="../css/daterangepicker.css" rel="stylesheet">
    
    
  </head>

 <body class="no-js login">

<main>
	<div class="alerts-container">

	</div>
    <header class="breadcrumbs">
        <ul class="breadcrumb">
        	
        	<li class="active">
        		<h1>Usuários</h1>
        	</li>

        	<li>
        		<a class="add_new_icon" href="../home.php">
        			<i class="fas fa-sub"></i>
        			<span class="icon_desc"> | Voltar</span>
        		</a>
        	</li>
        </ul>
    </header>

    <div id="content">
        <div class="sale-index">
		<div class="page-actions-search">
			
		<!-- <form method="POST" id="form-pesquisa" action="">
			<div class="form-group searchbar">
				<input type="text" name="pesquisa" id="pesquisa" autocomplete="off" placeholder="pesquisar clínica">
				<button type="submit" class="btn btn-search"><i class="fas fa-search"></i></button>
			</div>
		</form>-->
			
				
			
		</div>
    	
    	<div id="w3" class="grid-view resultado">
    		
    		
<!-- INICIO DA LISTAGEM DAS CLINICAS -->
			<table class="clickable">
				<thead>
					<tr>						
						<th style="text-transform: uppercase;width: 10px;text-align: center;" class="row_title">
							Usuário
						</th>

						<th style="text-transform: uppercase;width: 3px;text-align: center;" class="row_title">
							Nível
						</th>
						
						<th style="text-transform: uppercase;width: 3px;text-align: center;" class="mobile_hide">
							Ativo
						</th>
						
						<th style="text-transform: uppercase;width: 10px;text-align: center;" class="mobile_hide">
							Tipo
						</th>
						
						<th style="text-transform: uppercase;width: 36px;text-align: center;" class="row_title">
							Data de Alteração
						</th>
						<th style="text-transform: uppercase;width: 16px;text-align: center;"></th>
					</tr>
				</thead>
				<?php 

                    while ($foto = mysqli_fetch_object($stmt)){ 
                    
                ?>
                    <tbody>
                        <form action="salvar.php" method="post" onsubmit="this.salvar.value='Salvando...'; this.salvar.disabled=true;">
                        <tr>
                        <td style="text-transform: uppercase;width: 10px;text-align: center;"><?=$foto->userName?></td>
                        <td style="text-transform: uppercase;width: 3px;text-align: center;"><input type="number" name="nivel" value="<?=$foto->nivel?>"></td>
                        <td style="text-transform: uppercase;width: 3px;text-align: center;"><input type="number" name="ativo" value="<?=$foto->ativo?>"></td>
                        
                        
                        
                        <td style="text-transform: uppercase;width: 10px;text-align: center;">
                        
                        
                        <select class="form-control" id="tipo" name="tipo">
                        			<option value="">Selecione</option>
                        			<option value="" <?=$foto->tipo_user == '' ? 'selected' : '' ?>></option>
                        			<option value="Administrador" <?=$foto->tipo_user == 'Administrador' ? 'selected' : '' ?>>Administrador</option>
                        			<option value="Programador" <?=$foto->tipo_user == 'Programador' ? 'selected' : '' ?>>Programador</option>
                        			<option value="Producao" <?=$foto->tipo_user == 'Producao' ? 'selected' : '' ?> >Producao</option>
                        			<option value="Manutencao" <?=$foto->tipo_user == 'Manutencao' ? 'selected' : '' ?> >Manutencao</option>
                        			<option value="Qualidade" <?=$foto->tipo_user == 'Qualidade' ? 'selected' : '' ?> >Qualidade</option>
                    	</select>
                        </td>
                      
                        <td style="text-transform: uppercase;width: 36px;text-align: center;"><b>Alterado por:</b> <?=$foto->alterado?> no dia <?= date('d/m/Y', strtotime($foto->cadastro)) ?></td>
                        <input type="hidden" name="cadastro" value="<?php echo date('d/m/Y');?>">
                        <input type="hidden" name="alterado" value="<?= utf8_encode($usuario);?>"> 
                        <input type="hidden" name="id" value="<?=$foto->cod_tbl_users?>">
                        
                        <td style="text-transform: uppercase;width: 16px;text-align: center;" class="action-column three_actions">
                            <div class="actions_list_container">
                                <div class="actions_list">
                                   
                                    <input type="submit" class="btn btn-main" name="salvar" value="Salvar">
                                    
                                </div>
                            </div> 
                            <a class="actions_list_button" href="#">
                                <span class="fas fa-ellipsis-v"></span> 
                            </a>
                        </td>

                        </tr>
                        </form>
                    </tbody>
                    
                    <?php } ?>    
                    
                    </table>
<!-- FIM DA LISTAGEM DAS CLINNICAS -->
		<div align='center'></div></div>
	</div>
</main>


</div>


</body>
</html>
