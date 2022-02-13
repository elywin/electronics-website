<?php

putenv("CLEARDB_DATABASE_URL = mysql://b13d259429335f:6736161d@us-cdbr-east-05.cleardb.net/heroku_c0a1fdbed2fb732?reconnect=true");
class DBController {
    //database connection properties
    /*protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'electronics';*/

    //Get Heroku ClearDB connection information
    
    
    
    // Connect to DB
    //create a constructor to initialize the connection of the database
    //connection property
    //public $con = null;
    
    public $conn = null;
    
    //call constructor
    public function __construct(){
        /*$this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
       
        if($this->con->connect_error){
            echo "Fail" .$this->con->connect_error;        
        }*/
        //echo "Connection successfull";

        $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
     $cleardb_server = $cleardb_url["host"];
     $cleardb_username = $cleardb_url["user"];
     $cleardb_password = $cleardb_url["pass"];
     $cleardb_db = substr($cleardb_url["path"],1);
     $active_group = 'default';
     $query_builder = TRUE;

        $this->conn = mysqli_connect($this->cleardb_server, $this->cleardb_username, $this->cleardb_password, $this->cleardb_db);
    if($this->conn->connect_error){
            echo "Fail" .$this->conn->connect_error;        
        }
        echo "Connection successfull dyj";
        
    }
    

    public function __destruct(){
    $this->closeConnection();
    }

    //method for closing MySQL connection
    protected function closeConnection(){ //fn destructure
    if($this->conn != null){
        $this->conn->close();
        $this->conn = null;
    }
}


    
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