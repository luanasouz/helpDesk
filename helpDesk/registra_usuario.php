<?php

session_start();
require "conexao.php";


    if(!empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['usuario'])) {
        $query_registra = "INSERT INTO usuarios (email, senha, nome, adm) VALUES (:email, :senha, :nome, :adm)";

        $registrar = $conn->prepare($query_registra);

        $registrar->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $registrar->bindParam(':senha', $_POST['senha'], PDO::PARAM_STR);
        $registrar->bindParam(':nome', $_POST['nome'], PDO::PARAM_STR);
        $registrar->bindParam(':adm', $_POST['usuario'], PDO::PARAM_STR);

        $registrar->execute();

        $_SESSION['success'] = "<p <p style='color:white;background-color:rgb(10, 182, 10);font-size:18px;padding:10px;text-align:center'>Usuario cadastrado com sucesso</p>";

        header("Location: cadastro.php");
    }else {
        $_SESSION["msg"] = "<span style='color:red;font-size:smaller;font-style:italic'>Preencha todos os campos</span>";

        header("Location: cadastro.php");
    }

?>
