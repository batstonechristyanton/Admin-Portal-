<?php 

class Connection{

    public static function connect($config){
        
        $dsn = "mysql:host={$config['database']['host']};dbname={$config['database']['db']};charset={$config['database']['charset']}";

        $options = [
            
        ];

        try {

             return 
                new PDO(
                    $dsn, 
                    $config['database']['user'], 
                    $config['database']['pass'], 
                    $config['database']['options']
                );

        } catch (\PDOException $e) {

             throw new \PDOException($e->getMessage(), (int)$e->getCode());

        }

    }

}
