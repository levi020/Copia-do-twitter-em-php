<?php

//pagina que efetu O cadastro
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

    if ($user != "" && $password != "") {
        $veri = "SELECT `user`, `senha`, `ativo` FROM `usuarios` WHERE `user`='".$user."' AND `senha`='".$password."';";
        $veri2 = $conexao->query($veri);
        $veri3 = mysqli_num_rows($veri2);
        if ($veri3 == 0) {
            $sql = "INSERT INTO `usuarios`(`user`, `senha`, `ativo`) VALUES('".$user."','".$password."','s');";
            $result = $conexao->query($sql);
            header("location: index.php",true,301);

        }else{
            // echo "erro";
            header("location: cadastra.php",true,301);
        }
    }else{
        // echo "erro";
        header("location: cadastra.php",true,301);

    }
    $conexao->close();
}
