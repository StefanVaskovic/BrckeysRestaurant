<?php
    require_once "models/events/functions.php";
    if(isset($_SESSION['user']) && $_SESSION['user']->roleName=="user"){
        header("Location: ../../index.php?page=home");
    }
    $id = $_GET['id'];
    $event = getOneEvent($id);

	if($event->active == 1){
		$event = getActiveEvent($id);
	}
?>
<div class="register" id="fh5co-contact" data-section="reservation">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="heading to-animate H2">Update food</h2>
					</div>
				</div>
				<div class="row text-center">
					<div class="col-md-offset-2 col-md-8 mx-auto to-animate-2">
					<h3>Update Form</h3>
						<form action="models/events/updateForm.php" method="POST">
							<div class="form-group">
								<input id="idEvent" name="idEvent" class="form-control" placeholder="idEvent" type="hidden" value="<?= $event->idEvent?>">
							</div>
							<div class="form-group">
								<label for="nameUpdate" class="sr-only">Name</label>
								<input id="nameUpdate" name="nameUpdate" class="form-control" placeholder="Name" type="text" value="<?= $event->name?>">
							</div>
							<div class="form-group">
								<label for="descUpdate" class="sr-only">Description</label>
								<textarea id="descUpdate" name="descUpdate"
								class="form-control" placeholder="Description"><?= $event->description?></textarea>
							</div>
							<div class="form-group ">
								<input class="btn btn-primary" id="btnUpdate" name="btnUpdate"
								value="Update" type="submit">
							</div>
						</form>
						<h3>Activation Form</h3>
						<form action="models/events/activationForm.php" method="POST">
						<div class="form-group">
							<input id="idEvent" name="idEvent" class="form-control" placeholder="idEvent" type="hidden" value="<?= $event->idEvent?>">
						</div>
						<div class="form-group">
							<select id="ddlEventIsActive" name="ddlEventIsActive" class="form-control">
								<option value="1" <?= $event->active == 1 ? "selected":""?>>Active</option>
								<option value="0" <?= $event->active == 0 ? "selected":""?>>Inactive</option>
							</select>
						</div>
						<div class="form-group" id="eventDate">
							<label for="nameUpdate" class="sr-only">Date</label>
							<input id="eventDateUpdate" name="eventDateUpdate" class="form-control" placeholder="Date" type="date" value="<?= getDateEvent($event->date)?>">
						</div>
						<div class="form-group" id="eventTime">
							<label for="eventTimeUpdate" class="sr-only">Time</label>
							<input id="eventTimeUpdate" name="eventTimeUpdate" class="form-control" placeholder="Time" type="time" value="<?= getTimeEvent($event->date)?>">
                        </div>
						<div class="form-group ">
							<input class="btn btn-primary" id="btnUpdate" name="btnUpdate"
							value="Update" type="submit">
						</div>
                        <?php
							if(isset($_SESSION['errorEvent'])){
								echo $_SESSION['errorEvent'];
								unset($_SESSION['errorEvent']);
							}
						?>
                        </form>
						</div>
				</div>
			</div>
		</div>

		
	</div>