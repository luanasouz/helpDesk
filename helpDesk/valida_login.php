<?php

session_start();
    require ("conexao.php");
 
        if(isset($_POST["email"]) && isset($_POST["senha"]) && $conn != null) {
            $query = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
            $query->execute(array($_POST["email"], $_POST["senha"]));
    
            if($query->rowCount()) {
                $user = $query->fetch(PDO::FETCH_ASSOC);
    
                session_start();
                $_SESSION["usuario"] = array($user["nome"], $user["adm"]);

                $_SESSION["id"] = $user["id"];

                header("Location: home.php");

            }
            else {
                $_SESSION["msg"] = "<span class'teste' style='color:red;font-size:smaller;font-style:italic'>Preencha todos os campos</span>";
                header("Location: index.php");

            }
    
        }else {
            $_SESSION["msg"] = "<span style='color:red;font-size:smaller;font-style:italic'>Faça login antes de acessar as páginas protegidas</span>";
            header("Location: index.php");

        }
    


?>