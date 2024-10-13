<?php
//pagina que destroi a sessão
session_start();

session_destroy();

header("location: index.php",true,301);
