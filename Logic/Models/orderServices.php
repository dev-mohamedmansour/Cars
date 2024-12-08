<?php
	  
	  namespace Cars\Models;
	  
	  global $dbAction;
	  /** @noinspection ALL */
	  @session_start();
	  
	  /**
		* This class contains methods related to order operations.
		*/
	  class orderServices
	  {
			 /**
			  * Retrieves all orders from the database.
			  *
			  * @return array An array of associative arrays, each representing an order.
			  *               Each order array contains the following keys: 'order_id', 'customer_id', 'product_id', 'quantity', 'order_date'.
			  */
			 public function showOrders(): array
			 {
					global $dbAction;
					
					$getOrders = $dbAction->select('*', 'orders')->getAll();
					
			 }
	  }