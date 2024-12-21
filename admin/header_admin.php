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
	  <link rel="stylesheet" href="../css/admin/AllPages.css"/>
	  <link rel="stylesheet" href="../css/admin/admin_page.css">
	  <!-- Render All Elements Normally -->
	  <link rel="stylesheet" href="../css/normalize.css"/>
	  <!-- font Awesome Library -->
	  <link rel="stylesheet" href="../css/all.min.css"/>
	  <!-- Google fonts -->
	  <link rel="preconnect" href="https://fonts.googleapis.com"/>
	  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
	  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300;400;500;600;700;800&display=swap"
		   rel="stylesheet"/>
	  <title>Header</title>
</head>

<body>

<!-- Start header -->
<div class="header">
	  <div class="container">
		    <a href="">Admin<span>Panel</span></a>
		    <ul class=".header_1">
				 <li class="logo"><a href="index.php">Home</a></li>
				 <li><a href="admin_orders.php">Orders</a></li>
				 <li><a href="admin_users.php">Users</a></li>
				 <li><a href="admin_contacts.php">Messages</a></li>
		    </ul>
		    <div id="user-btn">
				 <a href="../logout.php">logout</a>
		    </div>
	  </div>
</div>
<script src="../js/main.js"></script>
<!-- End header -->
</body>

</html>