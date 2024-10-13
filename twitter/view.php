<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
        *{margin: 0;
        font-family: sans-serif;}

        body{background-color: #66a3ff;}

        #land{background-color: #003d99;
        border-bottom: 5px solid black;}

        h1{text-align: center;
        color: white;}

        p{color: white;
        text-align: center;}

        a{text-decoration: none;
        color: white;}

        table , tr , th{border: 4px solid black;}

        table{width: 300px;}
        </style>
    </head>
    <body>
        <div>
            <header>
                <div id="land">
                <br><br>
                <h1>
                <?php
                session_start();
                    echo $_POST['view'];
                ?>
                </h1>
                <br><br><br><br>
                <p><a href="pagprincipal.php">Voltar</a></p>
                </div>
            </header>
            <article>
                <?php
                    $host = "localhost";
                    $usuario = "root";
                    $senha = "";
                    $bd = "twitter2";

                    $conexao = new mysqli($host,$usuario,$senha,$bd);

                    //ve perfil de usuario

                    if ($conexao -> connect_errno) {
                        echo "morreu".$conexao -> connect_error;
                    }else{
                        $sql = "SELECT `UserName`, `text`, `ativo` FROM `coments` WHERE `UserName`='".$_POST['view']."' AND `ativo`='s';";
                        $result = $conexao->query($sql);
                        echo "<center>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";         
                        echo "<h2>Tweets:</h2>";
                        echo "<table>";
                        while($row = mysqli_fetch_array($result)){
                            echo "
                            <tr>
                                <th>Postado por: $row[0]</th> 
                            </tr>
                            <br>
                            <tr>
                                <th>$row[1]</th>
                            </tr>";
                        }
                        echo "<table>";
                        echo "</center>";
                        $conexao->close();
                    }
                ?>
            </article>
        </div>
    </body>
</html>