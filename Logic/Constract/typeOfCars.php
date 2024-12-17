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
			 public function mercedes( string $governorate , string $city): array;
			 
			 /**
			  * Returns information about a Volvo car.
			  *
			  * @return array Information about the Volvo car.
			  */
			 public function volvo( $governorate ,  $city): array;
			 
			 /**
			  * Returns information about a BMW car.
			  *
			  * @return array Information about the BMW car.
			  */
			 public function BMW( $governorate ,  $city): array;
			 
			 /**
			  * Returns information about a Jaguar car.
			  *
			  * @return array Information about the Jaguar car.
			  */
			 public function jaguar( $governorate ,  $city): array;
			 
			 /**
			  * Returns information about a Porsche car.
			  *
			  * @return array Information about the Porsche car.
			  */
			 public function porsche( $governorate ,  $city): array;
			 
			 /**
			  * Returns information about a Ferrari car.
			  *
			  * @return array Information about the Ferrari car.
			  */
			 public function ferrari($governorate , $city): array;
			 
    /**
     * Returns information about a car based on the provided data.
     *
     * @param mixed $data1 The first piece of data to determine the car (e.g., make, model, year).
     * @param mixed $data2 The second piece of data to determine the car (e.g., trim, color, features).
     * @param mixed $governorate The governorate or state where the car is located.
     * @param mixed $city The city where the car is located.
     *
     * @return array An associative array containing information about the car determined by the provided data.
     *               This may include details such as make, model, year, specifications, and location.
     */
    public function getCar(array $data1, array $data2, $governorate, $city
    ): string;
	  }
