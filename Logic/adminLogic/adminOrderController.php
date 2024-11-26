<?php
		
		use Cars\Models\DB;
		
		require_once __DIR__ . "/../../vendor/autoload.php";
		
		$dbAction = new DB();
		/** @noinspection ALL */
		@session_start ();
		
		if ( isset( $_POST[ 'updateOrder' ] ) )
		{
				$orderUpdateId = $_POST[ 'orderId' ];
				$data2 = [
					  "payment_status" => $_POST[ 'payment_status' ]
				];
//				echo "<pre>";
//				var_dump ( $data );
//				echo "<\pre>";
//				die;
				$orderUpdatePayment = $dbAction -> update ("orders",$data2)
					  -> where (
							 "id" , "=" , "$orderUpdateId"
					  ) -> execution ();
				
				//			 header('Refresh:15; URL:admin_orders.php');
				
		}
		
		if ( isset( $_POST[ 'updatePrice' ] ) && $_POST[ 'lastPrice' ] > 0 )
		{
				
				$orderUpdateId = $_POST[ 'orderId' ];
				$data = [
					  "total_price" => $_POST[ 'lastPrice' ] ,
				];
				$orderUpdatePrice = $dbAction -> update ( "orders" , $data )
					  -> where (
							 "id" , "=" , "$orderUpdateId"
					  ) -> execution ();
				
				header ( 'Refresh: 5; url=admin_orders.php' );
		}
		
		if ( isset( $_GET[ 'delete' ] ) )
		{
				$orderId = $_GET[ 'delete' ];
				$deleteUser = $dbAction -> delete ( 'orders' ) -> where (
					  'id' , '=' , "$orderId"
				) -> execution ();
				
		}
		
		function showUsersOrders () : void
		{
				
				$dbAction = new DB();
				$usersOrders = $dbAction -> select ( '*' , 'orders' ) -> getAll ();
				//				echo "<pre>";
				//				var_dump ($usersOrders);
				//				echo "</pre>";die;
				if ( $usersOrders > 0 )
				{
						foreach ( $usersOrders as $information )
						{
								echo '<div class="box">';
								foreach ( $information as $key => $value )
								{
										echo "<p> $key :
					    		  <span> $value </span>
				  				  </p>";
								}
								echo '<form action="" method="post">
        						  <input type="hidden" name="orderId" value="'
									  . $information[ 'id' ] . '">
        						  <p>
        						  <input type="text" name="lastPrice" id="card-success" class="form-group" placeholder="Enter A Total Price">
        						  <input type="submit" value="updatePrice" name="updatePrice" class="form-control">
        						  </p>
        						  <p>
             				  <select name="payment_status">
            				  <option value="" selected disabled>'
									  . $information[ 'payment_status' ] .
									  '</option>
            				  <option value="pending">pending</option>
             				  <option value="completed">completed</option>
                          </select>
         					  <input type="submit" value="Update" name="updateOrder" class="option-btn">
         					  '
									  .
									  "<a href = " . "admin_orders.php?delete="
									  . $information[ "id" ] .
									  "class=" . "delete-btn"
									  . ">Delete Order </a>
         					 		 </p>" .
									  '</form>';
								
								echo '</div>';
								
						}
				} else
				{
						echo '<p class="empty">no orders placed yet!</p>';
				}
		}