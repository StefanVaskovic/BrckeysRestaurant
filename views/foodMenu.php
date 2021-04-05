<?php
require_once "models/functions.php";
require_once "models/foodMenu/functions.php";
?>
<div id="fh5co-menus" data-section="menu">
	<div class="container">
		<div class="row text-center fh5co-heading row-padded">
			<div class="col-lg-12">
				<h2 class="heading to-animate">Food Menu</h2>
				<p class="sub-heading to-animate">Take a look at what food we offer.</p>
			</div>
		</div>
		<div class="row text-center fh5co-heading row-padded">
			<div class="col-lg-6 to-animate-2">
				<select id="ddlCategories" name="ddlCategories" class="form-control ddls">
					<option value="0" data-str="<?= isset($_GET['str']) ? $_GET['str'] : 1;?>" >Choose category</option>
					<?php
					$allCategories = getAllCategories();
					foreach ($allCategories as $item) :
					?>
						<option value="<?= $item->idCategory ?>" data-str="<?= isset($_GET['str']) ? $_GET['str'] : 1;?>"><?= $item->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="col-lg-6 to-animate-2">
				<select id="ddlPrice" name="ddlPrice" class="form-control ddls">
					<option value="0" data-str="<?= isset($_GET['str']) ? $_GET['str'] : 1;?>">Sort by price</option>
					<option value="1" data-str="<?= isset($_GET['str']) ? $_GET['str'] : 1;?>">Ascending</option>
					<option value="2"data-str="<?= isset($_GET['str']) ? $_GET['str'] : 1;?>">Descending</option>
				</select>
			</div>
		</div>
		<div id="together">
			<div class="row row-padded" id="foodMenuAndCategories">
				<?php
				$categoriesAndNumOfPages = getCategoriesAndNumOfPages();
				$food = getFoodMenu();

				foreach ($categoriesAndNumOfPages["categories"] as $catItem) :
				?>
					<div class="col-md-6">
						<div class="fh5co-food-menu to-animate-2">
							<div class="category">
								<img src="<?= "assets/images/" . $catItem->src ?>" alt="">
								<h2 class=""><?= $catItem->name ?></h2>
								<div class="cistac"></div>
							</div>
							<ul>
								<?php
								foreach ($food as $foodItem) :
									if ($foodItem->catName == $catItem->name) :
								?>

										<li>
											<div class="fh5co-food-desc">
												<figure>
													<img src="<?= "assets/images/" . $foodItem->src ?>" class="img-responsive" alt="<?= $foodItem->alt ?>">
												</figure>
												<div>
													<h3><?= $foodItem->name ?></h3>
													<p><?= $foodItem->description ?></p>
												</div>
											</div>
											<div class="fh5co-food-pricing">
												<?= "$" . $foodItem->oldPrice ?>
											</div>
										</li>


									<?php endif; ?>
								<?php
								endforeach;
								?>
							</ul>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="row">
				<div class="col-md-12 col-lg-8 col-md-offset-2 text-center to-animate-2">
					<?php
					$str = isset($_GET['str']) ? $_GET['str'] : 1;
					for ($i = 1; $i <= $categoriesAndNumOfPages["numOfPages"]; $i++) :
					?>
						<a href="index.php?page=home&str=<?= $i ?>" class="btn btn-primary btn-outline <?= ($str == $i) ? "activeStrLink" : "" ?>"><?= $i ?></a>
					<?php
					endfor;
					?>
				</div>
			</div>
		</div>
	</div>
</div>