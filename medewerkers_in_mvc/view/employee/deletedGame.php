<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
            $verwijderen=$_POST["delete"];
            
           if($verwijderen=="1"){
                deleteGame($data["id"]);
            }

        }
    
        
		
?>


	<h1 class="bg-dark text-light">Geslaagd! </h1>

	<a class="bg-secondary text-light" href="<?=URL?>employee/index"> Ga terug naar de hoofdpagina </a>