<?php

class Database {

    public $connect;

    public function __construct()
    {
        $this->connect = new mysqli("localhost", "alex", "alex323000", "booking");
        //$this->connect = new mysqli("localhost", "smarthost", "alex_Password1", "smarthost");
    }

    public function execQuery($sql){
        $mysqli = $this->connect;
        $mysqli->real_query($sql);
        return true;
    }

    public function getDataFromDb($sql){
        $mysqli = $this->connect;
        $mysqli->real_query($sql);
        $res = $mysqli->use_result();
        return $res;
    }

    public function createSelect($tableName){

        $sql = "SELECT * FROM $tableName ORDER BY NAME";
        $res = $this->getDataFromDb($sql);
        $option = '';
        while ($row = $res->fetch_assoc()) {
            $option .= '<option value="' . $row['ID'] . '">' . $row['NAME'] . '</option>';
        }
        return $option;
    }

}//END Class