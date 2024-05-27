<?php
 require_once('conn.php'); 


  //INSERT DATA INTO DB
  $nome = addslashes($_POST["nome"]);
  $usuario = addslashes($_POST["usuario"]);
  $pwd = $_POST["senha"];
  $nivel = addslashes($_POST["nivel"]);
  $data = addslashes($_POST['data']);

  $query_select = "SELECT userName FROM tbl_users WHERE userName = '$usuario'";
  $select = mysqli_query($link, $query_select);
  $array = mysqli_fetch_array($select);
  $logarray = $array['userName'];

      if($usuario == "" || $usuario == null){
          echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='./cadastro.html';</script>";

          }else{
              if($logarray == $usuario){

                  echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='./cadastro.html';</script>";
                  die();

              }else{
                  $query = "INSERT INTO tbl_users (nome,userName,senha,nivel,ativo,cadastro) VALUES ('$nome','$usuario',MD5('$pwd'),'$nivel','0','$data')";
                  $insert = mysqli_query($link ,$query);

                  if($insert){
                      echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='../index.php'</script>";
                  }else{
                      echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='../abertas.php'</script>";
                  }
              }
          }



 ?>