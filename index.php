<?php

    require __DIR__ . "/vendor/autoload.php";

    //Pega a rota de separa em array
    $url = explode("/", $_GET['route']);
    var_dump($url);

    //Verifica se existe routa, EX - api/users/1
    if($_GET['route'])
    {
        //Verifica se esta querendo acessar a rota de API
        if($url[0] === 'api')
        {
            //...
        }
    }