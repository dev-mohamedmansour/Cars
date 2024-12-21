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
	  <link rel="stylesheet" href="../css/admin/admin_users.css">
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
	  <title>admin_users</title>
</head>
<body>
<!-- Start header -->
<?php
	  session_start();
	  $adminId = $_SESSION['adminId'];
	  if (!isset($adminId)) {
			 header('location:../login.php');
	  }
	  
	  include("header_admin.php");
?>
<!-- End header -->
<!-- Start users  -->
<div class="users">
	  <h1 class="title">USER ACCOUNTS</h1>
	  <div class="container">
				<?php
					  include '../Logic/adminLogic/adminUserController.php';
					  showUsers();
				?>

	  </div>
</div>
<!-- End users  -->
</body>
</html>
