<?php
	  //	  include('../Logic/config.php');
	  session_start();
	  $admin_id = $_SESSION['admin_id'];
	  if (!isset($admin_id)) {
			 header('location:login.php');
	  }
	  
	  if (isset($_POST['add_product'])) {
			 
			 $name = mysqli_real_escape_string($conn, $_POST['name']);
			 $price = $_POST['price'];
			 $image = $_POST['image'];
			 $image_size = $_POST['image'];
			 $image_tmp_name = $_POST['image'];
			 $image_folder = '../uploaded_img/' . $image;
			 
			 $select_product_name = mysqli_query(
				  $conn, "SELECT name FROM products WHERE name = '$name'"
			 ) or die('query failed');
			 
			 if (mysqli_num_rows($select_product_name) > 0) {
					$message[] = 'product name added';
			 } else {
					$add_product_query = mysqli_query(
						 $conn,
						 "INSERT INTO products(name, price, image) VALUES('$name', '$price', '$image')"
					) or die('query failed');
					
					if ($add_product_query) {
						  if ($image_size > 200000) {
								 $message[] = 'image size is to large';
						  } else {
								 move_uploaded_file($image_folder);
								 $message[] = 'product added successfully';
						  }
					} else {
						  $message[] = 'product could not be added';
					}
			 }
	  }
	  
	  if (isset($_GET['delete'])) {
			 $delete_id = $_GET['delete'];
			 $delete_image_query = mysqli_query(
				  $conn, "SELECT image FROM products WHERE id = '$delete_id'"
			 ) or die('query failed');
			 $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
			 unlink('uploaded_img/' . $fetch_delete_image['image']);
			 mysqli_query($conn, "DELETE FROM products WHERE id = '$delete_id'")
			 or die('query failed');
			 header('location:admin_products.php');
	  }
	  
	  if (isset($_POST['update_product'])) {
			 
			 $update_product_id = $_POST['update_product_id'];
			 $update_name = $_POST['update_name'];
			 $update_price = $_POST['update_price'];
			 
			 mysqli_query(
				  $conn,
				  "UPDATE products SET name = '$update_name', price = '$update_price' WHERE id = '$update_product_id'"
			 ) or die('query failed');
			 
			 $update_image = $_POST['update_image'];
			 $update_image_tmp_name = $_POST['update_image'];
			 $update_image_size = $_POST['update_image'];
			 $update_folder = '../uploaded_img/' . $update_image;
			 $update_old_image = $_POST['update_old_image'];
			 
			 if (!empty($update_image)) {
					if ($update_image_size > 200000) {
						  $message[] = 'image file size is to large';
					} else {
						  mysqli_query(
								$conn,
								"UPDATE products SET image = '$update_image' WHERE id = '$update_product_id'"
						  ) or die('query failed');
						  move_uploaded_file($update_image_tmp_name, $update_folder);
						  unlink('../uploaded_img/ . $update_old_image');
					}
			 }
			 header('location:admin_products.php');
			 
	  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
	  <meta charset="UTF-8"/>
	  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  <!-- main template css file -->
	  <link rel="stylesheet" href="../css/admin/admin_products.css"/>
	  <link rel="stylesheet" href="../css/admin/admin_page.css">
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
	  <title>admin_products</title>
</head>
<body>
<!-- Start header -->
<?php include 'header_admin.php' ?>
<script src="main.js"></script>
<!-- End header -->
<!-- Start add Product -->
<div class="add_product">
	  <div class="container">
		    <center>
				 <form method="post" enctype="mulipart/from-data">
					   <h2>Add Product</h2>
					   <!-- <label for="product-name">Product Name:</label> -->
					   <input type="text" id="product-name" name="name"
							class="box"
							placeholder="Enter product name..." required>
					   <!-- <label for="price">Price:</label> -->
					   <input type="number" min="0" id="price" name="price"
							class="box" placeholder="Enter price..."
							required>
					   <!-- <label for="description">img:</label> -->
					   <input type="file" accept=".jpg,.jpeg,.png"
							name="image" class="box" required>
					   <button type="submit" name="add_product">Add
							Product
					   </button>
					   <!-- <input type="submit" value="add product" name="add_product" class="btn"> -->
				 </form>
		    </center>
	  </div>
</div>
<!-- End add product -->
<!--start show product -->
<section class="show-products">
	  <div class="box-container">
				
				<?php
					  $select_products = mysqli_query(
							$conn, "SELECT * FROM products"
					  ) or die('query failed');
					  if (mysqli_num_rows($select_products) > 0) {
							 while ($fetch_products = mysqli_fetch_assoc(
								  $select_products
							 )) {
									?>
					    <div class="box">
							 <img class="image"
								 src="../uploaded_img/<?php echo $fetch_products['image']; ?>"
								 alt="">

							 <div class="name"><?php echo $fetch_products['name']; ?> </div>
							 <div class="price">
								   $<?php echo $fetch_products['price']; ?>
								   /-
							 </div>
							 <a href="admin_products.php?update=<?php echo $fetch_products['id']; ?>"
							    class="option-btn">update</a>
							 <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>"
							    class="delete-btn"
							    onclick="return confirm('delete this products?');">delete</a>
					    </div>
									<?php
							 }
					  } else {
							 echo '<p class="empty">NO PRODUCT ADDED</p>';
					  }
				
				?>
	  </div>
</section>

<section class="update-product">
	  
	  <?php
			 if (isset($_GET['update'])) {
					$update_id = $_GET['update'];
					$update_query = mysqli_query(
						 $conn, "SELECT * FROM products WHERE id = '$update_id'"
					) or die('query failed');
					if (mysqli_num_rows($update_query) > 0) {
						  while ($fetch_update = mysqli_fetch_assoc($update_query)) {
								 
								 ?>

					  <form action="" method="post"
						   enctype="mulipart/from-data">
						    <input type="hidden" name="update_product_id"
								 value="<?php echo $fetch_update['id']; ?>">
						    <input type="hidden" name="update_old_image"
								 value="<?php echo $fetch_update['image']; ?>">
						    <img src="../uploaded_img/<?php echo $fetch_update['image']; ?> "
							    alt="">
						    <input type="text" name="update_name"
								 value="<?php echo $fetch_update['name']; ?>"
								 class="box" required
								 placeholder="enter product name">
						    <input type="number" name="update_price"
								 value="<?php echo $fetch_update['price']; ?>"
								 min="0" class="box" required
								 placeholder="enter product price">
						    <input type="file" accept=".jpg, .jpeg, .png"
								 name="update_image" class="box">
						    <div class="botton">
								 <input type="submit" value="update"
									   name="update_product"
									   class="btn">
								 <input type="reset" value="cancel"
									   id="close_update"
									   class="option-btn">
						    </div>
					  </form>
								 
								 <?php
						  }
					}
			 } else {
					
					echo '<script> document.querySelector(".update-product").style.display = "none"; </script>';
			 }
	  
	  
	  ?>

</section>


<!-- End show product -->
<script>

    document.querySelector('#close_update').onclick = () => {
        document.querySelector('.update-product').style.display = 'none';
        window.location.href = 'admin_products.php';
    }

</script>
</body>
</html>
