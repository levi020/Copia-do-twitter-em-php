<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Twitter2</title>
        <style>
        *{margin: 0;
        font-family: sans-serif;}

        body{background-color: #66a3ff;}

        #land{background-color: #003d99;
        border-bottom: 5px solid black;}

        a{text-decoration: none;
        color: white;}

        h1{text-align: center;
        color: white;}

        #aaa{border-radius: 15px;
        padding: 9px;}

        .en{border-radius: 15px;
        padding: 8px;}
    </style>
    </head>
    <body>
        <div>
            <header id="land">
                <br><br>
                <h1>login</h1>
                <br><br><br><br><br>
            </header>
            <article>
                <center>
                <br><br>
                <form action="revisa.php" method="post">
                    <input id="aaa" type="text" name="user" id="user" placeholder="Insira aqui seu usuario">
                    <br><br>
                    <input id="aaa" type="password" name="senha" id="senha" placeholder="Insira aqui sua senha">
                    <br><br>
                    <input class="en" type="submit" value="Enviar">
                </form>
                <br>
                <p>Não tem conta?<a href="cadastra.php">cadastre-se.</a></p>
                </center>
            </article>
        </div>
    </body>
</html>