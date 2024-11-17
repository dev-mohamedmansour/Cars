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
						 "users.name,
    								users.email,
    								orders.id,
    								orders.details,
    								orders.date,
    								orders.method,
    								orders.total_price,
    								orders.city,
    								orders.governorat,
    								orders.payment_status",
						 "orders"
					)->rightJoin(
						 "users", "orders.client_id", "users.id"
					)->where(
						 "users.id", "=", $userId
					)->customOrderBy("orders.id")->getAll();
					
					return $this->selectOrders;
			 }
			 
	  }