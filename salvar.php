<?php
  $conexao = pg_connect("postgres://galdbooz:aOBRNCSvW73YL0X8rrz_Y0u9LYd-_NGP@tuffi.db.elephantsql.com/galdbooz") or
  die ("Não foi possível conectar ao servidor PostGreSQL");

  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $senha = sha1($_POST['senha']);

  $result = pg_query($conexao, "INSERT INTO usuario (nome, email, senha) VALUES ('".$nome."', '".$email."', '".$senha."');");
  if(!$result) {
      echo "Erro ao cadastrar usuário!";
  } else {
     header('Location: index.php?msg=Usuario cadastrado com sucesso!');
     die();
  }
?>