<?php
	require_once ABSOLUTE_PATH."models/contactReservationPrice/getContactInfo.php";
	require_once ABSOLUTE_PATH."models/contactReservationPrice/functions.php";
	if(!isset($_SESSION['user'])){
		header("Location: index.php?page=register");
	}
?>
<div id="fh5co-contact" data-section="reservation">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-12">
						<h2 class="heading to-animate">Reserve a Table</h2>
						<p class="sub-heading to-animate">Call us,send email or fill in form down below and get tables for you and your friends.</p>
					</div>
					<div class="col-md-12 table-responsive">
						<?php
							$price = getPricePerPerson();
						?>
						<h3 class="pricePerPerson">Price for one person is <span id="priceNumber"><?=$price?></span>$</h3>
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th scope="col">Number of People</th>
									<th scope="col">Discount</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$price = getNumberOfPersonsDiscount();
									foreach ($price as $item):
								?>
								<tr>
									<td><?= $item->name?></td>
									<td><?= $item->discount."%"?></td>
								</tr>
								<?php
									endforeach;
								?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 to-animate-2">
						<h3>Contact Information</h3>
						<ul class="fh5co-contact-info">
							<li class="fh5co-contact-address ">
								<i class="icon-home"></i>
								<?= $info->address?>
							</li>
							<li><i class="icon-phone"></i><?= $info->phone?></li>
							<li><i class="icon-envelope"></i><?= $info->email?></li>
						</ul>
					</div>
					<div class="col-md-6 to-animate-2">
						<h3>Reservation Form</h3>
						<form action="#" method="POST">
							<div class="form-group">
								<label for="occation" class="sr-only">Occation</label>
								<select class="form-control" name="occasion" id="occation">
									<option value="0">Choose an Occasion</option>
									<?php
										$occasions = getOccasion();
										foreach ($occasions as $item):
									?>
									<option value="<?= $item->idOccasion?>"><?= $item->name?></option>
									<?php endforeach;?>
								</select>
							</div>
							<div class="form-group ">
								<label for="date" class="sr-only">Date</label>
								<input id="dateOfReservation" name="dateOfReservation" class="form-control" placeholder="Date" type="date">
							</div>
							<div class="form-group ">
								<label for="date" class="sr-only">Time</label>
								<input id="timeOfReservation" name="timeOfReservation" class="form-control" min="12:00" placeholder="Time" type="time">
							</div>
							<div class="form-group ">
								<label for="date" class="sr-only">Number Of People</label>
								<input id="number" name="numberOfPpl" class="form-control" min="1" placeholder="Number of People" type="number">
								<span id="sumPrice"></span>
							</div>
							<div class="form-group ">
								<label for="message" class="sr-only">Message</label>
								<textarea id="message" name="message" cols="30" rows="5" class="form-control" placeholder="Message (Optional)"></textarea>
							</div>
							<div class="form-group ">
								<input id="btnReserve" name="btnReserve" class="btn btn-primary" value="Reserve" type="button">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		
	</div>