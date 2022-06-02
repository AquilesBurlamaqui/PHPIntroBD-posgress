<?php
  session_start();
?>
<html>
    <head>
       <title>Desenvolvimento de Banco de Dados para Web</title>
    </head>
    <body>
    <?php

 
        if($_SESSION["estaLogado"]==true) {
                echo "<h1>Usuário: ".$_SESSION["email"]."</h1>";
                echo "<a href='logout.php'>Logout</a></br>";

                $id = $_GET["id"];

                $conexao = pg_connect("postgres://galdbooz:aOBRNCSvW73YL0X8rrz_Y0u9LYd-_NGP@tuffi.db.elephantsql.com/galdbooz") or
die ("Não foi possível conectar ao servidor PostGreSQL");

                $result = pg_query($conexao, "SELECT * FROM usuario WHERE id='".$id."'");
                if (!$result) {
                  echo "Ocorreu um erro.\n";
                  exit;
                }
            
                echo "<h2>Tem certeza que deseja Excluir o seguinte usuário ?</h2>";
               
                if (pg_num_rows($result)  > 0) {
                  $row = pg_fetch_assoc($result);
                  echo "<form action='deletar.php' method='post' >";
                  echo "<input type='hidden' name='id' value='".$id."'>";
                  echo "id: " . $row["id"]. " - Nome: " . $row["nome"]. " " . $row["email"]. " ". $row["senha"]."";  
                  echo "<input type='submit' value='Excluir'>";
                } else {
                  echo "Usuário não existe";
                }
                pg_close($conexao);
              
        } else {
            echo "Usuário não logado.";
        }
    ?>
    <br>
   
    </body>
</html>