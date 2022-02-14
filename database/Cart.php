<?php
//php cart class

class Cart{
    public $db = null;
    
    public function __construct(DBController $db){
        if(!isset($db->con)) return null;   //if connection is not successfull
        //if connection is successfull
        $this-> db = $db;
    }

    //insert into cart table
    public function insertIntoCart($params = null, $table = "cart"){
        if($this->db->con != null){
            if($params != null){
                //insert into cart(user_id) values(0)
                //get table columns as an array
                $columns = implode(',',array_keys($params));
                //print_r($params);
                //print_r($columns);
                $values = implode(',',array_values($params));
                //print_r($values);

                //create SQL query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table,$columns, $values);
                //echo $query_string;

                //execute query
                $result = $this->db->con->query($query_string);
                return $result;
                
                
            }
        }
    }

        //to get user_id and item_id and insert into cart tables
        public function addToCart($userid, $itemid){
            if(isset($userid) && isset($itemid)){
                $params = array(
                    "user_id" => $userid,
                    "item_id" => $itemid
                );

                //insert data into cart
                $result = $this->insertIntoCart($params);
                if($result){
                    //reload page
                    header("Location: ".$_SERVER['PHP_SELF']); 
                }
                
                
            }
        }

}