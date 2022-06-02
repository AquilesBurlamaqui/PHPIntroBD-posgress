<?php

      $conexao = pg_connect("postgres://galdbooz:aOBRNCSvW73YL0X8rrz_Y0u9LYd-_NGP@tuffi.db.elephantsql.com/galdbooz") or
  die ("Não foi possível conectar ao servidor PostGreSQL");
       
      $sql = "DELETE from usuario WHERE id='".$_POST['id']."'";

      $result = pg_query($conexao, $sql);
      if(!$result) {
          echo "Erro ao cadastrar usuário!";
          echo "<br/>Error: " . $sql . "<br>" . $conn->error;
      } else {
          header('Location: home.php?msg=Usuario removido com sucesso!');
          die();
      }
      pg_close($conexao);
?>