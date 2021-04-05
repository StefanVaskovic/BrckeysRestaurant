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
						<!-- <div class="fh5co-v-half to-animate-2">
							<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(images/p_moje1.jpg)"></div>
							<div class="fh5co-v-col-2 fh5co-text fh5co-special-1 arrow-left">
								<h2>Fresh Mushrooms</h2>
								<span class="pricing">$7.50</span>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							</div>
						</div> -->
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
						<!-- <div class="fh5co-v-half">
							<div class="fh5co-h-row-2 to-animate-2">
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(assets/images/moje16.jpg)"></div>
								<div class="fh5co-v-col-2 fh5co-text arrow-left">
									<h2>Grilled Chiken Salad</h2>
									<span class="pricing">$12.00</span>
									<p>Far far away, behind the word mountains.</p>
								</div>
							</div>
						</div>
						<div class="fh5co-v-half">
							<div class="fh5co-h-row-2 to-animate-2">
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(assets/images/moje16.jpg)"></div>
								<div class="fh5co-v-col-2 fh5co-text arrow-left">
									<h2>Grilled Chiken Salad</h2>
									<span class="pricing">$12.00</span>
									<p>Far far away, behind the word mountains.</p>
								</div>
							</div>
						</div>
						<div class="fh5co-v-half">
							<div class="fh5co-h-row-2 to-animate-2">
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(assets/images/moje16.jpg)"></div>
								<div class="fh5co-v-col-2 fh5co-text arrow-left">
									<h2>Grilled Chiken Salad</h2>
									<span class="pricing">$12.00</span>
									<p>Far far away, behind the word mountains.</p>
								</div>
							</div>
						</div> -->
							<!-- <div class="fh5co-h-row-2 fh5co-reversed to-animate-2">
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(images/p_moje3.jpg)"></div>
								<div class="fh5co-v-col-2 fh5co-text arrow-right">
									<h2>Cheese and Garlic Toast</h2>
									<span class="pricing">$4.50</span>
									<p>Far far away, behind the word mountains.</p>
								</div>
							</div>
						</div>

						<div class="fh5co-v-half">
							<div class="fh5co-h-row-2 fh5co-reversed to-animate-2">
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(images/p_moje4.jpg)"></div>
								<div class="fh5co-v-col-2 fh5co-text arrow-right">
									<h2>Organic Egg</h2>
									<span class="pricing">$4.99</span>
									<p>Far far away, behind the word mountains.</p>
								</div>
							</div>
							<div class="fh5co-h-row-2 to-animate-2">
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(images/p_moje6.jpg)"></div>
								<div class="fh5co-v-col-2 fh5co-text arrow-left">
									<h2>Salad with Crispy Chicken</h2>
									<span class="pricing">$8.50</span>
									<p>Far far away, behind the word mountains.</p>
								</div>
							</div>
						</div> -->
						<!-- <div class="fh5co-v-half to-animate-2">
							<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(images/p_moje5.jpg)"></div>
							<div class="fh5co-v-col-2 fh5co-text fh5co-special-1 arrow-left">
								<h2>Tomato Soup with Chicken</h2>
								<span class="pricing">$12.99</span>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							</div>
						</div> -->

					</div>
				</div>

			</div>
		</div>