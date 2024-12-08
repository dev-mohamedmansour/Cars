<?php
	  
	  use Cars\Models\CARS;
	  use Cars\Models\DB;
	  
	  require_once __DIR__ . "/../../vendor/autoload.php";
	  
	  $dbAction = new DB;
	  $carType = new CARS;
	  /** @noinspection ALL */
	  
	  // logic of contact_us
	  if (isset($_POST['send_message'])) {
			 $dataMessage = [
				  "name"      => $_POST['name'],
				  "email"     => $_POST['email'],
				  "subject"   => $_POST['subject'],
				  "message"   => $_POST['message'],
				  "client_id" => $_SESSION['clientId']
			 ];
			 
			 $sendMessage = $dbAction->insert("contact_us", $dataMessage)
				  ->execution();
			 
			 header('location:index.php');
	  }
	  // logic order products
	  if (isset($_POST['mercedes'])) {
			 
			 $carType->mercedes();
			 
	  } elseif (isset($_POST['volvo'])) {
			 $carType->volvo();
			 
	  } elseif (isset($_POST['BMW'])) {
			 $carType->BMW();
			 
	  } elseif (isset($_POST['jaguar'])) {
			 $carType->jaguar();
			 
	  } elseif (isset($_POST['porsche'])) {
			 $carType->porsche();
			 
	  } elseif (isset($_POST['ferrari'])) {
			 $carType->ferrari();
			 
	  }

