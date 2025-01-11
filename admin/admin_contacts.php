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
	  
	  //	  if (isset($_GET['delete']))
	  //	  {
	  //			 $delete_id = $_GET['delete'];
	  //				$dbAction->delete("contact_us")->where("id", "=", "$delete_id");
	  //				header('location: admin_contacts.php');
	  //	  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	  <meta charset="UTF-8"/>
	  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  <link rel="icon"
		   type="image/x-icon"
		   href="../assets/favicon.ico"/>
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
	  <h1 class="title">MESSAGES</h1>
	  <div class="container">
				<?php
					  include '../Logic/adminLogic/adminContactsController.php';
					  showContacts();
				?>
				
	  </div>
</div>
<!-- End contacts -->
</body>
</html>
