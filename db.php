<?php
/*
 * this is a test Api App
 * made by Viktor Panayotov for Cayetanogaming
 * on 09.01.2015,Varna,Bulgaria
 */


class Db{
    
    public $conn;
    protected $servername   =   'localhost';
    protected $username     =   'root';
    protected $password     =   '';
    protected $dbname       =   'db';



    public function __construct()
    {
        //standart MySql Db connection
        $testcon = new mysqli($this->servername, $this->username, $this->password);
            if (!$testcon) {
                //if we can not connect to the Db, this message will appear
                 die('Database connection failed: '  . mysqli_connect_error());
               } else {
                   $this->conn = $testcon;
                   //if we have connection we select our dbatabase
                   mysqli_select_db($this->conn,$this->dbname);
               }
    }

    //returns array
    public function getJobs($index)
    {

        $arr = array();
            if(!empty($index)){
                //we make a query from the database for the whole list of jobs
                if($index == 'list'){
                    $sql = "SELECT * FROM `jobs`";
                    $result = $this->conn->query($sql);
                    while($r=$result->fetch_assoc()) {
                        $arr[] = $r;
                    }
                    //if the index is num we make query per ID for a row(job)
                } else if(is_numeric ($index)){
                    $sql = "SELECT * FROM `jobs` WHERE id=".$index."";
                    $result = $this->conn->query($sql);
                    while($r=$result->fetch_assoc()) {
                        $arr[] = $r;
                    }
                }
            }

            return $arr;  
    }

    //returns array
    public function getCandidates($index)
    {

        $arr = array();
            if(!empty($index)){
                //we make a query from the database for the whole list of candidates
                if($index == 'list'){
                    $sql = "SELECT * FROM `candidates`";
                    $result = $this->conn->query($sql);
                    while($r=$result->fetch_assoc()) {
                        $arr[] = $r;
                    }
                }
            }
            return $arr;  
    }

    //returns array
    public function getCandidate($index)
    {

        $arr = array();
            if(!empty($index)){
                    //if the index is num we make query per ID for a row(candidate)
                    $sql = "SELECT * FROM `candidates` WHERE id=".$index."";
                    $result = $this->conn->query($sql);
                    while($r=$result->fetch_assoc()) {
                        $arr[] = $r;
                    }
            }
            return $arr; 
    }
    
    //returns array
    public function getCandidateName($name)
    {
        
        $arr = array();
            if(!empty($name)){
                    //we search for all data containing the serach terms
                    $sql = "SELECT * FROM `candidates` WHERE `name` like '%$name%' ";
                    $result = $this->conn->query($sql);
                    while($r=$result->fetch_assoc()) {
                        $arr[] = $r;
                    }
            }
            return $arr;
    }
//class end
}
