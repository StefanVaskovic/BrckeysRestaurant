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
						<h2 class="heading to-animate">Reservation Details</h2>
					</div>
					<div class="col-md-12 table-responsive">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
										<th scope="col">Surname</th>
										<th scope="col">Email</th>

                                        <th scope="col">Number of People</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Occasion Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$info = getReservationInfo();
										foreach ($info as $item):
										
									?>
									<tr>
                                        <td>
                                            <?= $item->idUser?>
                                        </td>
										<td>
                                            <?= $item->userName?>
                                        </td>
                                        <td>
                                            <?= $item->userSurname?>
										</td>
										<td>
                                            <?=$item->email?>
                                        </td>
                                        <td>
                                            <?=$item->NOP?>
                                        </td>
                                        <td>
                                            <?=$item->price."$"?>
                                        </td>
                                        <td>
                                            <?=$item->occasionName?>
                                        </td>
                                        <td>
                                            <?=$item->date?>
                                        </td>
                                        <td>
                                            <?=$item->time?>
                                        </td>
									</tr>
									
									<?php
										endforeach;
									?>
								</tbody>
							</table>
					</div>
				</div>
	    </div>