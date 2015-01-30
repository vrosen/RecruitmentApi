<?php 

    //we include the api class here
    require ('api.php');
    //instantiate the api class
    $api = new Api();

    //we check which GET parametar is called in the Url
    //we call the api class function with the found parametar
    if(!empty($_GET['jobs']))
    {
        $jobs = $api->getJobs($_GET['jobs']);
        print_r($jobs);
    }

    if(!empty($_GET['candidates']))
    {
        $candidates = $api->getCandidates($_GET['candidates']);
        print_r($candidates);
    }
    
    if(!empty($_GET['review']))
    {
        $candidates = $api->getCandidate($_GET['review']);
        print_r($candidates);
    }
    
    if(!empty($_GET['search']))
    {
        $candidates = $api->getCandidate($_GET['search']);
        print_r($candidates);
    }
    
    if(!empty($_POST['search']))
    {
        if(!empty($_POST['search'])){
           $candidates = $api->getCandidateName($_POST['search']); 
           print_r($candidates);
        }
    }
    
    
?>
