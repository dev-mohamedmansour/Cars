<?php
	  
	  use Cars\Models\DB;
	  
	  require_once '../vendor/autoload.php';
	  $dbAction = new DB;
	  global $connection;
	  @session_start();
	  $admin_id = $_SESSION['adminId'];
	  
	  if (!isset($admin_id)) {
				header('location:../login.php');
	  }
	  
	  if (isset($_GET['delete'])) {
			 $delete_id = $_GET['delete'];
				$dbAction->delete("contact_us")->where("id", "=", "$delete_id");
				header('location: admin_contacts.php');
	  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	  <meta charset="UTF-8"/>
	  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  <!-- main template css file -->
	  <link rel="stylesheet" href="../css/admin/admin_page.css"/>
	  <link rel="stylesheet" href="../css/admin/admin_contacts.css">
	  <!-- Render All Elements Normally -->
	  <link rel="stylesheet" href="../css/normalize.css"/>
	  <!-- font Awesome Library -->
	  <link rel="stylesheet" href="../css/all.min.css"/>
	  <!-- Google fonts -->
	  <link rel="preconnect" href="https://fonts.googleapis.com"/>
	  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
	  <link
		    href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300;400;500;600;700;800&display=swap"
		    rel="stylesheet"
	  />
	  <title>admin_contacts</title>
</head>
<body>
<?php include("header_admin.php") ?>

<!-- Start contacts -->
<div class="contacts">
	  <div class="container">
				<?php
								 $select_message = $dbAction->select("*", "contact_us")
									  ->getAll();
								 
								 if ($select_message > 0) {
										foreach ($select_message as $message) {
									?>
					    <div class="box">
							 <p> client_id :
								   <span><?php echo $message['client_id']; ?></span>
							 </p>
							 <p> name :
								   <span><?php echo $message['name']; ?></span>
							 </p>
							 <p> email :
								   <span><?php echo $message['email']; ?></span>
							 </p>
							 <p> subject :
								   <span><?php echo $message['subject']; ?></span>
							 </p>
							 <p> message :
								   <span><?php echo $message['message']; ?></span>
							 </p>
							 <a href="admin_contacts.php?delete=<?php echo $message['id']; ?>"
							    onclick="return confirm('delete this message?');"
							    class="delete-btn">delete message</a>
					    </div>
									<?php
							 }
					  } else {
							 echo '<p class="empty">you have no messages!</p>';
					  }
				?>
	  </div>
</div>
<!-- End contacts -->
</body>
</html>
