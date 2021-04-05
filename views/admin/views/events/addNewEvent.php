<?php
    require_once "models/events/functions.php";
    if(isset($_SESSION['user']) && $_SESSION['user']->roleName=="user"){
        header("Location: ../../index.php?page=home");
    }

?>
<div class="register" id="fh5co-contact" data-section="reservation">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="heading to-animate H2">Insert Event</h2>
					</div>
				</div>
				<div class="row text-center">
					<div class="col-md-offset-2 col-md-8 mx-auto to-animate-2">
					<h3>Insert Form</h3>
						<form action="models/events/addNewEvent.php" method="POST">
							<div class="form-group">
								<input id="idEvent" name="idEvent" class="form-control" placeholder="idEvent" type="hidden" value="<?= $event->idEvent?>">
							</div>
							<div class="form-group">
								<label for="nameUpdate" class="sr-only">Name</label>
								<input id="nameInsert" name="nameInsert" class="form-control" placeholder="Name" type="text" >
							</div>
							<div class="form-group">
								<label for="descUpdate" class="sr-only">Description</label>
								<textarea id="descriptionInsert" name="descriptionInsert"
								class="form-control" placeholder="Description"></textarea>
							</div>
							<div class="form-group ">
								<input class="btn btn-primary" id="btnInsert" name="btnInsert"
								value="Insert" type="submit">
							</div>
						</form>
				</div>
			</div>
		</div>

		
	</div>