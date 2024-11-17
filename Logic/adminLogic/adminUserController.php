<?php
	  
	  
	  use Cars\Models\DB;
	  
	  require_once __DIR__ . "/../../vendor/autoload.php";
	  
	  $dbAction = new DB;
	  /** @noinspection ALL */
	  @session_start();
	  
	  function showUsers(): void
	  {
			 
			 $dbAction = new DB;
			 $users = $dbAction->select('*', 'users')->getAll();
			 if ($users > 0) {
					foreach ($users as $information) {
						  echo '<div class="box">';
						  foreach ($information as $key => $value) {
								 if ($key == "user_image") {
										
										echo "<p>User Image:
       									 <span>" .
											 '<img src="data:image/jpeg;base64,'
											 . base64_encode($value)
											 . '" alt="Uploaded Image">' .
											 "</span>
      									  </p>";
								 } elseif ($key == "password") {
										$value = "*********";
										echo "<p> Password :
													 <span> $value </span>
											  </p>";
								 } else {
										echo "<p> $key :
													 <span> $value </span>
											  </p>";
								 }
						  }
						  echo "<a href = " . "admin_users.php?delete="
								. $information["id"] .
								"class=" . "delete-btn" . ">Delete User </a>";
						  echo '</div>';
					}
			 }
	  }
	  
	  if (isset($_GET['delete'])) {
			 $userId = $_GET['delete'];
			 $deleteUser = $dbAction->delete('users')->where(
				  'id', '=', "$userId"
			 )->execution();
	  }