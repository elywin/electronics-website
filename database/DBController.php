<?php
class DBController {
    //database connection properties
    /*protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'electronics';*/

    //Get Heroku ClearDB connection information
    protected $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    protected $cleardb_server = $cleardb_url["host"];
    protected $cleardb_username = $cleardb_url["user"];
    protected $cleardb_password = $cleardb_url["pass"];
    protected $cleardb_db = substr($cleardb_url["path"],1);
    protected $active_group = 'default';
    protected $query_builder = TRUE;
    
    
    // Connect to DB
    //create a constructor to initialize the connection of the database
    //connection property
    public $con = null;
    
    
    //call constructor
    public function __construct(){
        /*$this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
       
        if($this->con->connect_error){
            echo "Fail" .$this->con->connect_error;        
        }*/
        //echo "Connection successfull";

        $this->conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
    if($this->conn->connect_error){
            echo "Fail" .$this->conn->connect_error;        
        }
        echo "Connection successfull";
        
    }
    

    public function __destruct(){
    $this->closeConnection();
    }

    //method for closing MySQL connection
    protected function closeConnection(){ //fn destructure
    if($this->con != null){
        $this->con->close();
        $this->con = null;
    }
}


    public $conn = null;
    //method for connecting heroku clearDB
    protected function clearDatabase(){
        
    // Connect to DB
    
    }
    
        
    
} //close of class



/**
 * Instead of creating this object, going to create a "functions.php" file on the root where objects will be created.
 */
//DBController object
//$db = new DBController();