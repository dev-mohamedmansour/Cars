<?php
	  global $connection;
	  
	  
	  session_start();
	  
	  $admin_id = $_SESSION['admin_id'];
	  
	  if (!isset($admin_id)) {
			 header('location:login.php');
	  }
	  
	  if (isset($_GET['delete'])) {
			 $delete_id = $_GET['delete'];
			 mysqli_query(
				  $connection, "DELETE FROM `contactus` WHERE id = '$delete_id'"
			 )
			 or die('query failed');
			 header('location:admin_contacts.php');
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
<?php include("header_admin.php");

?>
<!-- Start contacts -->
<div class="contacts">
	  <div class="container">
				<?php
					  $select_message = mysqli_query(
							$connection, "SELECT * FROM `contactus`"
					  ) or die('query failed');
					  if (mysqli_num_rows($select_message) > 0) {
							 while ($fetch_message = mysqli_fetch_assoc(
								  $select_message
							 )) {
									?>
					    <div class="box">
							 <p> client_id :
								   <span><?php echo $fetch_message['client_id']; ?></span>
							 </p>
							 <p> name :
								   <span><?php echo $fetch_message['name']; ?></span>
							 </p>
							 <p> email :
								   <span><?php echo $fetch_message['email']; ?></span>
							 </p>
							 <p> subject :
								   <span><?php echo $fetch_message['subject']; ?></span>
							 </p>
							 <p> message :
								   <span><?php echo $fetch_message['message']; ?></span>
							 </p>
							 <a href="admin_contacts.php?delete=<?php echo $fetch_message['id']; ?>"
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
