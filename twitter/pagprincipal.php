<!DOCTYPE html>
<html lang="en">
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

        h3{text-align: center;
        color: white;}

        p{color: white;}

        .op{position: absolute;
        top: 9em;
        left: 52em;}

        .op1{position: absolute;
        top: 9em;
        left: 41em;}

        table , tr , th{border: 4px solid black;}

        table{width: 300px;}
        
        button{background-color: #66a3ff;
        outline: 0;}
    </style>
</head>
<body>
    <div>
        <header>
        <div id="land">
            <br><br>
            <h1>Twitter2</h1>
            <br>
            <h3>
                <?php
                session_start();
                if (empty($_SESSION['user'])){
                    header('location: index.php',true,301);
                    exit();
                }else{
                    echo "Seja bem-vindo(a): ".$_SESSION['user'];
                }
                ?>
            </h3>
            <br><br>
            <p class="op"><a href="sair.php">Sair</a></p>
            <p class="op1"><a href="meu.php">Verificar Seus Tweets</a></p>
            <br>
        </div>
        </header>
        <article>          
            <div>
                <?php
                    $host = "localhost";
                    $usuario = "root";
                    $senha = "";
                    $bd = "twitter2";

                    $conexao = new mysqli($host,$usuario,$senha,$bd);

                    if ($conexao -> connect_errno) {
                        echo "morreu".$conexao -> connect_error;
                    }else{
                        $sqli = "SELECT `UserName`, `text`,`id` FROM `coments` WHERE `ativo`='s' ORDER BY `data` DESC;";
                        $resulti = $conexao->query($sqli);
                        // codigo não concluido
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";

                        echo "<center>";  
                        echo "<h2>Tweets</h2>";                      
                        echo "<table>";

                        while($row = mysqli_fetch_array($resulti)){
                            echo "
                                <tr>
                                    <th>
                                        <form action='view.php' method='post'>
                                            <input type='hidden' name='view' id='view' value='$row[0]'>
                                            <button type='submit'>Postado por: $row[0]</button>
                                        </form>
                                    </th>
                                </tr>

                                <tr>
                                    <th>$row[1]</th>
                                </tr>";
                        }
                        echo "</table>";
                        echo "</center>";
                        $conexao->close();
                    }

                ?>
            </div>
        </article>
    </div>
</body>
</html>