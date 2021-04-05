<?php
    if (!isset($_SESSION['user'])) {
        header("Location: index.php?page=home");
    }
?>
<div class="login" id="fh5co-contact" data-section="reservation">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-12">
						<h2 class="heading to-animate H2">Upload/Change picture</h2>
					</div>
				</div>
				<div class="row">
                <div class="col-lg-12 text-center errors">
                <?php 


                    if(isset($_SESSION['errors'])){
                        
                    foreach($_SESSION['errors'] as $err){

                        echo $err ."<br/>";
                    }

                    unset($_SESSION['errors']);
                    
                    }
                ?>
                </div>
					<div class="col-md-12 col-lg-8 text-center col-md-offset-2 to-animate-2">
                            <form action="models/user/changeProfilePic.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group ">
                                <input id="uplPic"
                                name="uplPic" class="form-control"  type="file">
                            </div>
                            <div class="form-group ">
                                <input class="btn btn-primary"
                                id="btnUpload" name="btnUpload"
                                value="Upload" type="submit">
                            </div>
                            <p>OR</p>
                            </form>
                            <a href="models/user/deleteImageFromDb.php" class="btn btn-primary"
                                id="btnUpload" name="btnUpload"
                                 >Remove your current picture</a>
					    </div>
				</div>
			</div>
		</div>

		
	</div>