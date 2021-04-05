<?php
    require_once "models/events/functions.php";
    if(isset($_SESSION['user']) && $_SESSION['user']->roleName=="user"){
        header("Location: ../../index.php?page=home");
    }
?>
<?php
	if(!isset($_GET['confirm'])):
?>
	<div class="register" id="fh5co-contact" data-section="reservation">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="heading to-animate H2">Update Event</h2>
					</div>
				</div>
				<div class="row text-center">
					<div class="col-md-offset-2 col-md-8 mx-auto to-animate-2">	
                        <p>This is/was activated event already.Do you want to add another one, or just to activate the same one again with datetime you specified?</p>
                        <a href="models/events/addAnotherEvent.php" class="btn btn-primary">Add Another One</a>
                        <a href="models/events/activateCurrentEvent.php" class="btn btn-primary">Active/Update The Current One</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
<?php else:?>
	<div class="register" id="fh5co-contact" data-section="reservation">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="heading to-animate H2">Update Event</h2>
					</div>
				</div>
				<div class="row text-center">
					<div class="col-md-offset-2 col-md-8 mx-auto to-animate-2">	
                        <p>Confirm activating new event.</p>
                        <a href="models/events/addAnotherEvent.php" class="btn btn-primary">Confirm</a>
                    </div>
				</div>
			</div>
		</div>

		
	</div>
<?php endif;?>