<?php
require("db.php");
class Todos {
    private $db;
    function __construct(){
        $this->show();
    }
    function show()
    {
        $this->db = new dbConnSQLite("testAppDB", "sql", false, "dbs");
        
        $sqlStatement = "SELECT * FROM todos";
                
        $sqlPreparedStatement = $this->db->connection->prepare($sqlStatement);
        $sqlPreparedStatement->execute();
        $sqlPreparedStatement->setFetchMode(PDO::FETCH_ASSOC);
        
        while($row = $sqlPreparedStatement->fetch()) {
            $completed = "False";
            if($row['completed'] == 1) $completed = "True";
            echo "<dl>".$row['id'];
            echo " | ".$row['name'];
            echo " | ".$row['note'];
            echo " | ". $completed . "</dl>";
        }

        $this->db->closeDB();
    }
}
?>