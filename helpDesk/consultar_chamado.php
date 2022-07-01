<?php 

session_start();

require "conexao.php";
require "valida_acesso.php";

$query_chamados = "SELECT 
                    c.titulo, c.categoria, c.descricao, c.id_usuario, usu.id, nome
                    FROM abrir_chamados c
                    LEFT JOIN usuarios AS usu ON usu.id=c.id_usuario
                    ORDER BY c.id DESC";

$resultado_chamados = $conn->prepare($query_chamados);
$resultado_chamados->execute();

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
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
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="logoff.php" class="nav-link">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

          <?php
            if(($resultado_chamados) AND ($resultado_chamados->rowCount() != 0)) {
            
              while($row_chamado = $resultado_chamados->fetch(PDO::FETCH_ASSOC)) {
                extract($row_chamado);

                if($_SESSION['usuario'] [1] == 1 ) {
          ?>    

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <h3><?php echo "Nome do usuario: $nome" ?></h3>
                  <h5 class="card-title"><?= $titulo?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $categoria?></h6>
                  <p class="card-text"><?= $descricao?></p>

                </div>
              </div>
          <?php }else if($_SESSION['usuario'] [1] == 2 && $id_usuario == $_SESSION['id']) {?>

                  <div class="card mb-3 bg-light">
                    <div class="card-body">
                      <h5 class="card-title"><?= $titulo?></h5>
                      <h6 class="card-subtitle mb-2 text-muted"><?= $categoria?></h6>
                      <p class="card-text"><?= $descricao?></p>

                    </div>
                  </div>

          <?php
                }
              }
            }
          ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a href="home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>