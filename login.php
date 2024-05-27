<?php 
require_once('include/conn.php'); 


$login = $_POST['usuario'];
$senha = $_POST['senha'];
    if (isset($login)) {
        $verifica = mysqli_query(
            $link,
                "SELECT cod_tbl_users,userName,tipo_user
                FROM tbl_users
                WHERE userName = '$login' AND senha = MD5('$senha')") or die("erro ao selecionar");
            if (mysqli_num_rows($verifica) <= 0) {
                echo "<script language='javascript' type='text/javascript'>
                alert('Login e/ou senha incorretos');
                window.location.href='index.php';</script>";
                die();
            } else {
                $r = mysqli_fetch_array($verifica);

                session_start();

               

                $_SESSION['status'] = 'LOGADO';
                $_SESSION['ativo'] = '1';
    			$_SESSION['id'] = $r['cod_tbl_users'];
    			$_SESSION['usuario'] = $r['userName'];
    			$_SESSION['tipo'] = $r['tipo_user'];

                header("Location:total-os.php");

            }
        
    }

?>

