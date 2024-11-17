<?php
	  
	  use Cars\Models\DB;
	  
	  require_once __DIR__ . "/../../vendor/autoload.php";
	  
	  $dbAction = new DB;
	  
	  /** @noinspection ALL */
	  @session_start();
	  //sing_up logic
	  if (isset($_POST['sign_up'])) {
			 if (empty($_POST['name']) || empty($_POST['email'])
				  || empty($_POST['phone'])
				  || empty($_POST['password'])
			 ) {
					header('location:sign_up.php');
					
			 } else {
					$filterName = filter_var(
						 $_POST['name'], FILTER_SANITIZE_STRING
					);
					$name = mysqli_real_escape_string(
						 $dbAction->connection, $filterName
					);
					$filterEmail = filter_var(
						 $_POST['email'], FILTER_SANITIZE_STRING
					);
					$email = mysqli_real_escape_string(
						 $dbAction->connection, $filterEmail
					);
					$filterPhone = filter_var(
						 $_POST['phone'], FILTER_SANITIZE_STRING
					);
					$phone = mysqli_real_escape_string(
						 $dbAction->connection, $filterPhone
					);
					$filterPassword = filter_var(
						 $_POST['password'], FILTER_SANITIZE_STRING
					);
					$password = mysqli_real_escape_string(
						 $dbAction->connection, md5($filterPassword)
					);
					if (isset($_FILES["Media"]) && $_FILES["Media"]["error"] == 0) {
						  // Get uploaded image content
						  $uploadedImage = file_get_contents(
								$_FILES['Media']['tmp_name']
						  );
//						  $uploadedImageContent = file_get_contents($_FILES['Media']['tmp_name']);
						  $uploadedImageContent = mysqli_real_escape_string(
								$dbAction->connection, $uploadedImage
						  );
					}
					
					
					$data = [
						 "name"       => $name,
						 "phone"      => $phone,
						 "email"      => $email,
						 "password"   => $password,
						 "user_image" => $uploadedImageContent
					
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
						 $_POST['email'], FILTER_SANITIZE_STRING
					);
					
					$email = mysqli_real_escape_string(
						 $dbAction->connection, $filterEmail
					);
					
					$filterPassword = filter_var(
						 $_POST['password'], FILTER_SANITIZE_STRING
					);
					$password = mysqli_real_escape_string(
						 $dbAction->connection, md5($filterPassword)
					);
					
					$selectUser = $dbAction->select(
						 "*", "users"
					)->where("email", "=", $email)->andWhere(
						 "password", "=", $password
					)->getRow();
					
					if ($selectUser['user_type'] == 'admin') {
						  
						  $_SESSION['adminName'] = $selectUser['name'];
						  $_SESSION['adminEmail'] = $selectUser['email'];
						  $_SESSION['adminId'] = $selectUser['id'];
						  header('location:admin');
						  
					} elseif ($selectUser['user_type'] == 'user') {
						  
						  $_SESSION['userName'] = $selectUser['name'];
						  $_SESSION['userEmail'] = $selectUser['email'];
						  $_SESSION['clientId'] = $selectUser['id'];
						  header('location:index.php');
					} else {
						  echo 'email or password is wrong!';
					}
			 }
	  }
