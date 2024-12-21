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
	  <link rel="icon"
		   type="image/x-icon"
		   href="../assets/favicon.ico"/>
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
<section class="main">
	  <div class="sidebar">
		    <h3>Admin Page</h3>
		    <a class="sidebar-active" href="index.php"><i
					   class="fa-solid fa-house">Dashboard</i></a>
		    <a href="admin_users.php"><i
					   class="fa-solid fa-house"></i>User</a>
		    <a href="admin_orders.php"><i class="fa-solid fa-house"></i>Orders</a>
		    <a href="admin_contacts.php"><i class="fa-solid fa-house"></i>Contacts</a>
		    <br/>
		    <div class="separator"></div>
		    <h3>User Page </h3>
		    <a href="../index.php"><i class="fa-solid fa-house"></i>Home</a>
		    <br/>
	  </div>

	  <!----------start main-------->
	  <div class="content">
		    <div class="titulo-secao">
				 <h2>Dashboard Home</h2>
				 <div class="box">
					   <br/>
					   <div class="separator"></div>
					   <br/>
					   <p><i class="fa-solid fa-house"> / Dashboard
								  Home</i></p>
				 </div>
		    </div>
		    <div class="box-info">
				 <div style="background: linear-gradient(45deg, #8e44ad, #eb8192)"
					 class="box-info-sigle">
					   <div class="info-text">
											<?php
												  
												  $total_completed = 0;
												  $select_completed = $dbAction->select(
														"total_price", "orders"
												  )->where(
														"payment_status", "=", "completed"
												  )->getAll();
												  if ($select_completed > 0) {
														 foreach (
															  $select_completed as
															  $fetch_completed
														 ) {
																$total_price
																	 = $fetch_completed['total_price'];
																$total_completed += $total_price;
														 };
												  };
											?>
							<h3>completed payments</h3>
							<p><?php echo $total_completed . " "
														  . "$" ?></p>
					   </div>
					   <i class="fa-solid fa-wallet"></i>
				 </div>
				 <div style="background: linear-gradient(45deg, #8e44ad, #eb8192)"
					 class="box-info-sigle">
					   <div class="info-text">
											<?php
												  $select_orders = $dbAction->select(
														"COUNT(*)", "orders"
												  )->getAll();
												  foreach ($select_orders as $fetch_orders)
												  {
														 $number_of_orders
															  = $fetch_orders['COUNT(*)'];
												  }
												  global $number_of_orders;
											?>
							<h3>order placed</h3>
							<p><?php echo $number_of_orders . " "
														  . " Orders" ?></p>
					   </div>
					   <i class="fa-solid fa-wallet"></i>
				 </div>
				 <div style="background: linear-gradient(45deg, #8e44ad, #eb8192)"
					 class="box-info-sigle">
					   <div class="info-text">
											<?php
												  $select_cars = $dbAction->select(
														"COUNT(*)", "cars"
												  )->getAll();
												  foreach ($select_cars as $fetch_cars) {
														 $number_of_cars
															  = $fetch_cars['COUNT(*)'];
												  }
												  global $number_of_cars;
											?>
							<h3>number of cars</h3>
							<p><?php echo $number_of_cars . " "
														  . " Cars" ?></p>
					   </div>
					   <i class="fa-solid fa-wallet"></i>
				 </div>
				 <div style="background: linear-gradient(45deg, #8e44ad, #eb8192)"
					 class="box-info-sigle">
					   <div class="info-text">
											<?php
												  $select_users = $dbAction->select(
														"COUNT(*)", "users"
												  )->where("role", "=", "user")->getAll();
												  foreach ($select_users as $fetch_users) {
														 $number_of_users
															  = $fetch_users['COUNT(*)'];
												  }
												  global $number_of_users;
											?>
							<h3>normal users</h3>
							<p><?php echo $number_of_users . " "
														  . " user" ?></p>
					   </div>
					   <i class="fa-solid fa-wallet"></i>
				 </div>
				 <div style="background: linear-gradient(45deg, #8e44ad, #eb8192)"
					 class="box-info-sigle">
					   <div class="info-text">
											<?php
												  $select_contact = $dbAction->select(
														"COUNT(*)", "contact_us"
												  )->getAll();
												  foreach (
														$select_contact as $fetch_contact
												  ) {
														 $number_of_contact
															  = $fetch_contact['COUNT(*)'];
												  }
												  global $number_of_contact;
											?>
							<h3>new messages</h3>
							<p><?php echo $number_of_contact . " "
														  . "message" ?></p>
					   </div>
					   <i class="fa-solid fa-wallet"></i>
				 </div>

				 <div style="background: linear-gradient(45deg, #8e44ad, #eb8192)"
					 class="box-info-sigle">
					   <div class="info-text">
											<?php
												  
												  $total_pending = 0;
												  $select_pending = $dbAction->select(
														"total_price", "orders"
												  )->where(
														"payment_status", "=", "pending"
												  )->getAll();
												  if ($select_pending > 0) {
														 foreach (
															  $select_pending as
															  $fetch_pending
														 ) {
																$total_price_pending
																	 = $fetch_pending['total_price'];
																$total_pending += $total_price_pending;
														 };
												  };
											?>
							<h3>completed payments</h3>
							<p><?php echo $total_pending . " "
														  . "$" ?></p>
					   </div>
					   <i class="fa-solid fa-wallet"></i>
				 </div>
		    </div>
	  </div>
</section>
<!--end  Main-->
</body>
</html>