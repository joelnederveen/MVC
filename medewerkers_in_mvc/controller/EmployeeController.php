<?php
require(ROOT . "model/EmployeeModel.php");


function index(){
    //1. Haal alle medewerkers op uit de database (via de model) en sla deze op in een variable

    $games = getAllGames(); 
    //2. Geef een view weer en geef de variable met medewerkers hieraan mee
    render('employee/index', $games);
}

function create(){
    //1. Geef een view weer waarin een formulier staat voor het aanmaken van een medewerker
    $game["allGames"] = allGames();
    $game["planning"] = getAllPlanning();
    
    //2. Geef een view weer en geef de variable met medewerkers hieraan mee
    render('employee/create', $game);
}



function game($id){
    $game = getGame($id);
    

    render('employee/game', $game);

    // $games = getAllGames(); 
    // //2. Geef een view weer en geef de variable met medewerkers hieraan mee
    // render('employee/index', $games);
}

function edit($id){
    //1. Haal een medewerker op met een specifiek id en sla deze op in een variable

    //2. Geef een view weer voor het updaten en geef de variable met medewerker hieraan mee

}

function update($id){
    $game["allGames"] = allGames();
    $game["planningSmall"] = indexId($id);
    $game["planning"] = getAllPlanning();
    
    
    render('employee/update', $game);
}

function delete($id){
    //1. Haal een medewerker op met een specifiek id en sla deze op in een variable
    	
    //2. Geef een view weer voor het verwijderen en geef de variable met medewerker hieraan mee
    $game = getGame($id);
    

    render('employee/delete', $game);

}

function updateAction(){
    $result = updatePerson($_POST);
    // $url = URL . "employee/index";
    // header("refresh:0; $url");


}

function deleteAction($id){
    deleteGame($id);
    $url = URL . "employee/index";
    header("refresh:0; $url");
     
}

function toMuch(){
    render('employee/toMuch' );
     
}

function sizeCheck(){
    $planning = getAllPlanning();
    
    if (sizeof($planning) < 10){ 
        $url = URL . "employee/create";
        header("refresh:0; $url");
    }
    else{
        $url = URL . "employee/toMuch";
        header("refresh:0; $url");
    }
    // $url = URL . "employee/index";
    // header("refresh:0; $url");
    
}
?>