<?php
	  
	  namespace Cars\Models;
	  
	  
	  global $dbAction;
	  
	  use Cars\Constract\typeOfCars;
	  
	  /** @noinspection ALL */
	  @session_start();
	  
	  class CARS implements typeOfCars
	  {
			 public $data1;
			 public $data2;
			 public $model;
			 public $verfyCar;
			 
			 public $item;
			 public $orderItem;
			 public $addOrder;
			 public $selectOrders;
			 
			 public function mercedes(): array
			 {
					global $dbAction;
					$this->model = 'Mercedes';
					
					$this->verfyCar = $dbAction->select("*", "cars")->where(
						 "name_car", "=", "$this->model"
					)->getRow();
					$this->data1 = [
						 
						 "category_id" => $this->verfyCar['category_id']
					];
					$this->data2 = [
						 "client_id" => $_SESSION['clientId'],
						 "car_id"    => $this->verfyCar['id'],
						 "details"   => $_POST['mercedes']
					];
					
					return $this->getCar($this->data2, $this->data1);
			 }
			 
			 public function getCar($data1, $data2): array
			 {
					global $dbAction;
					$this->item
						 = $dbAction->select(
						 "cars.id, cars.name_car ,category_car.*", "cars"
					)->rightJoin(
						 "category_car", "cars.category_id", "category_car.id"
					)->groupBy(
						 "cars.category_id", "category_id",
						 $this->data1["category_id"]
					)->getRow();
					
					$this->orderItem
						 = $dbAction->select("*", "orders")->where(
						 "client_id", "=", $this->data2['clientId']
					)->andWhere(
						 "car_id", "=", $this->data2['car_id']
					)->getRow();
					
					if ($this->orderItem > 0) {
						  echo "<h1 style='color: #0dcaf0'>orderPages already exist!</h1>";
						  header('location:index.php');
					} else {
						  $this->addOrder = $dbAction->insert(
								"orders", $this->data2
						  )
								->execution();
						  
						  echo 'orderPages send successfully!';
						  header('location:index.php');
					}
					return $this->item;
			 }
			 
			 public function ferrari(): array
			 {
					global $dbAction;
					$this->model = 'Ferrari';
					
					$this->verfyCar = $dbAction->select("*", "cars")->where(
						 "name_car", "=", "$this->model"
					)->getRow();
					$this->data1 = [
						 
						 "category_id" => $this->verfyCar['category_id']
					];
					$this->data2 = [
						 "client_id" => $_SESSION['clientId'],
						 "car_id"    => $this->verfyCar['id'],
						 "details"   => $_POST['ferrari']
					];
					
					return $this->getCar($this->data2, $this->data1);
			 }
			 
			 public function porsche(): array
			 {
					global $dbAction;
					$this->model = 'Porsche';
					
					$this->verfyCar = $dbAction->select("*", "cars")->where(
						 "name_car", "=", "$this->model"
					)->getRow();
					$this->data1 = [
						 
						 "category_id" => $this->verfyCar['category_id']
					];
					$this->data2 = [
						 "client_id" => $_SESSION['clientId'],
						 "car_id"    => $this->verfyCar['id'],
						 "details"   => $_POST['porsche']
					];
					
					return $this->getCar($this->data2, $this->data1);
			 }
			 
			 public function jaguar(): array
			 {
					global $dbAction;
					$this->model = 'Jaguar';
					
					$this->verfyCar = $dbAction->select("*", "cars")->where(
						 "name_car", "=", "$this->model"
					)->getRow();
					$this->data1 = [
						 
						 "category_id" => $this->verfyCar['category_id']
					];
					$this->data2 = [
						 "client_id" => $_SESSION['clientId'],
						 "car_id"    => $this->verfyCar['id'],
						 "details"   => $_POST['jaguar']
					];
					
					return $this->getCar($this->data2, $this->data1);
			 }
			 
			 public function BMW(): array
			 {
					global $dbAction;
					$this->model = 'BMW';
					
					$this->verfyCar = $dbAction->select("*", "cars")->where(
						 "name_car", "=", "$this->model"
					)->getRow();
					$this->data1 = [
						 
						 "category_id" => $this->verfyCar['category_id']
					];
					$this->data2 = [
						 "client_id" => $_SESSION['clientId'],
						 "car_id"    => $this->verfyCar['id'],
						 "details"   => $_POST['BMW']
					];
					
					return $this->getCar($this->data2, $this->data1);
			 }
			 
			 public function volvo(): array
			 {
					global $dbAction;
					$this->model = 'Volvo';
					
					$this->verfyCar = $dbAction->select("*", "cars")->where(
						 "name_car", "=", "$this->model"
					)->getRow();
					$this->data1 = [
						 
						 "category_id" => $this->verfyCar['category_id']
					];
					$this->data2 = [
						 "client_id" => $_SESSION['clientId'],
						 "car_id"    => $this->verfyCar['id'],
						 "details"   => $_POST['volvo']
					];
					
					return $this->getCar($this->data2, $this->data1);
			 }
	  }