<?php
	require_once "models/foodMenu/functions.php";
?>
<div id="fh5co-menus" data-section="menu">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-12">
						<h2 class="heading to-animate">Food Menu</h2>
					</div>
				</div>
				<div class="row row-padded text-center">
					<div class="col-lg-12">
					<h1><a href="admin.php?page=insertFormFood" >Insert new food</a></h1>
					</div>
					<div class="col-lg-12 table-responsive mt-5">
						<table class="table table-striped table-bordered table-hover">
							<thead class="thead-light">
								<tr>
									<th scope="col">Name</th>
									<th scope="col">Description</th>
									<th scope="col">OldPrice</th>
									<th scope="col">NewPrice</th>
									<th scope="col">Src</th>
									<th scope="col">Alt</th>
									<th scope="col">Category</th>
									<th scope="col">Recommended</th>
									<th scope="col">Update</th>
									<th scope="col">Delete</th>
								</tr>
							</thead>
							<tbody>
					<?php 
						$food = getFoodMenu();
						
						foreach ($food as $item):
					?>
									<tr>
										<td><?= $item->name?></td>
										<td><?= $item->description?></td>
										<td><?= $item->oldPrice?></td>
										<td><?= $item->newPrice?></td>
										<td><?= $item->src?></td>
										<td><?= $item->alt?></td>
										<td><?= $item->catName?></td>
										<td><?= $item->recommended?></td>
										<td><a href="admin.php?page=updateFormFood&id=<?= $item->idFood?>">Update</a></td>
										<td><a href="models/delete/delete.php?id=<?= $item->idFood?>">Delete</a></td>
									</tr>
									
					
						<?php endforeach;?>
							</tbody>	
						</table>
					</div>
				</div>
				<!-- <div class="row">
					<div class="col-md-4 col-md-offset-4 text-center to-animate-2">
						<?php
							$str = isset($_GET['str'])?$_GET['str']:1;
							for($i=1;$i<=$categoriesAndNumOfPages["numOfPages"];$i++):
						?>
						<a href="index.php?page=admin&admin=true&str=<?= $i?>" class="btn btn-primary btn-outline <?= ($str == $i)? "activeStrLink" : ""?>"><?= $i?></a>
						<?php
							endfor;
						?>
					</div>
				</div> -->
			</div>
		</div>