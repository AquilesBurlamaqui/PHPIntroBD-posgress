<?php
  $conexao = pg_connect("postgres://galdbooz:aOBRNCSvW73YL0X8rrz_Y0u9LYd-_NGP@tuffi.db.elephantsql.com/galdbooz") or
  die ("Não foi possível conectar ao servidor PostGreSQL");

  $result = pg_query($conexao, "SELECT * FROM usuario;");
  if (!$result) {
    echo "Ocorreu um erro.\n";
    exit;
  }

  while ($row = pg_fetch_assoc($result)) {
    echo $row['id']." ".$row['nome']." ".$row['email']."</br>";
  }

  echo sha1('123456')
   
?>