<?php
		
		use Cars\Models\DB;
		
		require_once __DIR__ . "/../../vendor/autoload.php";
		
		$dbAction = new DB();
		function validateEmailAdvanced ( $email ) : string
		{
				
				// Trim whitespace from the email
				$email = trim ( $email );
				
				// Regular expression for validating email format
				$regex
					  = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
				
				// Check email against the regex
				if ( ! preg_match ( $regex , $email ) )
				{
						return "Invalid email format.";
				}
				
				// Extract domain from the email
				$domain = substr ( strrchr ( $email , "@" ) , 1 );
				
				// Check if the domain has a valid MX record
				if ( ! checkdnsrr ( $domain , "MX" )
					  && ! checkdnsrr ( $domain , "A" )
				)
				{
						return "Domain does not exist.";
				}
				
				// All checks passed
				return "Valid email address.";
		}
		
		/** @noinspection ALL */
		@session_start ();
		
		$governorates = $dbAction -> select ( "*" , "governorates" )
			  -> getAll ();
		echo "<form  method='post' style='margin: 10px; padding: 10px; border: 1px solid #0dcaf0; border-radius: 10px;'>";
		echo "<select name='governorate'>";
		foreach ( $governorates as $governorate )
		{
				foreach ( $governorate as $key => $value )
				{
						if ( $key == "id" )
						{
								$GLOBALS[ 'id' ]= $value;
						}
						if ( $key == "governorate_name" )
						{
								print "<option value='$value'> $value </option>";
						} else
						{
								continue;
						}
						
				}
		}
		echo "</select>";
		echo "<input type='hidden' name='governorateID' value='". $GLOBALS['id'] ."'>";
		echo "<input name='good' type='submit' value='submit' class='accordion-button' style='color: #0dcaf0'>";
		echo "</form>";
		if ( isset( $_POST[ 'good' ] ) )
		{
				$governorateId = $GLOBALS[ 'id' ];
				echo "<pre>";
				var_dump ( $GLOBALS );
				echo "</pre>";
		}
		die;
		//sing_up logic
		if ( isset( $_POST[ 'sign_up' ] ) )
		{
				
				$cities = $dbAction -> select ( "city_name" , "cities" ) -> where (
					  "governorate_id" , " = " , "$governorateId"
				) -> getAll ();
				echo "<pre>";
				var_dump ( $cities );
				echo "</pre>";
				die();
				
				if ( empty( $_POST[ 'name' ] ) || empty( $_POST[ 'email' ] )
					  || empty( $_POST[ 'phone' ] )
					  || empty( $_POST[ 'password' ] )
				)
				{
						header ( 'location:sign_up.php' );
						echo "<center><h2 style='color: red'> Please fill all the fields. </h2></center>";
				} else
				{
						if ( validateEmailAdvanced ( $_POST[ 'email' ] )
							  !== "Valid email address."
						)
						{
								header ( 'location:sign_up.php' );
								echo "<h2 style='color: red'> Invalid email format. </h2>";
						} else
						{
								$filterEmail = filter_var (
									  $_POST[ 'email' ] , FILTER_SANITIZE_STRING
								);
								$GLOBALS[ 'email' ] = mysqli_real_escape_string (
									  $dbAction -> connection , $filterEmail
								);
								
						}
						$filterName = filter_var (
							  $_POST[ 'name' ] , FILTER_SANITIZE_STRING
						);
						$name = mysqli_real_escape_string (
							  $dbAction -> connection , $filterName
						);
						$filterPhone = filter_var (
							  $_POST[ 'phone' ] , FILTER_SANITIZE_STRING
						);
						$phone = mysqli_real_escape_string (
							  $dbAction -> connection , $filterPhone
						);
						$filterPassword = filter_var (
							  $_POST[ 'password' ] , FILTER_SANITIZE_STRING
						);
						$password = mysqli_real_escape_string (
							  $dbAction -> connection , md5 ( $filterPassword )
						);
						if ( isset( $_FILES[ "Media" ] )
							  && $_FILES[ "Media" ][ "error" ] == 0
						)
						{
								// Get uploaded image content
								$uploadedImage = file_get_contents (
									  $_FILES[ 'Media' ][ 'tmp_name' ]
								);
								$GLOBALS[ 'uploadedImageContent' ]
									  = file_get_contents (
									  $_FILES[ 'Media' ][ 'tmp_name' ]
								);
								$GLOBALS[ 'uploadedImageContent' ]
									  = mysqli_real_escape_string (
									  $dbAction -> connection , $uploadedImage
								);
						}
						$email = $GLOBALS[ 'email' ];
						$uploadedImageContent = $GLOBALS[ 'uploadedImageContent' ];;
						$data = [
							  "name"       => $name ,
							  "phone"      => $phone ,
							  "email"      => $email ,
							  "password"   => $password ,
							  "user_image" => $uploadedImageContent ,
						];
						$dbAction -> insert ( "users" , $data ) -> execution ();
						header ( 'location:login.php' );
				}
		}
		
		// login logic
		if ( isset( $_POST[ 'login' ] ) )
		{
				if ( empty( $_POST[ 'email' ] ) || empty( $_POST[ 'password' ] ) )
				{
						header ( 'location:login.php' );
				} else
				{
						$filterEmail = filter_var (
							  $_POST[ 'email' ] , FILTER_SANITIZE_STRING
						);
						
						$email = mysqli_real_escape_string (
							  $dbAction -> connection , $filterEmail
						);
						
						$filterPassword = filter_var (
							  $_POST[ 'password' ] , FILTER_SANITIZE_STRING
						);
						$password = mysqli_real_escape_string (
							  $dbAction -> connection , md5 ( $filterPassword )
						);
						
						$selectUser = $dbAction -> select (
							  "*" , "users"
						) -> where ( "email" , "=" , $email ) -> andWhere (
							  "password" , "=" , $password
						) -> getRow ();
						
						if ( $selectUser[ 'role' ] == 'admin' )
						{
								$_SESSION[ 'adminName' ] = $selectUser[ 'name' ];
								$_SESSION[ 'adminEmail' ] = $selectUser[ 'email' ];
								$_SESSION[ 'adminId' ] = $selectUser[ 'id' ];
								header ( 'location:admin' );
						} elseif ( $selectUser[ 'role' ] == 'user' )
						{
								$_SESSION[ 'userName' ] = $selectUser[ 'name' ];
								$_SESSION[ 'userEmail' ] = $selectUser[ 'email' ];
								$_SESSION[ 'clientId' ] = $selectUser[ 'id' ];
								header ( 'location:index.php' );
						} else
						{
								echo 'email or password is wrong!';
						}
				}
		}
