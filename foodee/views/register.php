<?php
    if(isset($_SESSION['user'])){
        header("Location: index.php?page=home");
    }
?>
<div class="register" id="fh5co-contact" data-section="reservation">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-12">
						<h2 class="heading to-animate H2">Make an account</h2>
					</div>
				</div>
				<div class="row text-center">
					<div class="col-md-offset-2 col-md-8 mx-auto to-animate-2">
						<h3>Registration Form</h3>
						<form>
                        <div class="form-group ">
							<label for="nameReg" class="sr-only">Name</label>
							<input id="nameReg" name="nameReg" class="form-control" placeholder="Name" type="text">
							<span id="nameErr"></span>
                        </div>
                        <div class="form-group">
							<label for="surnameReg" class="sr-only">Surname</label>
                            <input id="surnameReg" name="surnameReg"
                            class="form-control" placeholder="Surname" type="text">
							<span id="surnameErr"></span>
						</div>
						<div class="form-group ">
							<label for="emailReg" class="sr-only">Email</label>
                            <input id="emailReg"
                            name="emailReg"
                            class="form-control" placeholder="Email" type="email">
							<span id="emailErr"></span>
                        </div>
                        <div class="form-group ">
							<label for="passwordReg" class="sr-only">Password</label>
							<input id="passwordReg" name="passwordReg" class="form-control" placeholder="Password" type="password">
							<span id="passwordErr"></span>
                        </div>
                        <div class="form-group ">
							<label for="passwordReg" class="sr-only">Confirm Password</label>
							<input id="ConfPasswordReg" name="ConfPasswordReg" class="form-control" placeholder="Confirm Password" type="password">
							<span id="ConfPasswordErr"></span>
						</div>
						<div class="form-group ">
                            <input class="btn btn-primary" id="btnRegister" name="btnRegister"
                            value="Register" type="button">
						</div>
						<span>Already have an account? </span><a href="index.php?page=login">Login</a>
                        <div id="errorsReg"></div>
                        </form>
						</div>
				</div>
			</div>
		</div>

		
	</div>