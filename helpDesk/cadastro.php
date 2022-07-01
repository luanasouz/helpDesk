<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>
    <?php 
      session_start();
        
        if(isset($_SESSION['success'])) {
          echo $_SESSION['success'];
          unset($_SESSION['success']);
        } 

        if(isset($_SESSION['erro'])) {
          echo $_SESSION['erro'];
          unset($_SESSION['erro']);
        } ?>

    <div class="container">    
      <div class="row">
        

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Cadastre-se
            </div>
            <div class="card-body">
              <form action="registra_usuario.php" method="POST" >
              <div class="form-group">
                  <input name="nome" type="text" class="form-control" placeholder="Nome usuario">
                </div>
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">

                </div>

                  <div class="form-group">
                      <select name="usuario" class="form-control">
                        <option value="2">Usuario</option>
                        <option value="1">Administrador</option>
                      </select>
                    </div>

                  <?php
                    session_start(); 
                    if(isset($_SESSION["msg"])) {
                      echo $_SESSION["msg"];
                      unset($_SESSION["msg"]);
                    }
    
                ?>
                
                <button class="btn btn-lg btn-info btn-block" type="submit">Cadastrar</button>
              </form>
              <a href="index.php" style='font-size:14px'>Já tem uma conta? Login</a>
            </div>
          </div>
        </div>
    </div>
    
</body>
</html>