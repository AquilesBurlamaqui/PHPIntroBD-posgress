<?php session_start(); ?>
<html>
    <head>
       <title>Desenvolvimento de Banco de Dados para Web</title>
    </head>
    <body>
    <?php
        if($_GET['msg']) {
            echo "<span>".$_GET['msg'].'</span></br>';
        }
        if($_SESSION["estaLogado"]==true) {
            echo "<h1>Seja bem vindo ".$_SESSION["email"]."</h1>";
            echo "<a href='logout.php'>Logout</a></br>";
      
            $conexao = pg_connect("postgres://galdbooz:aOBRNCSvW73YL0X8rrz_Y0u9LYd-_NGP@tuffi.db.elephantsql.com/galdbooz") or
die ("Não foi possível conectar ao servidor PostGreSQL");

            $result = pg_query($conexao, "SELECT * FROM usuario;");
            if (!$result) {
              echo "Ocorreu um erro.\n";
              exit;
            }
            echo "<h2>Lista de usuários</h2>";
            while ($row = pg_fetch_assoc($result)) {
              echo "id: " . $row["id"]. " - Nome: " . $row["nome"]. " " . $row["email"]. " ". $row["senha"]. "<a href='editar.php?id=". $row["id"]."'><img src=\"images/edit.png\"/ style='height:20px;' alt='Editar'></a> <a href='confirmarDelete.php?id=". $row["id"]."'><img src=\"images/delete.png\"/ style='height:20px;' alt='Excluir'></a> <br>";
            }
        } else {
            echo "Usuário não logado.";
        }
    ?>
    <br>
   
    </body>
</html>