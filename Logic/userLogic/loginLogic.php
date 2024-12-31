<?php
	  
	  use Cars\Models\DB;
	  use Cars\Models\UserInter;
	  
	  require_once __DIR__ . "/../../vendor/autoload.php";
	  @session_start();
	  $dbAction = new DB();
	  $userClass = new UserInter();
	  
	  /**
		* Validates an email address by checking its format and domain existence.
		*
		* This function trims whitespace from the email, checks if the email format
		* is valid using a regular expression, and verifies if the domain has a valid
		* MX or A record.
		*
		* @param string $email The email address to be validated.
		*
		* @return string Returns "Valid email address." if the email is valid,
		*                "Invalid email format." if the format is incorrect,
		*                or "Domain does not exist." if the domain is not valid.
		*/
	  
	  function validateEmailAdvanced(string $email): string
	  {
			 
			 // Trim whitespace from the email
			 $email = trim($email);
			 
			 // Regular expression for validating email format
			 $regex
				  = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
			 
			 // Check email against the regex
			 if (!preg_match($regex, $email)) {
					return "Invalid email format.";
			 }
			 
			 // Extract domain from the email
			 $domain = substr(strrchr($email, "@"), 1);
			 
			 // Check if the domain has a valid MX record
			 if (!checkdnsrr($domain, "MX")
				  && !checkdnsrr($domain, "A")
			 ) {
					return "Domain does not exist.";
			 }
			 
			 // All checks passed
			 return "Valid email address.";
	  }
	  
	  
	  //sing_up logic
	  if (isset($_POST['sign_up'])) {
			 if (empty($_POST['name']) || empty($_POST['email'])
				  || empty($_POST['phone'])
				  || empty($_POST['password'])
			 ) {
					header('location:sign_up.php');
					echo "<center><h2 style='color: red'> Please fill all the fields. </h2></center>";
			 } else {
					
					if (validateEmailAdvanced($_POST['email'])
						 !== "Valid email address."
					) {
						  header('location:sign_up.php');
						  echo "<h2 style='color: red'> Invalid email format. </h2>";
					} else {
						  $filterEmail = strip_tags(
								$_POST['email']
						  );
						  $GLOBALS['email'] = pg_escape_string(
								$dbAction->connection,
								$filterEmail
						  );
					}
					$filterName = strip_tags(
						 $_POST['name']
					);
					$name = pg_escape_string(
						 $dbAction->connection,
						 $filterName
					);
					$filterPhone = strip_tags(
						 $_POST['phone']
					);
					$phone = pg_escape_string(
						 $dbAction->connection,
						 $filterPhone
					);
					$filterGovernorate = strip_tags(
						 $_POST['Governorate']
					);
					$governorate = pg_escape_string(
						 $dbAction->connection,
						 $filterGovernorate
					);
					$filterCity = strip_tags(
						 $_POST['City']
					);
					$city = pg_escape_string(
						 $dbAction->connection,
						 $filterCity
					);
					$filterGender = strip_tags(
						 $_POST['gender']
					);
					$gender = pg_escape_string(
						 $dbAction->connection,
						 $filterGender
					);
					$filterPassword = strip_tags(
						 $_POST['password']
					);
					$password = pg_escape_string(
						 $dbAction->connection,
						 md5($filterPassword)
					);
					if (isset($_FILES["Media"])
						 && $_FILES["Media"]["error"] == 0
					) {
						  // Get uploaded image content
						  $uploadedImage
								= $_FILES['Media']['tmp_name'];
						  $GLOBALS['uploadedImageContent']
								= pg_escape_bytea(
								$dbAction->connection,
								$uploadedImage
						  );
					}
					$email = $GLOBALS['email'];
					$uploadedImageContent = $GLOBALS['uploadedImageContent'];
					$idCity = $userClass->checkGovernorateAndCity(
						 $governorate, $city
					);
					
					if ($idCity == "this city not selected"
						 || $idCity == "this not governorate"
					) {
						  header('location:sign_up.php');
						  echo "<h2 style='color: red'> City or Governorate not selected. </h2>";
					} else {
						  $data = [
								"name"       => $name,
								"email"      => $email,
								"phone"      => $phone,
								"gender"     => $gender,
								"password"   => $password,
								"city_id"    => $idCity,
								"user_image" => $uploadedImageContent,
						  ];
						  $userInsert = $dbAction->insert("users", $data)->execution(
						  );
						  if (isset($userInsert)) {
								 header('location:login.php');
						  } else {
								 header('location:sign_up.php');
						  }
					}
			 }
			 
	  }
	  
	  // login logic
	  if (isset($_POST['login'])) {
			 if (empty($_POST['email']) || empty($_POST['password'])) {
					header('location:login.php');
			 } else {
					$filterEmail = strip_tags(
						 $_POST['email']
					);
					
					$email = pg_escape_string(
						 $dbAction->connection,
						 $filterEmail
					);
					
					$filterPassword = strip_tags(
						 $_POST['password']
					);
					$password = pg_escape_string(
						 $dbAction->connection,
						 md5($filterPassword)
					);
					
					$selectUser = $dbAction->select(
						 "*",
						 "users"
					)->where("email", "=", $email)->andWhere(
						 "password",
						 "=",
						 $password
					)->getRow();
//					echo "<pre>";
//					var_dump($selectUser);
//					echo "</pre>";
//					die();
					
					if ($selectUser['role'] == 'admin') {
						  $_SESSION['adminName'] = $selectUser['name'];
						  $_SESSION['adminEmail'] = $selectUser['email'];
						  $_SESSION['adminId'] = $selectUser['id'];
						  header('location:admin');
					} elseif ($selectUser['role'] == 'user') {
						  $_SESSION['userName'] = $selectUser['name'];
						  $_SESSION['userEmail'] = $selectUser['email'];
						  $_SESSION['clientId'] = $selectUser['id'];
						  $_SESSION['userCityId'] = $selectUser['city_id'];
						  header('location:index.php');
					} else {
						  echo 'email or password is wrong!';
					}
			 }
	  }
