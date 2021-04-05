<?php
    require_once "models/functions.php";
    require_once "models/foodMenu/functions.php";
    if(isset($_SESSION['user']) && $_SESSION['user']->roleName=="user"){
        header("Location: ../../index.php?page=home");
    }
	$categories = getCategories();
	
?>
<div class="register" id="fh5co-contact" data-section="reservation">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="heading to-animate H2">Insert food</h2>
					</div>
				</div>
				<div class="row text-center">
					<div class="col-md-offset-2 col-md-8 mx-auto to-animate-2">
						<h3>Insert Form</h3>
						<form action="models/foodMenu/insert.php" method="POST">
                        <div class="form-group">
							<label for="nameInsert" class="sr-only">Name</label>
							<input id="nameInsert" name="nameInsert" class="form-control" placeholder="Name" type="text" >
                        </div>
                        <div class="form-group">
							<label for="descInsert" class="sr-only">Description</label>
                            <textarea id="descInsert" name="descInsert"
                            class="form-control" placeholder="Description"></textarea>
						</div>
						<div class="form-group ">
							<label for="oldPriceInsert" class="sr-only">OldPrice</label>
                            <input id="oldPriceInsert"
                            name="oldPriceInsert"
                            class="form-control updNumber" placeholder="Old Price" type="number">
                        </div>
                        <div class="form-group ">
							<label for="newPriceInsert" class="sr-only">NewPrice</label>
							<input id="newPriceInsert" name="newPriceInsert" class="form-control updNumber" placeholder="New Price" type="number" step=".01">
                        </div>
                        <div class="form-group ">
							<label for="srcInsert" class="sr-only">Src</label>
							<input id="srcInsert" name="srcInsert" class="form-control" placeholder="Src" type="text" >
                        </div>
                        <div class="form-group ">
							<label for="altInsert" class="sr-only">Alt</label>
							<input id="altInsert" name="altInsert" class="form-control" placeholder="Alt" type="text" >
						</div>
						<div class="form-group ">
							<label for="altInsert" class="sr-only">Recommended</label>
							<input id="recommendedUpd" name="recommendedUpd" class="form-control" placeholder="Recommended" type="number">
                        </div>
                        <div class="form-group ">
							<label for="catInsert" class="sr-only">Category</label>
							<select id="ddlCategory" name="ddlCategory" class="form-control">
								<?php
									foreach ($categories as $item) :
								?>
								<option value="<?= $item->idCategory?>"><?= $item->name?></option>
								<?php endforeach;?>
							</select>
						</div>
						<div class="form-group ">
                            <input class="btn btn-primary" id="btnInsert" name="btnInsert"
                            value="Insert" type="submit">
						</div>
                        <div id="errorsInsert"></div>
                        </form>
						</div>
				</div>
			</div>
		</div>

		
	</div>