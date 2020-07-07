	<?php
		
	?>
	
	<h1 class="pb-3 bg-dark text-light">Overzicht van alle games</h1>
	
<?php foreach ($data as $game){ ?>	
	<ul class="">
		<li class="d-inline">
			
			    
					<div class="bg-secondary col-10">
						<h1 class="bg-dark text-light px-4"><?= $game["name"] ?></h1>
						<div class="d-inline-block">
							<p>Datum: <?= $game["date"]?></p>
							<p>Begin tijd: <?= $game["start_time"]?></p>
							<p>Duur: <?= $game["play_minutes"] ?> minuten</p>
							<p>Uitleg gever: <?=$game["game_master"]?></p>
						</div>

						<div class="d-inline-block float-right">
							<a class="d-inline-block float-right text-light" href="<?=URL?>employee/game/<?=$game["schedule_id"]?>"><i class="fas fa-search"></i>Bekijk</a> <br>
							<a class="d-inline-block float-right text-light" href="<?=URL?>employee/update/<?=$game["schedule_id"]?>"> Wijzigen </a> <br>
							<a class="d-inline-block float-right text-light" href="<?=URL?>employee/delete/<?=$game["schedule_id"]?>">Verwijderen</a>
						</div>
					</div>
				
	
		</li>
	</ul>
<?php } ?>