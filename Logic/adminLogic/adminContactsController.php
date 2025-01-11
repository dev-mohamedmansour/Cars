<?php
	  
	  
	  use Cars\Models\DB;
	  
	  require_once __DIR__ . "/../../vendor/autoload.php";
	  
	  $dbAction = new DB;
	  /** @noinspection ALL */
	  @session_start();
	  
	  function showContacts(): void
	  {
			 
			 $dbAction = new DB;
			 $contacts = $dbAction->select('*', 'contact_us')->getAll();
			 if ($contacts > 0) {
					foreach ($contacts as $information) {
						  echo '<div class="box">';
						  foreach ($information as $key => $value) {
								 echo "<p> $key :
													 <span> $value </span>
											  </p>";
						  }
						  echo '<a href="admin_contacts.php?delete='
								. $information["id"]
								. '" class="delete-btn">Delete Message</a>';
						  echo '</div>';
					}
			 }
	  }
	  
	  if (isset($_GET['delete'])) {
			 $messageId = $_GET['delete'];
			 $deleteUser = $dbAction->delete('contact_us')->where(
				  'id', '=', "$messageId"
			 )->execution();
	  }