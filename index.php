<?php
    //Alterando o cabecalho de resposta para JSON
    header('Content-Type: application/json');

    require __DIR__ . "/vendor/autoload.php";

    //Pega a rota de separa em array
    $url = explode("/", $_GET['route']);

    //Verifica se existe routa, EX - api/users/1
    if($_GET['route'])
    {
        //Verifica se esta querendo acessar a rota de API
        if($url[0] === 'api')
        {
            //Removendo primeiro inidice do array
            array_shift($url);

            //Passando a nova posicao 0
            $controller = 'Source\App\\' . $url[0];            

            //Removendo primeiro inidice do array
            array_shift($url);

            //Pegando o metodo HTTP vindo pela requisicao
            $method = strtolower($_SERVER['REQUEST_METHOD']);
            
            try{
                //Chamando classe de maneira automatizada
                $response = call_user_func_array(array(new $controller, $method), $url);
                
                http_response_code(200);
                echo json_encode(array(
                    'status' => 'success',
                    'data' => $response
                ));
                exit;
            } catch (\Exception $e) {

                http_response_code(404);
                echo json_encode(array(
                    'status' => 'error',
                    'data' => $e->getMessage()
                ), JSON_UNESCAPED_UNICODE);
                exit;                
            }
        }
    }