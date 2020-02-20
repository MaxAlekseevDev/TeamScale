<?php 
error_reporting(0);


class Database {

    public $connection = NULL;

    protected $hostDB = 'localhost';
    protected $userDB = 'teamscale';
    protected $nameDB = 'jupiter';
    protected $passDB = '1234!miX';

    public function __construct() {

        $this->connection = new mysqli($this->hostDB, 
                                        $this->userDB, $this->passDB, $this->nameDB);

        return $this->connection;

    }

    public function query($query) {

        $result = $this->connection->query($query);
        $rowCnt = $result->num_rows;
        $results = [];
        
        if ( $rowCnt > 0) {

            while($row = $result->fetch_array(MYSQLI_ASSOC)) { 
                array_push($results, $row);
            }
            return $results;

        }else{

            return $result;
        }
    }

    public function __destruct() {

        $this->connection->close();
        
        return $this->connection;
    }
}
