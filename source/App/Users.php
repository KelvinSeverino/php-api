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

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
