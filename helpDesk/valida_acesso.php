<?php

session_start();

if(!isset($_SESSION['usuario'])) {
    $_SESSION["msg"] = "<span class'teste' style='color:red;font-size:smaller;font-style:italic'>Faça login antes de acessar as páginas protegidas</span>";
    
    header("Location: index.php");
}

?>