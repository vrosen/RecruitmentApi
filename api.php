<?php



//we include the Db class
require_once ('db.php');

/*
 * From this class we make our calls to the DB class and we return data to the index.php file.
 */

class Api{
    
    public $db;
    
    public function __construct() 
    {
        //instantiate the Db class
        $this->db = new Db();
        
    }
    //return json string
    public function getJobs($index)
    {
        if(!empty($index)){
            //we call the Db function with the transfered Url parametar from the index page
            return json_encode($this->db->getJobs($index));
        }  else {
            die();
        }
    }
    //return json string
    public function getCandidates($index)
    {
        if(!empty($index)){
            //we call the Db function with the transfered Url parametar from the index page
            return json_encode($this->db->getCandidates($index));
        }  else {
            die();
        }
    }
    //return json string
    public function getCandidate($index)
    {
        if(!empty($index)){
            //we call the Db function with the transfered Url parametar from the index page
            return json_encode($this->db->getCandidate($index));
        } else {
            die();
        }
    }
    //return json string
    public function getCandidateName($name)
    {
        if(!empty($name)){
            //we call the Db function with the posted search term
            return json_encode($this->db->getCandidateName($name));
        } else {
            die();
        }
    }
//class end
}
