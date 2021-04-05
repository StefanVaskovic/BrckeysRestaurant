<?php
	require_once ABSOLUTE_PATH."views/admin/models/contactReservationPrice/getContactInfo.php";
	require_once ABSOLUTE_PATH."views/admin/models/contactReservationPrice/functions.php";
	if(isset($_SESSION['user']) && $_SESSION['user']->roleName == "user"){
		header("Location: ".ABSOLUTE_PATH."index.php?page=register");
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
						<form action="models/reservation/updatePricePerPerson.php" method="POST">
							<h3 class="">Change price per person: <input type="number" name="priceNumber" id="priceNumber" class="inputsWidth updNumber" value="<?= $price?>"/>$
							<input type="submit" class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update"/></h3>
						</form>
						<form action="models/reservation/updateDiscount.php" method="POST">
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
										if(strpos($item->name, '-') !== false) {
											$name = explode("-",$item->name);
											} else {
											$name = explode("+",$item->name);
											}
										
									?>
									<tr>
										<td>
											<input type="hidden" name="idNOP[]" value="<?= $item->idNOP?>"/>
											<input type="number" class="inputsWidth updNumber" name="numOfPersons[]" value="<?= $name[0]?>">
											<?php
												if($name[1] !== ""):
											?>
											- <input type="number" class="inputsWidth updNumber" name="numOfPersons[]"
											value="<?= $name[1]?>">
										</td>
											<?php
												else:
											?>
											+
										</td>
											<?php endif;?>
										<td><input type="number" name="discount[]" id="discount" class="inputsWidth" value="<?= $item->discount?>"/>%</td>
									</tr>
									
									<?php
										endforeach;
									?>
								</tbody>
							</table>
							<input type="submit" class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update"/>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 to-animate-2">
						<h3>Contact Information</h3>
						<form action="models/reservation/updateContactInfo.php" method="POST">
						<ul class="fh5co-contact-info">
							<li class="fh5co-contact-address ">
								<i class="icon-home"></i>
								<input type="text" class="form-control" name="address" value="<?= $info->address?>"/>
							</li>
							<li><i class="icon-phone"></i>
							<input type="text" class="form-control" name="phone" value="<?= $info->phone?>"/></li>
							<li><i class="icon-envelope"></i><input type="email" name="email" class="form-control" value="<?= $info->email?>"/></li>
						</ul>
						<input type="submit" class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update"/>
						</form>
					</div>
					<div class="col-md-6 to-animate-2">
						<h3>Occasion Form</h3>
						<form action="models/reservation/updateOccasion.php" method="POST">
							<div class="form-group">
								<label for="occation" class="sr-only">Occation</label>
								<ul class="fh5co-contact-info">
									<?php
										$occasions = getOccasion();
										foreach ($occasions as $item):
									?>
									
							<li class="fh5co-contact-address ">
								<input type="hidden" name="idsOccasion[]" value="<?= $item->idOccasion?>"/>
								<input type="text" class="form-control" name="nameOccasion[]" value="<?= $item->name?>"/>
							</li>
									<?php endforeach;?>
									</ul>
							</div>
							<input type="submit" class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update"/>
						</form>
						<form action="models/reservation/insertNewOccasion.php" method="POST">
						<div class="form-group mt-5">
								<label for="tbOccasion" class="sr-only">Occasion</label>
								<input id="newOccasion" name="newOccasion" class="form-control" placeholder="New Occasion" type="text">
							</div>
							<input type="submit" class="btn btn-primary" name="btnInsert" id="btnInsert" value="Insert"/>
						</form>
					</div>
				</div>
			</div>
		</div>

		
	</div>