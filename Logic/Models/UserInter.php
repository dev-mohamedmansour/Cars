<?php
	  
	  namespace Cars\Models;
	  
	  global $dbAction;
	  /** @noinspection ALL */
	  @session_start();
	  
	  class UserInter
	  {
			 
			 public $selectOrders;
			 
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
			 
			 public function checkGovernorate($governorate, $city): string
			 {
					global $dbAction;
					$governorate = $_POST['Governorate'];
					$city = $_POST['City'];
					
					if (isset($governorate) && isset($city)) {
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
										return $idCity = $selectCity['id'];
										
								 } else {
										header('location:sign_up.php');
										return "this city not selected";
										
								 }
						  } else{
								 header('location:sign_up.php');
								 return "this not governorate";
						  }
					}
					return "check done";
			 }
			 
	  }