<?php
	  
	  use Cars\Models\DB;
	  
	  require_once __DIR__ . "/../../vendor/autoload.php";
	  
	  $dbAction = new DB;
	  /** @noinspection ALL */
	  @session_start();
	  
	  if (isset($_POST['updateOrder'])) {
			 
			 $orderUpdateId = $_POST['orderId'];
			 $data = [
				  "payment_status" => $_POST['payment_status']
			 ];
			 $orderUpdateIdPayment = $dbAction->update("orders", $data)->where(
				  "id", "=", "$orderUpdateId"
			 )->execution();

//			 echo 'payment status has been updated!';
			 header('Refresh:15; URL:admin_orders.php');
			 
	  }
	  
	  if (isset($_GET['delete'])) {
			 $orderId = $_GET['delete'];
			 $deleteUser = $dbAction->delete('orders')->where(
				  'id', '=', "$orderId"
			 )->execution();
//			 header('location:admin_orders.php');
	  }
	  
	  function showUsersOrders(): void
	  {
			 $dbAction = new DB;
			 $usersOrders = $dbAction->select('*', 'orders')->getAll();
			 if ($usersOrders > 0) {
					foreach ($usersOrders as $information) {
						  echo '<div class="box">';
						  foreach ($information as $key => $value) {
								 echo "<p> $key :
					    		  <span> $value </span>
				  				  </p>";
						  }
						  echo '<form action="" method="post">
        						  <input type="hidden" name="orderId" value="'
								. $information['id'] . '">
             				  <select name="payment_status">
            				  <option value="" selected disabled>'
								. $information['payment_status'] .
								'</option>
            				  <option value="pending">pending</option>
             				  <option value="completed">completed</option>
                          </select>
         					  <input type="submit" value="Update" name="updateOrder" class="option-btn">'
								.
								"<a href = " . "admin_orders.php?delete="
								. $information["id"] .
								"class=" . "delete-btn"
								. ">Delete Order </a>" .
								'</form>';
						  
						  
						  echo '</div>';
						  
					}
			 } else {
					echo '<p class="empty">no orders placed yet!</p>';
			 }
	  }