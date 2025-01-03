<?php
	  
	  use Cars\Models\DB;
	  use Cars\Models\UserInter;
	  
	  require_once __DIR__ . "/../../vendor/autoload.php";
	  
	  $dbAction = new DB();
	  $userDetails = new UserInter();
	  @session_start();
	  //Logic of orders
	  if (isset($_POST['order'])) {
			 
			 $filterGovernorate = strip_tags(
				  $_POST['orderCustomizeGovernorate']
			 );
			 
			 $governorate = mysqli_real_escape_string(
				  $dbAction->connection,
				  $filterGovernorate
			 );
			 
			 $filterCity = strip_tags(
				  $_POST['orderCustomizeCity']
			 );
			 
			 $city = mysqli_real_escape_string(
				  $dbAction->connection,
				  $filterCity
			 );
			 
			 $checkCityGovernorate = $userDetails->checkGovernorateAndCity(
				  "$governorate", "$city"
			 );
			 
			 if ($checkCityGovernorate == "this city not selected"
				  || $checkCityGovernorate == "this not governorate"
			 ) {
					header('location:../orderCustomize.php');
					echo "<h2 style='color: red'> City or Governorate not selected. </h2>";
			 } else {
					
					$categoryCarDetails = [
						 "type"  => $_POST['type'],
						 "cc"    => $_POST['cc'],
						 "model" => $_POST['model'],
						 "year"  => $_POST['year'],
						 "color" => $_POST['color'],
					];
					
					$addCarCategory = $dbAction->insert(
						 "category_car",
						 $categoryCarDetails
					)->execution();
					
					$lastCarCategoryId = $dbAction->select(
						 "id",
						 "category_car"
					)->orderBy("id")->getRow();
					
					$categoryValues = [
						 "category_id" => $lastCarCategoryId['id'],
						 "name_car"    => $_POST['brand_name'],
					];
					
					$addCar = $dbAction->insert("cars", $categoryValues)
						 ->execution();
					
					$lastCarId = $dbAction->select(
						 "id",
						 "cars"
					)->orderBy("id")->getRow();
					
					$userID = $_SESSION['clientId'];
					
					$dataOrder = [
						 "client_id" => $_SESSION['clientId'],
						 "car_id"    => $lastCarId['id'],
						 "details"   => $_POST['brand_name'] . " "
							  . $_POST['model'],
						 "city_id"   => $checkCityGovernorate
					];
					
					$order = $dbAction->insert("orders", $dataOrder)
						 ->execution();
					
					$lastOrderId = $dbAction->select(
						 "id",
						 "orders"
					)->orderBy("id")->getRow();
					
					$dataCampany = [
						 "order_id" => $lastOrderId['id'],
						 "name"     => $_POST['brand_name'] . " " . "campany",
					];
					
					$campany = $dbAction->insert("campany", $dataCampany)
						 ->execution();
					
					echo 'order send successfully!';
					header('location:../index.php');
			 }
			 
	  }
	  /**
		* This function is responsible for displaying the user's orders.
		* It retrieves the user's orders from the database using the UserInter class,
		* and then iterates through the orders to display them in a formatted manner.
		* For completed orders, it provides an option to update the payment method and
		* links to the billing page for credit card payments.
		*
		* @return void
		*/
	  function showOrders(): void
	  {
			 
			 $userDetails = new UserInter();
			 
			 $userOrders = $userDetails->getOrders();
//			 echo "<pre>";
//			 var_dump($userOrders);
//			 echo "</pre>";
//			 die();
			 if ($userOrders > 0) {
					foreach ($userOrders as $information) {
						  
						  echo '<div class="box">';
						  foreach ($information as $key => $value) {
								 if ($information['order_status']
									  == "completed"
								 ) {
										echo "<p> $key :
					    		  <span> $value </span>
				  				  </p>";
								 } elseif ($information['order_status']
									  == "pending"
								 ) {
										if ($key == "total_price") {
											  continue;
										}
										echo "<p> $key :
					    		  <span> $value </span>
				  				  </p>";
								 }
						  }
						  if ($information['order_status'] == "completed") {
								 echo '<form action="" method="post">
													  <input type="hidden" name="userOrderId" value="'
									  . $information['Order_id'] . '">
													  <select name="method">
													  <option value="" selected disabled>'
									  . $information['Method_of_pay'] .
									  '</option>
													  <option value="credit cart">Credit Cart</option>
													  <option value="PayPal">PayPal</option>
													  <option value="instaPay">instaPay</option>
													  </select>
													  <input type="submit" value="Update" name="updateUserOrder" class="option-btn">'
									  . '</form>';
								 if ($information['Method_of_pay'] == "credit cart"
								 ) {
										echo "<a href = "
											 . "../billingPages/billing.php"
											 . ">Pay </a>";
								 }
						  }
						  echo '</div>';
					}
			 }
	  }
	  
	  if (isset($_POST['updateUserOrder'])) {
			 $orderUpdate = $_POST['userOrderId'];
			 
			 $data = [
				  "method" => $_POST['method'],
			 ];
			 
			 $orderUpdateIdPayment = $dbAction->update("orders", $data)
				  ->where(
						"id",
						"=",
						"$orderUpdate"
				  )->execution();
	  }
	  
	  
	  