<?php
//connect to the database and execute the query
class Database{
    public $connection;
    public $statement;





    public function __construct($config, $username = 'root', $password = ''){
        

        $dsn = 'mysql:' . http_build_query($config,'',';');
        
        $this->connection = new PDO($dsn, $username,$password ,[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);

    }





    public function query($query, $params = []){
          
            $this->statement = $this->connection->prepare($query);
          
            $this->statement->execute($params);
          
            return $this;
    }






    public function authorize($condition, $status = Response::FORBIDDEN){
        if(!$condition)abort($status);
    }




    public function find(){
        return $this->statement->fetchAll();
    }




    public function findAndFail() {
        $result = $this->find();

        if(!$result){
            abort(404);
    }
    return $result;
}

}


