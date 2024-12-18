<?php
	  
	  use Cars\Models\CARS;
	  use Cars\Models\DB;
	  
	  require_once __DIR__ . "/../../vendor/autoload.php";
	  
	  $dbAction = new DB;
	  $carType = new CARS;
	  @session_start();
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
			 $carType->mercedes(
				  $_POST['orderGovernorate'], $_POST['orderCity']
			 );
			 
	  } elseif (isset($_POST['volvo'])) {
			 $carType->volvo(
				  $_POST['orderGovernorate'], $_POST['orderCity']
			 );
			 
	  } elseif (isset($_POST['BMW'])) {
			 $carType->BMW(
				  $_POST['orderGovernorate'], $_POST['orderCity']
			 );
			 
	  } elseif (isset($_POST['jaguar'])) {
			 $carType->jaguar(
				  $_POST['orderGovernorate'], $_POST['orderCity']
			 );
			 
	  } elseif (isset($_POST['porsche'])) {
			 $carType->porsche(
				  $_POST['orderGovernorate'], $_POST['orderCity']
			 );
			 
	  } elseif (isset($_POST['ferrari'])) {
			 $carType->ferrari(
				  $_POST['orderGovernorate'], $_POST['orderCity']
			 );
	  }