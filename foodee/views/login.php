<?php
    if(isset($_SESSION['user'])){
        header("Location: index.php?page=home");
    }
?>
<div class="login" id="fh5co-contact" data-section="reservation">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-12">
						<h2 class="heading to-animate H2">Login</h2>
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
                            <form action="models/login.php" method="POST">
                            <div class="form-group ">
                                <label for="emailLogin" class="sr-only">Email</label>
                                <input id="emailLogin"
                                name="emailLogin" class="form-control" placeholder="Email" type="email">
                            </div>
                            <div class="form-group ">
                                <label for="passLogin" class="sr-only">Password</label>
                                <input id="passLogin" 
                                name="passLogin"
                                class="form-control" placeholder="Password" type="password">
                            </div>

                            <div class="form-group ">
                                <input class="btn btn-primary"
                                id="btnLogin" name="btnLogin"
                                value="Login" type="submit">
                            </div>
                            </form>
					    </div>
				</div>
			</div>
		</div>

		
	</div>