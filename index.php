<?php
	ob_start();
	session_start();
	require_once "config/connection.php";
	require_once "views/fixed/head.php";

	if(!isset($_GET['str']) && !isset($_GET['page'])){
		require_once "views/overlay.php";
	}
	require_once "views/fixed/nav.php";

	if(isset($_SESSION['user']) && $_SESSION['user']->roleName == "admin"){
		header("Location: views/admin/admin.php");
	}

	if(isset($_GET['page'])){
		$page = $_GET['page'];
		switch ($page) {
			case 'home':
			require_once "views/foodMenu.php";
			break;

			case 'about':
			require_once "views/about.php";
			break;

			case 'recommended':
			require_once "views/recommended.php";
			break;

			case 'events':
			require_once "views/events.php";
			break;

			case 'reservation':
			require_once "views/reservation.php";
			break;
			
			case 'register':
			require_once "views/register.php";
			break;

			case 'login':
			require_once "views/login.php";
			break;

			case 'changeProfilePic':
			require_once "views/changeProfilePic.php";
			break;

			case 'logout':
			header("Location:models/logout.php");
			break;	

			case 'admin':
			header("Location: views/admin/admin.php");
			break;

			default:
			require_once "views/foodMenu.php";
			break;
		}
	}else{
		require_once "views/foodMenu.php";
	}

	
	require_once "views/fixed/footer.php";
	require_once "views/fixed/script.php";

