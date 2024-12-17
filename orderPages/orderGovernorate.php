<!DOCTYPE html>
<html lang="en">
<head>
	  <meta charset="UTF-8">
	  <meta name="viewport"
		   content="width=device-width, initial-scale=1.0">
	  <title>Select Governorate</title>
	  <link rel="stylesheet"
		   href="../css/styleGovernorate.css">
	  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<div class="containerGovernorate">
	  <?php @include 'Logic/userLogic/homeLogic.php' ?>
	  <form method="post" action="../index.php">
		    <label for=" governorates ">Select your Governorate</label>
		    <select id="governorates" name="orderGovernorate">
				 <option>
					   --
					   Select
					   your
					   Governorate
					   --
				 </option>
				 <option
					   value="Cairo">
					   Cairo
				 </option>
				 <option
					   value="Giza">
					   Giza
				 </option>
				 <option
					   value="Alexandria">
					   Alexandria
				 </option>
				 <option
					   value="Aswan">
					   Aswan
				 </option>
				 <option
					   value="Luxor">
					   Luxor
				 </option>
				 <option
					   value="Asyut">
					   Asyut
				 </option>
				 <option
					   value="Sohag">
					   Sohag
				 </option>
				 <option
					   value="Qena">
					   Qena
				 </option>
				 <option
					   value="Dakahlia">
					   Dakahlia
				 </option>
				 <option
					   value="Sharqia">
					   Sharqia
				 </option>
				 <option
					   value="Suez">
					   Suez
				 </option>
				 <option
					   value="Fayoum">
					   Fayoum
				 </option>
				 <option
					   value="RedSea">
					   RedSea
				 </option>
				 <option
					   value="Minya">
					   Minya
				 </option>
				 <option
					   value="NorthSinai">
					   NorthSinai
				 </option>
				 <option
					   value="SouthSinai">
					   SouthSinai
				 </option>
				 <option
					   value="PortSaid">
					   PortSaid
				 </option>
				 <option
					   value="BeniSufe">
					   Beni
					   Sufe
				 </option>
		    </select>
		    <p class="help-block text-danger"></p>
		    <div id="center-container"
			    class="hidden">
				 <label for="centers">Select Your Center</label>
				 <select id="centers" name="orderCity">
					   <option>
							--
							Select
							Your
							Center
							--
					   </option>
				 </select>
		    </div>
		    <button type="submit" name="selectGovernorateAndCity"
				  class="btn btn-xl">Submit
		    </button>
	  </form>
</div>
<script src="../js/scriptGovernorate.js"></script>
</body>
</html>
