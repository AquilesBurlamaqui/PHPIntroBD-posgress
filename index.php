<html>
    <head>
       <title>Desenvolvimento de Banco de Dados para Web</title>
    </head>
    <body>

    <h1>Sistema WEB - </h1>
    
    <span> 
         <?php
                if($_GET['msg']) {
                    echo $_GET['msg'].'</br>';
                }
         ?> 
    </span>
   
    <a href="login.php">Login</a> </br>
    <a href="cadastro.php">Cadastro</a>
      
    </body>
</html>