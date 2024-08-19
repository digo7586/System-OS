<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <html lang="pt-br">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">




    <title>AutoMecanica do gordo - Entrar</title>
    <link href="assets/css/stylechat.css" rel="stylesheet">


</head>

<body>
<div class="circle"></div>
	<div class="circle1"></div>

    <div class="alerts-container"></div>
    <div class="wrapper">

       
        <section class="form login">
        <header>
									
					<img id="iconeBag" src="assets/img/AUTO.png" alt="">				
								
			</header>
        
            
            <form action="login.php" method="post" id="loginform">
            <div class="error-text"></div>

            <div class="field input">
					<label for="username">Usuário</label>
					<input type="text" id="username" name="usuario" placeholder="Digite seu usuario" required>
				</div>
				<div class="field input">
					<label for="password">Senha</label>
					<input type="password" id="password" name="senha" placeholder="Digite sua senha" required>
					<i class="bi bi-eye"></i>
				</div>
				<div class="field button">
					<input type="submit" name="entrar" value="Login">
				</div>




              

                <!--  <div class="form-group field-loginform-rememberme">
                                                    <input type="hidden" name="LoginForm[rememberMe]" value="0">
                                                    <label>
                                                        <input type="checkbox" id="loginform-rememberme" value="1" tabindex="3">
                                                        Lembre-me da próxima vez
                                                    </label>

                                                </div> -->
                
                <!-- <span><a class="ajax" href="/user/forgot" tabindex="5">Esqueceu sua senha?</a></span>-->
            </form>
            <div class="copyright">
            <span>&copy; DomingosTech&Code | 2024</span>
			</div>

            <p>
                <?php
                //Recuperando o valor da variável global, os erro de login.
                if (isset($_SESSION['loginErro'])) {
                    echo $_SESSION['loginErro'];
                    unset($_SESSION['loginErro']);
                } ?>
            </p>

            <p>
                <?php
                //Recuperando o valor da variável global, deslogado com sucesso.
                if (isset($_SESSION['logindeslogado'])) {
                    echo $_SESSION['logindeslogado'];
                    unset($_SESSION['logindeslogado']);
                }
                ?>
            </p>

        </section>
    </div>

</body>

</html>