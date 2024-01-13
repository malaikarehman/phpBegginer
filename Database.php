<?php
//connect to the database and execute the query
class Database{
    public $connection;

    public function __construct($config, $username = 'root', $password = ''){
        

        $dsn = 'mysql:' . http_build_query($config,'',';');
        
        $this->connection = new PDO($dsn, $username,'' ,[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

    }
    public function query($query, $params = []){
          
            $statement = $this->connection->prepare($query);
          
            $statement->execute($params);
          
            return $statement;
    }
}


