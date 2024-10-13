<?php

session_start();

//pagina que verifica o login

$host = "localhost";
$usuario = "root";
$senha = "";
$bd = "twitter2";

$conexao = new mysqli($host,$usuario,$senha,$bd);

if ($conexao -> connect_errno) {
    echo "morreu".$conexao -> connect_error;
}else{
    $user = $conexao->real_escape_string($_POST['user']);
    $password = $conexao->real_escape_string($_POST["senha"]);

    $sql = "SELECT `user`, `senha`, `ativo` FROM `usuarios` WHERE `user`='".$user."' AND `senha`='".$password."' AND `ativo`='s';";
    $result = $conexao->query($sql);

    if ($result->num_rows == 1) {
        $row  = mysqli_fetch_array($result);
        $_SESSION['user'] = $row[0];
        $_SESSION['senha'] = $row[1];
        $_SESSION['ativo'] = $row[2];
        header('location: pagprincipal.php',true,301);       
    }else{
        header('location: index.php',true,301);
    }
    $conexao->close();
}