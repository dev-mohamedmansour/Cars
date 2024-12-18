<?php
	  
	  namespace Cars\Constract;
	  
	  interface typeOfCars
	  {
			 /**
			  * Returns information about a Mercedes car.
			  *
			  * @param string $governorate The governorate or state where the car is located.
			  * @param string $city        The city where the car is located.
			  *
			  * @return string Information about the Mercedes car.
			  */
			 public function mercedes(string $governorate, string $city): string;
			 
			 /**
			  * Returns information about a Volvo car.
			  *
			  * @param string $governorate The governorate or state where the car is located.
			  * @param string $city        The city where the car is located.
			  *
			  * @return string Information about the Volvo car.
			  */
			 public function volvo(string $governorate, string $city): string;
			 
			 /**
			  * Returns information about a BMW car.
			  *
			  * @param string $governorate The governorate or state where the car is located.
			  * @param string $city        The city where the car is located.
			  *
			  * @return string Information about the BMW car.
			  */
			 public function BMW(string $governorate, string $city): string;
			 
			 /**
			  * Returns information about a Jaguar car.
			  *
			  * @param string $governorate The governorate or state where the car is located.
			  * @param string $city        The city where the car is located.
			  *
			  * @return string Information about the Jaguar car.
			  */
			 public function jaguar(string $governorate, string $city): string;
			 
			 /**
			  * Returns information about a Porsche car.
			  *
			  * @param string $governorate The governorate or state where the car is located.
			  * @param string $city        The city where the car is located.
			  *
			  * @return string Information about the Porsche car.
			  */
			 public function porsche(string $governorate, string $city): string;
			 
			 /**
			  * Returns information about a Ferrari car.
			  *
			  * @param string $governorate The governorate or state where the car is located.
			  * @param string $city        The city where the car is located.
			  *
			  * @return string Information about the Ferrari car.
			  */
			 public function ferrari(string $governorate, string $city): string;
			 
			 /**
			  * Returns information about a car based on the provided data.
			  *
			  * @param mixed $data1       The first piece of data to determine the car (e.g., make, model, year).
			  * @param mixed $data2       The second piece of data to determine the car (e.g., trim, color, features).
			  * @param mixed $governorate The governorate or state where the car is located.
			  * @param mixed $city        The city where the car is located.
			  *
			  * @return string An associative array containing information about the car determined by the provided data.
			  *               This may include details such as make, model, year, specifications, and location.
			  */
			 public function getCar(array $data1, array $data2,
				  string $governorate, string $city
			 ): string;
	  }