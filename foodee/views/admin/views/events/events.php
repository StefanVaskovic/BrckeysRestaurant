	<?php
		require_once "models/events/functions.php";
	?>
	<div id="fh5co-events" data-section="events" data-stellar-background-ratio="0.5">
			<!-- <div class="fh5co-overlay"></div> -->
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-12 to-animate">
						<h2 class="heading">Events</h2>
					</div>
				</div>
				<div class="row">
					<?php
						$events = getAllEvents();
						foreach ($events as $item) :
					?>
					<div class="col-md-4">
						<div class="fh5co-event to-animate-2">
							<h3><?= $item->name?></h3>
							<a href="admin.php?page=updateFormEvent&id=<?= $item->idEvent?>">Modify</a>
						</div>
					</div>
					<?php
						endforeach;
					?>
					<div class="fh5co-event to-animate-2 addNewEvent">
						<h3>ADD NEW EVENT</h3>
						<a href="admin.php?page=addNewEvent">
							<i class="fa fa-plus-square fa-3x"></i>
						</a>							
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2 to-animate">
						<h1>Current Events</h1>
					</div>
				</div>
				<div class="row">
					<?php
						$events = getEvents();
						foreach ($events as $item) :
					?>
					<div class="col-md-4">
						<div class="fh5co-event to-animate-2">
							<h3><?= $item->name?></h3>
							<span class="fh5co-event-meta"><?= modifyDate($item->date);?></span>
							<p><?= $item->description?></p>
							<p>People that we can count on: <span data-iddoespan="<?= $item->idDateOfEvent?>" class="countedPpl"><?= peopleWhoPressedCountOnLink($item->idDateOfEvent)?></span></p>
							<a href="models/events/deleteSpecificEvent.php?idDateOfEvent=<?= $item->idDateOfEvent?>&idEvent=<?= $item->idEvent?>">Delete</a>
						</div>
					</div>
					<?php
						endforeach;
					?>
				</div>
			</div>
		</div>