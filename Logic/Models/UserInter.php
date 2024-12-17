<?php
	  
	  namespace Cars\Models;
	  
	  @session_start();
	  class UserInter
	  {
			 public array $selectOrders;
			 
			 /**
			  * Retrieves a list of orders for the current user.
			  *
			  * This function queries the database to fetch order details
			  * associated with the user currently logged in, identified by
			  * the session's clientId.
			  *
			  * @return array An array of orders, each containing details such as
			  *               the user's name, email, order ID, car name, order date,
			  *               city, payment method, total price, and order status.
			  */
			 public function getOrders(): array
			 {
					global $dbAction;
					$userId = $_SESSION['clientId'];
					
					$this->selectOrders = $dbAction->select(
						 "users.name AS Name,
                                 users.email AS Email,
                                 orders.id AS Order_id,
                                 orders.details AS Name_of_car,
                                 orders.date AS Data_of_order,
                                 cities.city_name AS City,
                                 orders.method AS Method_of_pay,
                                 orders.total_price AS Total_price,
                                 orders.payment_status AS Order_status",
						 "orders"
					)->innerJoin("cities", "orders.city_id", "cities.id")
						 ->rightJoin(
							  "users", "orders.client_id", "users.id"
						 )->where(
							  "users.id", "=", $userId
						 )->customOrderBy("orders.id")->getAll();
					
					return $this->selectOrders;
			 }
			 
			 /**
			  * Checks if the provided governorate and city are valid.
			  *
			  * This function verifies the existence of a governorate and city
			  * combination in the database. If the combination is valid, it returns
			  * the city ID. Otherwise, it redirects to the sign-up page and returns
			  * an error message.
			  *
			  * @param string $governorate The name of the governorate to check.
			  * @param string $city        The name of the city to check.
			  *
			  * @return string The city ID if valid, or an error message if not.
			  */
			 public function checkGovernorateAndCity(string $governorate,
				  string $city
			 ): string {
					global $dbAction;
					
					if ($governorate || $city) {
						  $selectGovernorate = $dbAction->select("id", "governorates")
								->where("governorate_name", " = ", "$governorate")
								->getRow();
						  if (isset($selectGovernorate)) {
								 $idGovernorate = $selectGovernorate['id'];
								 
								 $selectCity = $dbAction->select("id", "cities")
									  ->where("city_name", " = ", "$city")->andWhere(
											"governorate_id", "=", "$idGovernorate"
									  )->getRow();
								 if (isset($selectCity)) {
										return $selectCity['id'];
										
								 } else {
										header('location:sign_up.php');
										return "this city not selected";
										
								 }
						  } else {
								 header('location:sign_up.php');
								 return "this not governorate";
						  }
					}
					return "check done";
			 }
			 
	  }