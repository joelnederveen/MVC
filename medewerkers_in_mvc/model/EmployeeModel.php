<?php

function getAllGames(){ 
  // Met het try statement kunnen we code proberen uit te voeren. Wanneer deze
  // mislukt kunnen we de foutmelding afvangen en eventueel de gebruiker een
  // nette foutmelding laten zien. In het catch statement wordt de fout afgevangen
   try {
       // Open de verbinding met de database
       $conn=openDatabaseConnection();
   
       // Zet de query klaar door middel van de prepare method
       $stmt = $conn->prepare
     ("SELECT * FROM planning LEFT join games ON planning.game_id = games.id ORDER BY date");

       // Voer de query uit
       $stmt->execute();

       // Haal alle resultaten op en maak deze op in een array
       // In dit geval is het mogelijk dat we meedere medewerkers ophalen, daarom gebruiken we
       // hier de fetchAll functie.
       $result = $stmt->fetchAll();

   }
   // Vang de foutmelding af
   catch(PDOException $e){
       // Zet de foutmelding op het scherm
       echo "Connection failed: " . $e->getMessage();
   }

   // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
   // van de server opgeschoond blijft
   $conn = null;

   // Geef het resultaat terug aan de controller
   return $result;

}

function getGames(){ 
    // Met het try statement kunnen we code proberen uit te voeren. Wanneer deze
    // mislukt kunnen we de foutmelding afvangen en eventueel de gebruiker een
    // nette foutmelding laten zien. In het catch statement wordt de fout afgevangen
     try {
         // Open de verbinding met de database
         $conn=openDatabaseConnection();
     
         // Zet de query klaar door middel van de prepare method
         $stmt = $conn->prepare
       ("SELECT * FROM games LEFT join planning ON games.id = planning.game_id");
  
         // Voer de query uit
         $stmt->execute();
  
         // Haal alle resultaten op en maak deze op in een array
         // In dit geval is het mogelijk dat we meedere medewerkers ophalen, daarom gebruiken we
         // hier de fetchAll functie.
         $result = $stmt->fetchAll();
  
     }
     // Vang de foutmelding af
     catch(PDOException $e){
         // Zet de foutmelding op het scherm
         echo "Connection failed: " . $e->getMessage();
     }
  
     // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
     // van de server opgeschoond blijft
     $conn = null;
  
     // Geef het resultaat terug aan de controller
     return $result;
  
  }
  
  function allGames(){
      // Met het try statement kunnen we code proberen uit te voeren. Wanneer deze
  // mislukt kunnen we de foutmelding afvangen en eventueel de gebruiker een
  // nette foutmelding laten zien. In het catch statement wordt de fout afgevangen
   try {
    // Open de verbinding met de database
    $conn=openDatabaseConnection();

    // Zet de query klaar door middel van de prepare method
    $stmt = $conn->prepare("SELECT *  FROM games ");

    // Voer de query uit
    $stmt->execute();

    // Haal alle resultaten op en maak deze op in een array
    // In dit geval is het mogelijk dat we meedere medewerkers ophalen, daarom gebruiken we
    // hier de fetchAll functie.
    $result = $stmt->fetchAll();

}
// Vang de foutmelding af
catch(PDOException $e){
    // Zet de foutmelding op het scherm
    echo "Connection failed: " . $e->getMessage();
}

// Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
// van de server opgeschoond blijft
$conn = null;

// Geef het resultaat terug aan de controller
return $result;
}
function getGame($id){
        
        // Open de verbinding met de database
        $conn=openDatabaseConnection();
 
        // Zet de query klaar door midel van de prepare method. Voeg hierbij een
        // WHERE clause toe (WHERE id = :id. Deze vullen we later in de code
        $stmt = $conn->prepare("SELECT * FROM planning LEFT join games ON planning.game_id = games.id WHERE schedule_id = :id");
        // Met bindParam kunnen we een parameter binden. Dit vult de waarde op de plaats in
        // We vervangen :id in de query voor het id wat de functie binnen is gekomen.
        $stmt->bindParam(":id", $id);

        // Voer de query uit
        $stmt->execute();
    
        // Haal alle resultaten op en maak deze op in een array
        // In dit geval weten we zeker dat we maar 1 medewerker op halen (de where clause), 
        //daarom gebruiken we hier de fetch functie.
        $result = $stmt->fetch();
        return $result;
    

 }

function createGame($game_master, $attendees, $start_time, $game_id, $date){
    $result;
    $dbConnection = openDatabaseConnection();
    
    $stmt = $dbConnection->prepare("INSERT INTO planning (game_master, attendees, start_time, game_id, date) VALUES (:game_master, :attendees, :start_time, :game_id, :date)");
    
    $stmt->bindParam(":game_master", $game_master);
    $stmt->bindParam(":attendees", $attendees);
    $stmt->bindParam(":start_time", $start_time);
    $stmt->bindParam(":game_id", $game_id);
    $stmt->bindParam(":date", $date);
    

    // $result  = $stmt->execute($data);

    $stmt->execute();
    // $dbConnection = null;

 }

 function deleteGame($id){
    $dbConnection = openDatabaseConnection();
    
    $stmt = $dbConnection->prepare("DELETE FROM planning WHERE schedule_id=:id");   
    
    $stmt->bindParam(":id", $id);
    

    $stmt->execute();
    $dbConnection = null;
 }

function indexId($id){
    try {
        // Open de verbinding met de database
        $conn=openDatabaseConnection();
 
        // Zet de query klaar door midel van de prepare method. Voeg hierbij een
        // WHERE clause toe (WHERE id = :id. Deze vullen we later in de code
        $stmt = $conn->prepare("SELECT * FROM planning WHERE schedule_id = :id");
        // Met bindParam kunnen we een parameter binden. Dit vult de waarde op de plaats in
        // We vervangen :id in de query voor het id wat de functie binnen is gekomen.
        $stmt->bindParam(":id", $id);

        // Voer de query uit
        $stmt->execute();

        // Haal alle resultaten op en maak deze op in een array
        // In dit geval weten we zeker dat we maar 1 medewerker op halen (de where clause), 
        //daarom gebruiken we hier de fetch functie.
        $result = $stmt->fetch();
 
    }
    catch(PDOException $e){

        echo "Connection failed: " . $e->getMessage();
    }
    // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
    // van de server opgeschoond blijft
    $conn = null;
 
    // Geef het resultaat terug aan de controller
    return $result;
}

function getAllPlanning(){ 
      // Met het try statement kunnen we code proberen uit te voeren. Wanneer deze
  // mislukt kunnen we de foutmelding afvangen en eventueel de gebruiker een
  // nette foutmelding laten zien. In het catch statement wordt de fout afgevangen
   try {
    // Open de verbinding met de database
    $conn=openDatabaseConnection();

    // Zet de query klaar door middel van de prepare method
    $stmt = $conn->prepare("SELECT * FROM planning");

    // Voer de query uit
    $stmt->execute();

    // Haal alle resultaten op en maak deze op in een array
    // In dit geval is het mogelijk dat we meedere medewerkers ophalen, daarom gebruiken we
    // hier de fetchAll functie.
    $result = $stmt->fetchAll();

}
// Vang de foutmelding af
catch(PDOException $e){
    // Zet de foutmelding op het scherm
    echo "Connection failed: " . $e->getMessage();
}

// Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
// van de server opgeschoond blijft
$conn = null;

// Geef het resultaat terug aan de controller
return $result;
}


function updatePerson($data){
    try {
    $conn=openDatabaseConnection();
    $result;
    
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("UPDATE planning SET game_id=:game_id, game_master=:game_master, attendees=:attendees, start_time=:start_time, date=:date  WHERE schedule_id=:schedule_id"); 
    $result = $stmt->execute($data);
    }
    catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;
    return $result;
    }

function timecheck($planning, $start_time){
    
    foreach($planning as $planning){
        if($planning["start_time"] == $start_time){
            return true;
            
        }
             

    }
    
    return false;
    
}

?>

