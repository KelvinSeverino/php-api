<?php

namespace Source\Models;

use PDO;
use PDOException;

class User
{
    private static $table = 'users';

    public static function getUser(int $idUser)
    {
        //Realizando conexao com o BD
        try{
            $connPdo = new PDO('mysql:host='.CONF_DB_HOST.';dbname=' . CONF_DB_NAME, CONF_DB_USER, CONF_DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));	
        } catch ( PDOException $e ) {
            echo "Erro: " . $e->getMessage() . " <br/>";
        }        

        $sql = 'SELECT * FROM '.self::$table.' WHERE id = :id';

        $stmt = $connPdo->prepare($sql);
        $stmt->bindValue(':id', $idUser);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }
        else
        {            
            throw new \Exception("Nenhum Usuário encontrado!");
        }
    }

    public static function getAllUsers()
    {
        //Realizando conexao com o BD
        try{
            $connPdo = new PDO('mysql:host='.CONF_DB_HOST.';dbname=' . CONF_DB_NAME, CONF_DB_USER, CONF_DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));	
        } catch ( PDOException $e ) {
            echo "Erro: " . $e->getMessage() . " <br/>";
        }        

        $sql = 'SELECT * FROM '.self::$table;
        $stmt = $connPdo->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        else
        {            
            throw new \Exception("Nenhum Usuário encontrado!");
        }
    }

    public static function insert($data)
    {
        //Realizando conexao com o BD
        $connPdo = new PDO('mysql:host='.CONF_DB_HOST.';dbname=' . CONF_DB_NAME, CONF_DB_USER, CONF_DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));	     

        $sql = 'INSERT INTO '.self::$table. ' (email, nome, senha) VALUES (:email, :nome, :senha)';
        $stmt = $connPdo->prepare($sql);        
        $stmt->bindValue(':email', $data['email']);
        $stmt->bindValue(':nome', $data['name']);
        $stmt->bindValue(':senha', $data['pass']);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            return 'Usuário inserido com sucesso!';
        }
        else
        {            
            throw new \Exception("Falha ao inserir usuário!");
        }
    }

    public static function updateUser($data, $id)
    {
        //Realizando conexao com o BD
        $connPdo = new PDO('mysql:host='.CONF_DB_HOST.';dbname=' . CONF_DB_NAME, CONF_DB_USER, CONF_DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));	     

        $sql = 'UPDATE '.self::$table. ' SET email = :email, nome = :nome, senha = :senha WHERE id = :id';
        $stmt = $connPdo->prepare($sql);        
        $stmt->bindValue(':email', $data['email']);
        $stmt->bindValue(':nome', $data['nome']);
        $stmt->bindValue(':senha', $data['senha']);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            return 'Usuário atualizado com sucesso!';
        }
        else
        {            
            throw new \Exception("Falha ao atualizar usuário!");
        }
    }

    public static function destroy($id)
    {
        //Realizando conexao com o BD
        $connPdo = new PDO('mysql:host='.CONF_DB_HOST.';dbname=' . CONF_DB_NAME, CONF_DB_USER, CONF_DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));	     

        $sql = 'DELETE FROM '.self::$table. ' WHERE id = :id';
        $stmt = $connPdo->prepare($sql);        
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
            return 'Usuário deletado com sucesso!';
        }
        else
        {            
            throw new \Exception("Falha ao deletar usuário!");
        }
    }
}
