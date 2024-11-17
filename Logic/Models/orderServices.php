<?php
	  
	  namespace Cars\Models;
	  
	  global $dbAction;
	  /** @noinspection ALL */
	  @session_start();
	  
	  class orderServices
	  {
			 public function showOrders(): array
			 {
					global $dbAction;
					
					$getOrders = $dbAction->select('*', 'orders')->getAll();
					
			 }
	  }