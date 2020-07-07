<?php if (isset($_POST["game_master"]) && isset($_POST["attendees"]) && isset($_POST["start_time"]) && isset($_POST["game_id"]) && isset($_POST["date"]) ) {
		$start_time = $_POST["start_time"];
		
		

		$showForm = timecheck($planning, $start_time);
		
		
		
		
    }
    else {
        $showForm = true;
	}
	
	
	$games = $data["allGames"];
	$planning = $data["planning"]
?>
<?php if ($showForm == true) { 
	
	?>

	<h1 class="bg-dark text-light pb-3">Voeg een medewerker toe</h1>


	<form class="bg-secondary p-2 text-light" name="create" method="post" action="create">
			
			
			
				Wie geeft de instructie: <input type="text" name="game_master"><br><br>
				Wie speelt het spel: <input type="text" name="attendees"><br><br>
				
				Hoelaat begint het spel: <input type="time" name="start_time" ><br><br>

				Welke datum is het spel: <input type="date" name="date" ><br><br>
				
				
				Welk spel gaan ze spelen: 
				
				<select name="game_id">

				<?php
				foreach($games as $games){
					printf("<option value=\"%s\">%s (%s tot %s spelers)</option>", $games["id"], $games["name"], $games["min_players"], $games["max_players"]);
				} ?>

				</select><br><br>

				<input type="Submit" value="Submit">
		


	</form>

<?php }?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $showForm == false){

		$game_master = $_POST["game_master"];
		$attendees = $_POST["attendees"];
		$start_time = $_POST["start_time"];
		$game_id = $_POST["game_id"];
		$date = $_POST["date"];
		createGame($game_master, $attendees, $start_time, $game_id, $date);
		
?>

		
	<h1> De game toevoegen is geslaagd! </h1>
		
	<a href="<?=URL?>employee/index"> Ga terug naar de hoofdpagina </a>
<?php } ?>

<!-- <div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker3'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
            });
        </script>
    </div>
</div> -->