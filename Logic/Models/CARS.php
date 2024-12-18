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
			  * @param string $governorate The governorate name for the order.
			  * @param string $city        The city name for the order.
			  *
			  * @return string The result of the getCar function, which processes the order and returns the order details.
			  * @global object $dbAction The database action object used for executing queries.
			  */
			 public function mercedes(string $governorate, string $city): string
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
			  * @param array $data1       An array containing category information.
			  * @param array $data2       An array containing order details such as client_id, car_id, and details.
			  * @param string $governorate The governorate name for the order.
			  * @param string $city        The city name for the order.
			  *
			  * @return string Returns a success message if the order is sent successfully.
			  *                If the governorate or city is invalid, it returns a message indicating the error.
			  *                If an order already exists for the given client, car, and city, it returns a message indicating that.
			  *
			  * @global object $dbAction The database action object used for executing queries.
			  */
			 public function getCar(array $data1, array $data2,
				  string $governorate,
				  string $city
			 ): string {
					
					$userDetails = new  UserInter();
					global $dbAction;
					if (empty($governorate) && empty($city)) {
								 header("Location: index.php#products");
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
										header("Location: orderPages/orderDetails.php");
										return 'order send successfully!';
								 }
						  }
					}
					return "order send successfully!";
			 }
			 
			 /**
			  * Processes an order for a Ferrari car.
			  *
			  * This function retrieves the details of a Ferrari car from the database, checks if it exists,
			  * and prepares data for processing an order. It then calls the getCar function to handle the order processing.
			  *
			  * @param string $governorate The governorate name for the order.
			  * @param string $city        The city name for the order.
			  *
			  * @return string The result of the getCar function, which processes the order and returns the order details.
			  *
			  * @global object $dbAction The database action object used for executing queries.
			  */
			 public function ferrari(string $governorate, string $city): string
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
						 $this->data2, $this->data1,  $governorate, $city
					);
			 }
			 
			 /**
			  * Processes an order for a Porsche car.
			  *
			  * This function checks if a Porsche car exists in the database, retrieves its category ID,
			  * and prepares data for processing an order. It then calls the getCar function to handle the order processing.
			  *
			  * @param string $governorate The governorate name for the order.
			  * @param string $city        The city name for the order.
			  *
			  * @return string The result of the getCar function, which processes the order and returns the order details.
			  *
			  * @global object $dbAction The database action object used for executing queries.
			  */
			 public function porsche(string $governorate,string $city): string
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
			  * @param string $governorate The governorate name for the order.
			  * @param string $city        The city name for the order.
			  *
			  * @return string The result of the getCar function, which processes the order and returns the order details.
			  *
			  * @global object $dbAction The database action object used for executing queries.
			  */
			 public function jaguar(string $governorate,string $city): string
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
			  * @param string $governorate The governorate name for the order.
			  * @param string $city        The city name for the order.
			  *
			  * @return string The result of the getCar function, which processes the order and returns the order details.
			  *
			  * @global object $dbAction The database action object used for executing queries.
			  */
			 public function BMW(string $governorate,string $city): string
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
			  * @param string $governorate The governorate name for the order.
			  * @param string $city        The city name for the order.
			  *
			  * @return string The result of the getCar function, which processes the order and returns the order details.
			  *
			  * @global object $dbAction The database action object used for executing queries.
			  */
			 public function volvo(string $governorate,string $city): string
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