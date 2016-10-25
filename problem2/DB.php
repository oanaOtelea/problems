<?php 

class DB {
    
    private $_config = array(
        'username' => 'root',
        'password' => '0000',
        'database' => 'database'
    );

    public $connectionErr = false;
    protected $connection = null;

    public function __construct() {
        $this->connect($this->_config);
    }

    public function connect($config) 
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=' . $config['database'], 
                            $config['username'], 
                            $config['password']);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection = $conn;
        } catch(Exception $e) {
            $this->connectionErr = $e->getMessage();
        }
    }   

    public function insertRow($tableName, $post_values, $values, $fields) {
        
        $query = "INSERT INTO $tableName(`" . implode('`, `', $post_values) . "`) VALUES({$values})";
        
        try {
            $stmt = $this->connection->prepare($query);
            $stmt->execute($fields);
        } catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }
        
    }
    
    public function findByUserId($userId, $table) {
        $query = "SELECT * FROM $table WHERE id_user='$id'";
        try
          {
              $stmt = $this->connection->prepare($query);
              $stmt->execute();
              $row = $stmt->fetch(PDO::FETCH_OBJ);
          }
          catch(PDOException $e)
          {
              throw new Exception($e->getMessage());
          }
          return $row;
    }
    
}