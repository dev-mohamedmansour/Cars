<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8"/>
    <meta http-equiv = "X-UA-Compatible"
          content = "IE=edge"/>
    <meta name = "viewport"
          content = "width=device-width, initial-scale=1.0"/>
	  <link rel="icon"
		   type="image/x-icon"
		   href="../assets/favicon.ico"/>
    <!-- main template css file -->
    <link rel = "stylesheet"
          href = "../css/admin/admin_page.css"/>
    <link rel = "stylesheet"
          href = "../css/admin/admin_orders.css"/>
    <!-- Render All Elements Normally -->
    <link rel = "stylesheet"
          href = "../css/normalize.css"/>
    <!-- font Awesome Library -->
    <link rel = "stylesheet"
          href = "../css/all.min.css"/>
    <!-- Google fonts -->
    <link rel = "preconnect"
          href = "https://fonts.googleapis.com"/>
    <link rel = "preconnect"
          href = "https://fonts.gstatic.com"
          crossorigin/>
    <link
            href = "https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300;400;500;600;700;800&display=swap"
            rel = "stylesheet"
    />
    <title>admin_orders</title>
</head>
<body>
<!-- Start header -->
<?php
	 
	 global $connection;
	 
	 session_start();
	 
	 $admin_id = $_SESSION[ 'adminId' ];
	 
	 if (!isset($admin_id)) {
		  header('location:../login.php');
	 }
	 include("header_admin.php");

?>
<!-- End header -->
<section class = "orders">

    <h1 class = "title">Placed Orders</h1>

    <div class = "container">
		<?php
			 include '../Logic/adminLogic/adminOrderController.php';
			 showUsersOrders();
		?>
    </div>

</section>
</body>
</html>