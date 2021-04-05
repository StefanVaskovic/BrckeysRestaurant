<?php
	require_once "config/connection.php";
	require_once "models/navbar/functions.php";
	require_once "models/user/getUserPic.php";
?>
<div class="js-sticky">
			<div class="fh5co-main-nav">
				<div class="container-fluid">
					<div class="fh5co-menu-1 text-center">
						<?php
							$navbar = getNav();
							
							$previousValue = null;
							foreach ($navbar as $item):	
						?>
						<a href="<?= $item->href?>" class="navLink"><?= $item->name?></a>
						<?php
							endforeach;
						?>
						<?php
							if(isset($_SESSION['user'])):
						?>
						
						<a href="index.php?page=logout" class="navLink">Logout</a>
						<a href="index.php?page=reservation" class="navLink">Reservation</a>
						
						<?php
							elseif(!isset($_SESSION['user'])):
						?>
						<a href="index.php?page=register" class="navLink">Register</a>
						<a href="index.php?page=login" class="navLink">Login</a>
						<?php 
							endif;
						?>
						<?php
						 if(isset($_SESSION['user']) && !empty($picture)):
?>


        <a href="index.php?page=changeProfilePic" class="linkUserPic">
		<img src="<?= "assets/img/".$picture->src?>" alt="<?= $picture->alt?>" class="userPic img-responsive img-circle"/></a>


    <?php
        elseif(isset($_SESSION['user'])):
    ?>

        <a href="index.php?page=changeProfilePic" class="linkUserPic">
		<img src="assets/images/profilePicDefault.png" alt="default" class="userPic img-responsive img-circle"/>
        </a>
        <?php endif;?>
					</div>
					<div class="fh5co-logo d-flex justify-content-center align-items-center">
						<a href="index.php?page=home" class="navLink">Brckey</a>
					</div>				
				</div>
			</div>
		</div>