<?php
	ob_start();
	session_start();
	require_once "config/connection.php";
	require_once "views/fixed/head.php";

	if(!isset($_GET['str']) && !isset($_GET['page'])){
		require_once "../../views/overlay.php";
	}
	require_once "views/fixed/nav.php";

	if(isset($_GET['page'])){
	$page = $_GET['page'];
	switch ($page) {
		case 'updateFormFood':
		require_once "views/foodMenu/updateForm.php";
		break;

		case 'updateFormEvent':
		require_once "views/events/updateAndActivationForm.php";
		break;

		case 'addNewEvent':
		require_once "views/events/addNewEvent.php";
		break;
		
		case 'insertFormFood':
		require_once "views/foodMenu/insertForm.php";
		break;

		case 'reservation':
		require_once "views/reservation/reservation.php";
		break;

		case 'events':
		require_once "views/events/events.php";
		break;

		case 'addOrActivate':
		require_once "views/events/addOrActivate.php";
		break;

		case 'reservationDetails':
		require_once "views/reservationDetails/reservationDetails.php";
		break;

		case 'changeProfilePic':
		require_once "views/changeProfilePic.php";
		break;

		case 'statistics':
		require_once "views/statistics/statistics.php";
		break;

		default:
		require_once "views/foodMenu/foodMenu.php";
		break;
	}
	}else{
		require_once "views/foodMenu/foodMenu.php";
	}

	
	require_once "views/fixed/footer.php";
	require_once "views/fixed/script.php";

