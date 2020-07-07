<?php
$planningSmall = $data["planning"];
$planningSmall =  $data["planningSmall"];
if (isset($_POST["game_master"]) && isset($_POST["attendees"]) && isset($_POST["start_time"]) && isset($_POST["game_id"]) && isset($_POST["schedule_id"]) && isset($_POST["date"])) {
	$start_time = $_POST["start_time"];

	$showForm = timecheck($planning, $start_time);
    }
    else {
        $showForm = true;
	}
	
?>

<?php if ($showForm == true) { ?>
	<h1 class="bg-dark text-light pb-3">Pas een medewerker aan</h1>


	<form class="bg-secondary p-2 text-light" name="update" method="post" action="<?=URL?>employee/update/<?=$planningSmall["schedule_id"]?>">
			
	
				<input type="hidden" name="schedule_id" value="<?=$planningSmall["schedule_id"] ?>"/>
				
				Wie geeft de instructie: <input type="text" name="game_master" placeholder="<?=$planningSmall["game_master"]?>"><br><br>
				Wie speelt het spel: <input type="text" name="attendees" placeholder="<?=$planningSmall["attendees"]?>"><br><br>
				Hoelaat begint het spel: <input type="time" name="start_time" placeholder="<?=$planningSmall["start_time"]?>" ><br><br>
				
				Welke datum is het spel: <input type="date" name="date" placeholder="<?=$planningSmall["date"]?>"><br><br>
				
				Welk spel gaan ze spelen: 
				
				<select name="game_id">

				<?php
				foreach($data["allGames"] as $games){
					if($games["id"] == $planningSmall["game_id"])
						printf("<option value=\"%s\"selected>%s (%s tot %s spelers)</option>", $games["id"], $games["name"], $games["min_players"], $games["max_players"]);
					else
					printf("<option value=\"%s\">%s (%s tot %s spelers)</option>", $games["id"], $games["name"], $games["min_players"], $games["max_players"]);
						
				} ?>

				</select><br><br>

				<input type="submit" value="submit">
		

	</form>

<?php }?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $showForm == false){
	
		updatePerson($_POST);
?>

		
	<h1> De game wijzigen is geslaagd! </h1>

	<a href="<?=URL?>employee/index"> Ga terug naar de hoofdpagina </a>
<?php } ?>