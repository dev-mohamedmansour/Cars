<?php
	  
	  namespace Cars\Models;
	  
	  use Cars\Constract\typeOfCars;
	  
	  @session_start();
	  
	  class CARS extends UserInter implements typeOfCars
	  {
			 public array $data1;
			 public array $data2;
			 public string $model;
			 public array $verfyCar;
			 
			 public array $item;
			 public $orderItem;
			 public string $addOrder;
			 public array $selectOrders;
			 
			 /**
			  * Retrieves car details and processes an order for a Mercedes car.
			  *
			  * This function checks if a Mercedes car exists in the database, retrieves its category ID and price,
			  * and prepares data for processing an order. If the car does not exist, it outputs a message.
			  * It then calls the getCar function to handle the order processing.
			  *
			  * @return array The result of the getCar function, which processes the order and returns the order details.
			  * @global object $dbAction The database action object used for executing queries.
			  */
			 public function mercedes(string $governorate, string $city): array
			 {
					global $dbAction;
					$this->model = 'Mercedes';
					$this->verfyCar = $dbAction->select("*", "cars")->where(
						 "name_car", "=", "$this->model"
					)->getRow();
					
					if (!$this->verfyCar) {
						  echo "<h1 style='color: #0dcaf0'>car not exist!</h1>";
					}
					
					$categoryId = $this->verfyCar['category_id'];
					
					$price = $dbAction->select('price', 'category_car')->where(
						 'id', '=', "$categoryId"
					)->getRow();
					
					$this->data1 = [
						 "category_id" => $this->verfyCar['category_id'],
					];
					
					$this->data2 = [
						 "client_id"   => $_SESSION['clientId'],
						 "car_id"      => $this->verfyCar['id'],
						 "details"     => $_POST['mercedes'],
						 "total_price" => $price['price'],
					];
					
					return $this->getCar(
						 $this->data2, $this->data1, $governorate, $city
					);
			 }
			 
			 /**
			  * Processes a car order based on provided data and location information.
			  *
			  * This function validates the governorate and city, checks for existing orders,
			  * inserts a new order if none exists, and retrieves car and category details.
			  *
			  * @param array $data1 An array containing category information.
			  * @param array $data2 An array containing order details such as client_id, car_id, and details.
			  * @param       $governorate The governorate name for the order.
			  * @param       $city        The city name for the order.
			  *
			  * @return array Returns the result of processing the order through the handelOrder method.
			  *               If the governorate or city is invalid, it returns the result of handelOrder with the last known item.
			  */
			 public function getCar(array $data1, array $data2,
				  $governorate,
				  $city
			 ): string {
					
					$userDetails = new  UserInter();
					global $dbAction;
					if (empty($governorate) && empty($city)) {
						  $this->data2["city_id"] = $_SESSION['userCityId'];
						  $this->orderItem = $dbAction->select("*", "orders")
								->where(
									 "client_id", "=", $this->data2['clientId']
								)->andWhere(
									 "car_id", "=", $this->data2['car_id']
								)->getRow();
						  
						  if ($this->orderItem > 0) {
								 echo "<h1 style='color: #0dcaf0'>orderPages already exist!</h1>";
						  } else {
								 $this->addOrder = $dbAction->insert(
									  "orders", $this->data2
								 )->execution();
								 echo 'order send successfully!';
								 header("Location: index.php");
						  }
					} else {
						  $checkCityGovernorate
								= $userDetails->checkGovernorateAndCity(
								"$governorate", "$city"
						  );
						  
						  if ($checkCityGovernorate == "this city not selected"
								|| $checkCityGovernorate == "this not governorate"
						  ) {
								 header('location:index.php#products');
								 echo "<h2 style='color: red'> City or Governorate not selected. </h2>";
						  } else {
								 
								 $this->data2["city_id"] = $checkCityGovernorate;
								 $this->orderItem = $dbAction->select("*", "orders")
									  ->where(
											"client_id", "=", $this->data2['clientId']
									  )->andWhere(
											"car_id", "=", $this->data2['car_id']
									  )->andWhere(
											"city_id", "=", $this->data2['city_id']
									  )
									  ->getRow();
								 
								 if ($this->orderItem > 0) {
										echo "<h1 style='color: #0dcaf0'>orderPages already exist!</h1>";
								 } else {
										$this->addOrder = $dbAction->insert(
											 "orders", $this->data2
										)->execution();
										
										return 'order send successfully!';
								 }
						  }
					}
					return "order send successfully!";
			 }
			 
			 /**
			  * Processes an order and handles order-related operations.
			  *
			  * This function takes an item array as a parameter, which contains car and category details.
			  * It prints the item array for debugging purposes and then returns the same array.
			  *
			  * @param array $item An array containing car and category details.
			  *
			  * @return array The same item array that was passed as a parameter.
			  */
//			 public function handelOrder(array $item): array
//			 {
//					echo "<pre>";
//					print_r($item);
//					echo "</pre>";
//					return $item;
//			 }
			 
			 /**
			  * Processes an order for a Ferrari car.
			  *
			  * This function checks if a Ferrari car exists in the database, retrieves its category ID,
			  * and prepares data for processing an order. It then calls the getCar function to handle the order processing.
			  *
			  * @return array The result of the getCar function, which processes the order and returns the order details.
			  * @global object $dbAction The database action object used for executing queries.
			  */
			 public function ferrari($governorate, $city): array
			 {
					global $dbAction;
					$this->model = 'Ferrari';
					
					$this->verfyCar = $dbAction->select("*", "cars")->where(
						 "name_car", "=", "$this->model"
					)->getRow();
					$this->data1 = [
						 
						 "category_id" => $this->verfyCar['category_id'],
					];
					$this->data2 = [
						 "client_id" => $_SESSION['clientId'],
						 "car_id"    => $this->verfyCar['id'],
						 "details"   => $_POST['ferrari'],
					];
					
					return $this->getCar(
						 $this->data2, $this->data1, $governorate, $city
					);
			 }
			 
			 /**
			  * Processes an order for a Porsche car.
			  *
			  * This function checks if a Porsche car exists in the database, retrieves its category ID,
			  * and prepares data for processing an order. It then calls the getCar function to handle the order processing.
			  *
			  * @return array The result of the getCar function, which processes the order and returns the order details.
			  * @global object $dbAction The database action object used for executing queries.
			  */
			 public function porsche($governorate, $city): array
			 {
					global $dbAction;
					$this->model = 'Porsche';
					
					$this->verfyCar = $dbAction->select("*", "cars")->where(
						 "name_car", "=", "$this->model"
					)->getRow();
					$this->data1 = [
						 
						 "category_id" => $this->verfyCar['category_id'],
					];
					$this->data2 = [
						 
						 "client_id" => $_SESSION['clientId'],
						 "car_id"    => $this->verfyCar['id'],
						 "details"   => $_POST['porsche'],
					];
					
					return $this->getCar(
						 $this->data2, $this->data1, $governorate, $city
					);
			 }
			 
			 /**
			  * Processes an order for a Jaguar car.
			  *
			  * This function checks if a Jaguar car exists in the database, retrieves its category ID,
			  * and prepares data for processing an order. It then calls the getCar function to handle the order processing.
			  *
			  * @return array The result of the getCar function, which processes the order and returns the order details.
			  * @global object $dbAction The database action object used for executing queries.
			  */
			 public function jaguar($governorate, $city): array
			 {
					global $dbAction;
					$this->model = 'Jaguar';
					
					$this->verfyCar = $dbAction->select("*", "cars")->where(
						 "name_car", "=", "$this->model"
					)->getRow();
					$this->data1 = [
						 
						 "category_id" => $this->verfyCar['category_id'],
					];
					$this->data2 = [
						 
						 "client_id" => $_SESSION['clientId'],
						 "car_id"    => $this->verfyCar['id'],
						 "details"   => $_POST['jaguar'],
					];
					
					return $this->getCar(
						 $this->data2, $this->data1, $governorate, $city
					);
			 }
			 
			 /**
			  * Processes an order for a BMW car.
			  *
			  * This function checks if a BMW car exists in the database, retrieves its category ID,
			  * and prepares data for processing an order. It then calls the getCar function to handle the order processing.
			  *
			  * @return array The result of the getCar function, which processes the order and returns the order details.
			  * @global object $dbAction The database action object used for executing queries.
			  */
			 public function BMW($governorate, $city): array
			 {
					global $dbAction;
					$this->model = 'BMW';
					
					$this->verfyCar = $dbAction->select("*", "cars")->where(
						 "name_car", "=", "$this->model"
					)->getRow();
					$this->data1 = [
						 
						 "category_id" => $this->verfyCar['category_id'],
					];
					$this->data2 = [
						 
						 "client_id" => $_SESSION['clientId'],
						 "car_id"    => $this->verfyCar['id'],
						 "details"   => $_POST['BMW'],
					];
					
					return $this->getCar(
						 $this->data2, $this->data1, $governorate, $city
					);
			 }
			 
			 /**
			  * Processes an order for a Volvo car.
			  *
			  * This function checks if a Volvo car exists in the database, retrieves its category ID,
			  * and prepares data for processing an order. It then calls the getCar function to handle the order processing.
			  *
			  * @return array The result of the getCar function, which processes the order and returns the order details.
			  * @global object $dbAction The database action object used for executing queries.
			  */
			 public function volvo($governorate, $city): array
			 {
					global $dbAction;
					$this->model = 'Volvo';
					
					$this->verfyCar = $dbAction->select("*", "cars")->where(
						 "name_car", "=", "$this->model"
					)->getRow();
					$this->data1 = [
						 
						 "category_id" => $this->verfyCar['category_id'],
					];
					$this->data2 = [
						 
						 "client_id" => $_SESSION['clientId'],
						 "car_id"    => $this->verfyCar['id'],
						 "details"   => $_POST['volvo'],
					];
					
					return $this->getCar(
						 $this->data2, $this->data1, $governorate, $city
					);
			 }
	  }