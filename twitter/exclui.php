<?php

session_start();

$host = "localhost";
$usuario = "root";
$senha = "";
$bd = "twitter2";

$conexao = new mysqli($host,$usuario,$senha,$bd);

if ($conexao -> connect_errno) {
echo "morreu".$conexao -> connect_error;
}else{
    $sql = "UPDATE `coments` SET `ativo`='n' WHERE `id`='".$_POST['info']."';";
    $query = $conexao->query($sql);
    $conexao->close();
    header('location: meu.php',true,301);
}