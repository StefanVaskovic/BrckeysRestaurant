	<?php
		require_once "models/events/functions.php";
	?>
	<div id="fh5co-events" data-section="events" style="background-image: url(assets/images/eventsMoje.jpg);" data-stellar-background-ratio="0.5">
			<div class="fh5co-overlay"></div>
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-12 to-animate">
						<h2 class="heading">Upcoming Events</h2>
						<p class="sub-heading">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						
					</div>
				</div>
				<div class="row">
					<?php
						$events = getEvents();
						foreach ($events as $item) :
					?>
					<div class="col-md-6">
						<div class="fh5co-event to-animate-2">
							<h3><?= $item->name?></h3>
							<span class="fh5co-event-meta"><?= modifyDate($item->date);?></span>
							<p><?= $item->description?></p>
							<p><a href="#" class="btn btn-primary btn-outline countOnMe" data-idevent="<?= $item->idEvent?>" data-iddoe="<?= $item->idDateOfEvent?>">Count on me!</a></p>
							<p>People that we can count on: <span data-iddoespan="<?= $item->idDateOfEvent?>" class="countedPpl"><?= peopleWhoPressedCountOnLink($item->idDateOfEvent)?></span></p>
						</div>
					</div>
					<?php
						endforeach;
					?>
				</div>
			</div>
		</div>