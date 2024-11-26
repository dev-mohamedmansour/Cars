<?php
		
		namespace Cars\Models;
		
		global $dbAction;
		/** @noinspection ALL */
		@session_start ();
		
		class UserInter {
				
				public $selectOrders;
				
				public function getOrders () :array
				{
						
						global $dbAction;
						$userId = $_SESSION[ 'clientId' ];
						
						$this -> selectOrders = $dbAction -> select (
							  "users.name AS Name,
    								users.email AS Email,
    								orders.id AS Order_id,
    								orders.details AS Name_of_car,
    								orders.date AS Data_of_order,
    								cities.city_name AS City,
    								orders.method AS Method_of_pay,
    								orders.total_price AS Total_price,
    								orders.payment_status AS Order_status" ,
							  "orders"
						) -> innerJoin ( "cities" , "orders.city_id" , "cities.id" )
							  -> rightJoin (
									 "users" , "orders.client_id" , "users.id"
							  ) -> where (
									 "users.id" , "=" , $userId
							  ) -> customOrderBy ( "orders.id" ) -> getAll ();
						
						return $this -> selectOrders;
						//						echo "<pre>";
						//						print_r ( $this -> selectOrders );
						//						echo "</pre>";
						//						die();
				}
				
		}