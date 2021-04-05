<?php
	require_once "models/recommendedFood/functions.php";
?>
<div id="fh5co-featured" data-section="features">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-12">
						<h2 class="heading to-animate">Recommended meals</h2>
						<p class="sub-heading to-animate">Here is what we recommend you to try,according to our opinion.</p>
					</div>
				</div>
				<div class="row">
					<div class="fh5co-grid">
						<?php 
							$recommendedFood = getRecommendedFood();

							foreach ($recommendedFood as $item) :
						?>
						<div class="fh5co-v-half">
							<div class="fh5co-h-row-2 to-animate-2">
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(assets/images/<?= $item->src?>)"></div>
								<div class="fh5co-v-col-2 fh5co-text arrow-left">
									<h2><?= $item->name?></h2>
									<del><?= $item->newPrice != null ? "$".$item->oldPrice : ""?></del>
									<span class="pricing"><?= $item->newPrice == null ? "$".$item->oldPrice : "$".$item->newPrice ?></span>
									<p><?= $item->description?></p>
								</div>
							</div>
						</div>
						<?php
							endforeach;
						?>
					</div>
				</div>

			</div>
		</div>