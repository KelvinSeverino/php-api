<?php

namespace Source\App;

use Source\Models\User;

class Users
{
    public function get(?int $id = null)
    {
        if($id)
        {
            return User::getUser($id);
        }
        else
        {
            return User::getAllUsers();
        }
    }

    public function post()
    {
        $data = $_POST;
        return User::insert($data);
    }

    public function put($id)
    {     
        if($id)
        {
            //Pegando dados enviados
            parse_str(file_get_contents("php://input"), $data);
            //Passando para objeto
            $data = (array)$data;

            return User::updateUser($data, $id);
        }
        else
        {
            throw new \Exception("ID do usuário não foi informado!");
        }
    }

    public function delete()
    {

    }
}
