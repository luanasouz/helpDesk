<?php

session_start();

require "conexao.php";

  if(!empty($_POST["titulo"]) && !empty($_POST["descricao"])){
      $query_chamados = "INSERT INTO abrir_chamados (titulo, categoria, descricao, id_usuario) VALUES (:titulo, :categoria, :descricao, :id_usuario)";

      $inserir_chamado = $conn->prepare($query_chamados);

      $inserir_chamado->bindValue(':titulo', $_POST["titulo"], PDO::PARAM_STR);
      $inserir_chamado->bindParam(':categoria', $_POST['categoria'], PDO::PARAM_STR);
      $inserir_chamado->bindParam(':descricao', $_POST['descricao'], PDO::PARAM_STR);
      $inserir_chamado->bindParam(':id_usuario', $_SESSION["id"]);

      $inserir_chamado->execute();

      $_SESSION["success"] = "<p style='color:white;background-color:rgb(10, 182, 10);font-size:18px;padding:10px;text-align:center' >O chamado foi enviado para o técnico</p>";

      header("Location: abrir_chamado.php");

  }else if(empty($_POST["titulo"]) || empty($_POST["descricao"])){
        
          $_SESSION["erro"] = "<p style='color:white;background-color:rgb(255, 16, 16);font-size:18px;padding:10px;text-align:center'>Erro ao enviar o chamado: Preencha todos os campos</p>";

          header("Location: abrir_chamado.php");

  }

?>