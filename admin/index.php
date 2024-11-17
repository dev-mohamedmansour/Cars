<?php
	  
	  use Cars\Models\DB;
	  
	  require_once '../vendor/autoload.php';
	  $dbAction = new DB;
	  global $connection;
	  
	  session_start();
	  $admin_id = $_SESSION['adminId'];
	  if (!isset($admin_id)) {
			 header('location:../login.php');
	  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	  <meta charset="UTF-8"/>
	  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  <link rel="stylesheet"
		   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
		   rel="stylesheet"
		   integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
		   crossorigin="anonymous"/>
	  <link rel="stylesheet" href="../css/admin/dashboard.css"/>
	  <link rel="stylesheet" href="../css/admin/admin_page.css">
	  <title>Dashboard</title>
</head>

<body>
<!----------start Header-------->
<header>
	  <div style="align-items: center" class="info-header">
		    <div class="logo">
				 <h3>Dashboard</h3>

		    </div>

		    <div style="cursor: pointer" class="icons-header">
				 <i class="fa-solid fa-magnifying-glass"></i>
		    </div>
	  </div>
	  <div style="align-items: center" class="info-header">
		    <li class="user-btn"><i
					   class="fa-solid fa-arrow-right-from-bracket"></i>
				 <a class="logout" href="../logout.php">logout</a>
		    </li>
		    <i style="cursor: pointer" class="fa-solid fa-envelope"></i>
		    <i style="cursor: pointer; margin: 0 8px"
			  class="fa-solid fa-bell"></i>


	  </div>
</header>
<!----------end Header-------->
<!----------start main-------->
<section class="main">
	  <div class="sidebar">
		    <h3>Admin Page</h3>
		    <a class="sidebar-active" href="index.php"><i
					   class="fa-solid fa-house">Dashboard</i></a>
		    <a href="admin_users.php"><i
					   class="fa-solid fa-house"></i>User</a>
		    <a href="admin_products.php"><i class="fa-solid fa-house"></i>Products</a>
		    <a href="admin_orders.php"><i class="fa-solid fa-house"></i>Orders</a>
		    <a href="admin_contacts.php"><i class="fa-solid fa-house"></i>Contacts</a>
		    <br/>
		    <div class="separator"></div>
		    <h3>User Page </h3>
		    <a href="../index.php"><i class="fa-solid fa-house"></i>Home</a>
		    <!--		    <a href="../shoping.php"><i class="fa-solid fa-house"></i>Shop</a>-->
		    <!--		    <a href="../orderPages/orderCustomize.php"><i class="fa-solid fa-house"></i>Order</a>-->
		    <!--		    <a href="../contact.php"><i class="fa-solid fa-house"></i>Contact</a>-->
		    <!--		    <a href="../about.php"><i class="fa-solid fa-house"></i>About</a>-->
		    <br/>
	  </div>
	  <!----------start main-------->
	  <div class="content">
		    <div class="titular-secant">
				 <h2>Dashboard Home</h2>
				 <div class="box">
					   <br/>
					   <div class="separator"></div>
					   <br/>
					   <p><i class="fa-solid fa-house"> / Dashboard
								  Home</i></p>
				 </div>

</section>
<!--end  Main-->
</body>

</html>