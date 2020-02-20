<?php

require_once '../models/Database.php';

class EmployeerController {
    
    
    public function create($db, $fname, $sname, $mname) {
        
        $sql = "INSERT INTO `employeer` (`fname`, `sname`, `pname`) 
                    VALUES('{$fname}', '{$sname}', '{$mname}') ;";
        
        $result = $db->query($sql);

        return $result;
    }

    public function update($db, $id) {


    }

    public function delete($db, $id) {

        $sql = "DELETE FROM `employeer` WHERE `id` = '${id}' ";
            
        $result = $db->query($sql);
        
        return $result;
    }

    public function read($db) {

        $sql = "SELECT * FROM employeer";

        $result = $db->query($sql);

        return $result;
    }

    public function search($db, $word) {
        
        $sql = "SELECT * FROM employeer WHERE (fname LIKE '%" . $word . "%')
                OR (sname LIKE '%". $word ."%') 
                OR (pname LIKE '%". $word ."_');";

        $result = $db->query($sql);

        return $result;
    }
}