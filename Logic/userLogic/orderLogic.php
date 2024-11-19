<?php
	  
	  use Cars\Models\DB;
	  use Cars\Models\UserInter;
	  
	  require_once __DIR__ . "/../../vendor/autoload.php";
	  
	  
	  $dbAction = new DB();
	  $userDetails = new UserInter();
	  @session_start();
	  //Logic of orders
	  if (isset($_POST['order'])) {
		  
			 $categoryCarDetails = [
				  "type"  => $_POST['type'],
				  "cc"    => $_POST['cc'],
				  "model" => $_POST['model'],
				  "year"  => $_POST['year'],
				  "color" => $_POST['color']];
			 
			 $addCarCategory = $dbAction->insert(
				  "category_car", $categoryCarDetails
			 )->execution();
			 
			 $lastCarCategoryId = $dbAction->select(
				  "id", "category_car"
			 )->orderBy("id")->getRow();
			 
			 $categoryValues = [
				  "category_id" => $lastCarCategoryId['id'],
				  "name_car"    => $_POST['brand_name']
			 ];
			 
			 $addCar = $dbAction->insert("cars", $categoryValues)->execution();
			 
			 $lastCarId = $dbAction->select(
				  "id", "cars"
			 )->orderBy("id")->getRow();
			 
			 $dataOrder = [
				  "client_id" => $_SESSION['clientId'],
				  "car_id"    => $lastCarId['id'],
				  "details"   => $_POST['brand_name'] . " " . $_POST['model']
			 ];
			 
			 $order = $dbAction->insert("orders", $dataOrder)->execution();
			 $lastOrderId = $dbAction->select(
				  "id", "orders"
			 )->orderBy("id")->getRow();
			 $dataCampany = [
				  "order_id" => $lastOrderId['id'],
				  "name"     => $_POST['brand_name'] . " " . "campany"
			 ];
			 $campany = $dbAction->insert("campany", $dataCampany)->execution();
			 echo '<center style="font:" bold " color: #0dcaf0" >orderPages send successfully!</center>';
			 header('location:../index.php');
	  }
	  function showOrders(): void
	  {
			 $userDetails = new UserInter;
			 $userOrders = $userDetails->getOrders();
			 if ($userOrders > 0) {
					foreach ($userOrders as $information) {
						  echo '<div class="box">';
						  foreach ($information as $key => $value) {
								 if ($information['payment_status'] == "completed") {
										echo "<p> $key :
					    		  <span> $value </span>
				  				  </p>";
								 } elseif ($information['payment_status']
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
						  if ($information['payment_status'] == "completed") {
								 echo '<form action="" method="post">
        						  <input type="hidden" name="userOrderId" value="'
									  . $information['id'] . '">
             				  <select name="method">
            				  <option value="" selected disabled>'
									  . $information['method'] .
									  '</option>
            				  <option value="credit cart">Credit Cart</option>
             				  <option value="PayPal">PayPal</option>
             				  <option value="instaPay">instaPay</option>
                          </select>
         					  <input type="submit" value="Update" name="updateUserOrder" class="option-btn">'
									  . '</form>';
								 if ($information['method'] == "credit cart") {
										echo "<a href = " . "../billingPages/billing.php"
											 . ' ' .
											 "class=" . "delete-btn"
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
				  "method" => $_POST['method']
			 ];
			 $orderUpdateIdPayment = $dbAction->update("orders", $data)->where(
				  "id", "=", "$orderUpdate"
			 )->execution();

//			 echo 'payment status has been updated!';
			 header("Refresh:5 ;URL:orderDetails.php");
			 
	  }
	  
	  
	  