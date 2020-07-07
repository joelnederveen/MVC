<?php

?>
	
	<h1 class="bg-dark text-light"><?=$data["name"]?></h1>
	
	<ul>
		<li class="d-inline m-2">
			    
			<div class="bg-secondary p-5">
				<img src="<?=URL?>public/images/<?= $data["image"] ?>" alt="image">
				<p>Description: <br><?= $data["description"]?></p>
				<p>Expansion(s): <br><?= $data["expansions"]?></p>
				<p>Skills: <br><?= $data["skills"]?></p>
				<p>Meer informatie: <br><?= $data["url"]?></p>
				<p>Youtube uitleg:<br> <?= $data["youtube"]?></p>
				<p>Minimaal aantal spelers: <br><?= $data["min_players"]?> personen </p>
				<p>Maximaal aantal spelers: <br><?= $data["max_players"]?> personen</p>
				<p>Hoelang het spel duurt: <br><?= $data["play_minutes"]?> minuten</p>
				<p>Hoelang het duurt om het spel uit te leggen: <?= $data["explain_minutes"]?> minuten</p>
				<p>Begin tijd: <br><?= $data["start_time"] ?> </p>
				<p>Eind tijd: <br>
				<?php 
				
				$endTime = strtotime("+".$data["play_minutes"]."minutes" , strtotime($data["start_time"]));
				echo date('H:i', $endTime); ?>
				<p>Wie de uitleg geeft: <br><?=$data["game_master"]?></p>
                <p>wie er meedoen: <br><?=$data["attendees"]?></p>
			</div>
			 
		</li>
	</ul>

