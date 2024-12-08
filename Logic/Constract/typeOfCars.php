<?php
	  
	  namespace Cars\Constract;
	  
	  /**
		* Interface for defining the methods related to different types of cars.
		*/
	  interface typeOfCars
	  {
			 /**
			  * Returns information about a Mercedes car.
			  *
			  * @return array Information about the Mercedes car.
			  */
			 public function mercedes(): array;
			 
			 /**
			  * Returns information about a Volvo car.
			  *
			  * @return array Information about the Volvo car.
			  */
			 public function volvo(): array;
			 
			 /**
			  * Returns information about a BMW car.
			  *
			  * @return array Information about the BMW car.
			  */
			 public function BMW(): array;
			 
			 /**
			  * Returns information about a Jaguar car.
			  *
			  * @return array Information about the Jaguar car.
			  */
			 public function jaguar(): array;
			 
			 /**
			  * Returns information about a Porsche car.
			  *
			  * @return array Information about the Porsche car.
			  */
			 public function porsche(): array;
			 
			 /**
			  * Returns information about a Ferrari car.
			  *
			  * @return array Information about the Ferrari car.
			  */
			 public function ferrari(): array;
			 
			 /**
			  * Returns information about a car based on the provided data.
			  *
			  * @param mixed $data1 The first piece of data to determine the car.
			  * @param mixed $data2 The second piece of data to determine the car.
			  *
			  * @return array Information about the car determined by the provided data.
			  */
			 public function getCar(mixed $data1, mixed $data2): array;
	  }
