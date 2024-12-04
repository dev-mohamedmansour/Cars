<?php
	  
	  use Cars\Models\DB;
	  
	  require_once __DIR__ . "/../../vendor/autoload.php";
	  
	  $dbAction = new DB();
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
	  
	  /** @noinspection ALL */
	  @session_start();
	  
	  //sing_up logic
	  if (isset($_POST['sign_up'])) {
			
			echo checkGovernorate($_POST['Governorate'],$_POST['City']);
			 die();
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
						  $filterEmail = filter_var(
								$_POST['email'],
								FILTER_SANITIZE_STRING
						  );
						  $GLOBALS['email'] = mysqli_real_escape_string(
								$dbAction->connection,
								$filterEmail
						  );
					}
					$filterName = filter_var(
						 $_POST['name'],
						 FILTER_SANITIZE_STRING
					);
					$name = mysqli_real_escape_string(
						 $dbAction->connection,
						 $filterName
					);
					$filterPhone = filter_var(
						 $_POST['phone'],
						 FILTER_SANITIZE_STRING
					);
					$phone = mysqli_real_escape_string(
						 $dbAction->connection,
						 $filterPhone
					);
					$filterGovernorate = filter_var(
						 $_POST['Governorate'],
						 FILTER_SANITIZE_STRING
					);
					$Governorate = mysqli_real_escape_string(
						 $dbAction->connection,
						 $filterGovernorate
					);
					$filterCity = filter_var(
						 $_POST['City'],
						 FILTER_SANITIZE_STRING
					);
					$City = mysqli_real_escape_string(
						 $dbAction->connection,
						 $filterCity
					);
					$filterPassword = filter_var(
						 $_POST['password'],
						 FILTER_SANITIZE_STRING
					);
					$password = mysqli_real_escape_string(
						 $dbAction->connection,
						 md5($filterPassword)
					);
					if (isset($_FILES["Media"])
						 && $_FILES["Media"]["error"] == 0
					) {
						  // Get uploaded image content
						  $uploadedImage = file_get_contents(
								$_FILES['Media']['tmp_name']
						  );
						  $GLOBALS['uploadedImageContent']
								= file_get_contents(
								$_FILES['Media']['tmp_name']
						  );
						  $GLOBALS['uploadedImageContent']
								= mysqli_real_escape_string(
								$dbAction->connection,
								$uploadedImage
						  );
					}
					$email = $GLOBALS['email'];
					$uploadedImageContent = $GLOBALS['uploadedImageContent'];
					/**********/
					
					$data = [
						 "name"       => $name,
						 "phone"      => $phone,
						 "email"      => $email,
						 "password"   => $password,
						 "user_image" => $uploadedImageContent,
					];
					$dbAction->insert("users", $data)->execution();
					header('location:login.php');
			 }
	  }
	  
	  // login logic
	  if (isset($_POST['login'])) {
			 if (empty($_POST['email']) || empty($_POST['password'])) {
					header('location:login.php');
			 } else {
					$filterEmail = filter_var(
						 $_POST['email'],
						 FILTER_SANITIZE_STRING
					);
					
					$email = mysqli_real_escape_string(
						 $dbAction->connection,
						 $filterEmail
					);
					
					$filterPassword = filter_var(
						 $_POST['password'],
						 FILTER_SANITIZE_STRING
					);
					$password = mysqli_real_escape_string(
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
					
					if ($selectUser['role'] == 'admin') {
						  $_SESSION['adminName'] = $selectUser['name'];
						  $_SESSION['adminEmail'] = $selectUser['email'];
						  $_SESSION['adminId'] = $selectUser['id'];
						  header('location:admin');
					} elseif ($selectUser['role'] == 'user') {
						  $_SESSION['userName'] = $selectUser['name'];
						  $_SESSION['userEmail'] = $selectUser['email'];
						  $_SESSION['clientId'] = $selectUser['id'];
						  header('location:index.php');
					} else {
						  echo 'email or password is wrong!';
					}
			 }
	  }
