<?php
    require_once "models/functions.php";
    require_once "models/foodMenu/functions.php";
    if(isset($_SESSION['user']) && $_SESSION['user']->roleName=="user"){
        header("Location: ../../index.php?page=home");
    }
    $id = $_GET['id'];
	$food = getOneFood($id);
	$categories = getCategories();
	
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
						<form action="models/foodMenu/update.php" method="POST">
                        <div class="form-group">
							<input id="idFood" name="idFood" class="form-control" placeholder="idFood" type="hidden" value="<?= $food->idFood?>">
							<input id="idPicture" name="idPicture" class="form-control" placeholder="idPicture" type="hidden" value="<?= $food->idPicture?>">
                        </div>
                        <div class="form-group">
							<label for="nameUpdate" class="sr-only">Name</label>
							<input id="nameUpdate" name="nameUpdate" class="form-control" placeholder="Name" type="text" value="<?= $food->name?>">
                        </div>
                        <div class="form-group">
							<label for="descUpdate" class="sr-only">Description</label>
                            <textarea id="descUpdate" name="descUpdate"
                            class="form-control" placeholder="Description"><?= $food->description?></textarea>
						</div>
						<div class="form-group ">
							<label for="oldPriceUpdate" class="sr-only">OldPrice</label>
                            <input id="oldPriceUpdate"
                            name="oldPriceUpdate"
                            class="form-control updNumber" placeholder="Old Price" type="number" value="<?= $food->oldPrice?>">
                        </div>
                        <div class="form-group ">
							<label for="newPriceUpdate" class="sr-only">NewPrice</label>
							<input id="newPriceUpdate" name="newPriceUpdate" class="form-control updNumber" placeholder="New Price" type="number" step=".01" value="<?= $food->newPrice?>">
                        </div>
                        <div class="form-group ">
							<label for="srcUpdate" class="sr-only">Src</label>
							<input id="srcUpdate" name="srcUpdate" class="form-control" placeholder="Src" type="text" value="<?= $food->src?>">
                        </div>
                        <div class="form-group ">
							<label for="altUpdate" class="sr-only">Alt</label>
							<input id="altUpdate" name="altUpdate" class="form-control" placeholder="Alt" type="text" value="<?= $food->alt?>">
						</div>
						<div class="form-group ">
							<label for="altUpdate" class="sr-only">Recommended</label>
							<input id="recommendedUpd" name="recommendedUpd" class="form-control" placeholder="Recommended" type="number" value="<?= $food->recommended?>">
                        </div>
                        <div class="form-group ">
							<label for="catUpdate" class="sr-only">Category</label>
							<select id="ddlCategory" name="ddlCategory" class="form-control">
								<?php
									foreach ($categories as $item) :
								?>
								<option value="<?= $item->idCategory?>" <?= $food->catName == $item->name ? "selected" : "" ?>><?= $item->name?></option>
								<?php endforeach;?>
							</select>
						</div>
						<div class="form-group ">
                            <input class="btn btn-primary" id="btnUpdate" name="btnUpdate"
                            value="Update" type="submit">
						</div>
                        <div id="errorsUpdate"></div>
                        </form>
						</div>
				</div>
			</div>
		</div>

		
	</div>