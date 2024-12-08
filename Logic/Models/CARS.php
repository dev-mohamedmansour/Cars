<?php
	  
	  namespace Cars\Models;
	  
	  use Cars\Constract\typeOfCars;
	  
	  @session_start();
	  
	  class CARS implements typeOfCars
	  {
			 public array $data1;
			 public array $data2;
			 public string $model;
			 public array $verfyCar;
			 
			 public array $item;
			 public array $orderItem;
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
			 public function mercedes(): array
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
					
					return $this->getCar($this->data2, $this->data1);
			 }
			 
			 /**
			  * Retrieves car details, processes an order, and handles order-related operations.
			  *
			  * This function retrieves the client's city ID, checks if an order for the given car already exists,
			  * and inserts a new order into the database if it doesn't. It then retrieves car and category details
			  * and calls the handelOrder function to process the order.
			  *
			  * @param mixed   $data1    An array containing the category ID.
			  * @param mixed   $data2    An array containing the city_id, client ID, car ID, order details, and total price.
			  *
			  * @return array The result of the handelOrder function, which processes the order and returns the order details.
			  * @global object $dbAction The database action object used for executing queries.
			  */
			 public function getCar(mixed $data1, mixed $data2): array
			 {
					
					$userDetails = new  UserInter();
					global $dbAction;
					
					$filterGovernorate = strip_tags(
						 $_POST['orderGovernorate']
					);
					
					$governorateOrder = mysqli_real_escape_string(
						 $dbAction->connection,
						 $filterGovernorate
					);
					
					$filterCity = strip_tags(
						 $_POST['orderCity']
					);
					
					$cityOrder = mysqli_real_escape_string(
						 $dbAction->connection,
						 $filterCity
					);
					
					$checkCityGovernorate = $userDetails->checkGovernorateAndCity(
						 "$governorateOrder", "$cityOrder"
					);
					
					if ($checkCityGovernorate == "this city not selected"
						 || $checkCityGovernorate == "this not governorate"
					) {
						  header('location:../orderPages/selectGovernorate.php');
						  echo "<h2 style='color: red'> City or Governorate not selected. </h2>";
					} else {
						  $this->orderItem
								= $dbAction->select("*", "orders")->where(
								"client_id", "=", $this->data2['clientId']
						  )->andWhere(
								"car_id", "=", $this->data2['car_id']
						  )->getRow();
						  
						  if ($this->orderItem > 0) {
								 echo "<h1 style='color: #0dcaf0'>orderPages already exist!</h1>";
						  } else {
								 $data2[] = $checkCityGovernorate;
								 $this->addOrder = $dbAction->insert(
									  "orders", $this->data2
								 )->execution();
								 
								 echo 'order send successfully!';
						  }
						  
						  $this->item
								= $dbAction->select(
								"cars.id, cars.name_car ,category_car.*", "cars"
						  )->rightJoin(
								"category_car", "cars.category_id", "category_car.id"
						  )->groupBy(
								"cars.category_id", "category_id",
								$this->data1["category_id"]
						  )->getRow();
						  
						  
						  return $this->handelOrder($this->item);
					}
					return $this->handelOrder($this->item);
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
			 public function handelOrder(array $item): array
			 {
					echo "<pre>";
					print_r($item);
					echo "</pre>";
					
					return $item;
			 }
			 
			 /**
			  * Processes an order for a Ferrari car.
			  *
			  * This function checks if a Ferrari car exists in the database, retrieves its category ID,
			  * and prepares data for processing an order. It then calls the getCar function to handle the order processing.
			  *
			  * @return array The result of the getCar function, which processes the order and returns the order details.
			  * @global object $dbAction The database action object used for executing queries.
			  */
			 public function ferrari(): array
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
					
					return $this->getCar($this->data2, $this->data1);
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
			 public function porsche(): array
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
					
					return $this->getCar($this->data2, $this->data1);
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
			 public function jaguar(): array
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
					
					return $this->getCar($this->data2, $this->data1);
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
			 public function BMW(): array
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
					
					return $this->getCar($this->data2, $this->data1);
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
			 public function volvo(): array
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
					
					return $this->getCar($this->data2, $this->data1);
			 }
	  }