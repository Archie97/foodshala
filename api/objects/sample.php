<?php
// 'sample' object
class Sample{
 
    // database connection and table name
    private $conn;
    private $table_name = "food";
 
    // object properties
    public $name;
    public $cost;
    public $category;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
 
// create new user record
function create(){
 
    // insert query
    $query = "INSERT INTO " . $this->table_name . "
            SET
                name = :name,
                cost = :cost,
                category = :category";
 
    // prepare the query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->cost=htmlspecialchars(strip_tags($this->cost));
    $this->category=htmlspecialchars(strip_tags($this->category));
    
 
    // bind the values
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':cost', $this->cost);
    $stmt->bindParam(':category', $this->category);
 
 
    // execute the query, also check if query was successful
    if($stmt->execute()){
        return true;
    }
 
    return false;
}
 

}