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

        a{text-decoration: none;
        color: white;}

        #land{background-color: #003d99;
        border-bottom: 5px solid black;}

        h1{text-align: center;
        color: white;}


        .caixa{padding-bottom: 100px;
        width: 250px;}

        table , tr , th{border: 4px solid black;}

        table{width: 300px;}

        #send{text-align: center;
        position: absolute;
        left: 2em;
        top: 15em;}

        button{background-color: red;}
    </style>
    </head>
    <body>
        <div>
            <header id="land">
            <br><br>
            <h1>
                <?php
                session_start();
                echo $_SESSION['user'];
                ?>
            </h1>
            <br><br><br><br><br>
            </header>
            <article>
                <br><br><br><br>
                <?php
                // ve o proprio perfil
                    $host = "localhost";
                    $usuario = "root";
                    $senha = "";
                    $bd = "twitter2";

                    $conexao = new mysqli($host,$usuario,$senha,$bd);

                    if ($conexao -> connect_errno) {
                        echo "morreu".$conexao -> connect_error;
                    }else{
                        $sqli = "SELECT `id`,`UserName`, `text`, `ativo` FROM `coments` WHERE `UserName`='".$_SESSION['user']."' AND `ativo`='s';";
                        $resulti = $conexao->query($sqli);
                        if ($resulti->num_rows == 0) {
                            echo "Voce não tem tweets";
                        }else{
                        echo "<center>";
                        echo "<h2>Tweets:</h2>";
                        echo "<table>";
                        while($row = mysqli_fetch_array($resulti)){                             
                            echo "
                                <tr>
                                    <th>Postado por: $row[1]<?/th>
                                </tr>
                                <tr>
                                    <th>$row[2]</th>
                                </tr>
                                
                                <tr>
                                    <th>
                                        <form method='post' action='exclui.php'>
                                        <input type='hidden' name='info' id='info' value='$row[0]'>
                                        <button type=submit>Excluir</button>
                                        </form>
                                    </th>
                                </tr>";
                        }
                        echo "</table>";                       
                        echo "</center>";
                        }
                        $conexao->close();
                    }
                ?>
                <center>
                    <p><a href="pagprincipal.php">Voltar</a></p>
                </center>
                <div id="send">
                <form action="meu.php" method="post">
                    <h2>Faça um tweet</h2>
                    <input type="text" name="text" id="text" class="caixa" min="1" max="250" required>
                    <br>
                    <input type="submit" value="Enviar">
                </form>
                </div>
                
                <?php
                    if (isset($_POST['text'])) {
                        $host = "localhost";
                        $usuario = "root";
                        $senha = "";
                        $bd = "twitter2";

                        $conexao = new mysqli($host,$usuario,$senha,$bd);

                        if ($conexao -> connect_errno) {
                            echo "morreu".$conexao -> connect_error;
                        }else{
                            $coment = $conexao->real_escape_string($_POST['text']);
                            $timezone = new DateTimeZone('America/Sao_Paulo');
                            $agora = new DateTime('now', $timezone);

                            $sql = "INSERT INTO `coments`(`UserName`, `text`, `ativo`,`data`,`hora`) VALUES ('".$_SESSION['user']."','".$coment."','s','".date('Y/m/d', strtotime('+ 1 hours'))."','".$agora."');";
                            $result = $conexao->query($sql);
                            $conexao->close();
                            sleep(2);
                            exit();
                        }
                    }
                ?>
            
            </article>
        </div>
    </body>
</html>