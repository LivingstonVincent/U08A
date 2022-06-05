<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS library -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

	<!-- custom css -->
	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Pic-A-Pic</title>
	<!--
	  Create a Pic-A-Pic page using a client/server event with GET.

	  The user can select from three descriptions of pictures using radio buttons. Once submitted, the data will be sent to the server thru a GET for processing and return a page with the selected picture. Pick a theme and be creative! You can get a free, open source images from Wikimedia Images. Use CSS to create a pleasing presentation. Must contain the 2 files (an HTML and a PHP file).
	-->
</head>
<body>
 	
 	<!-- container for title -->
 	<div class="container">
 		<!-- create row -->
 		<div class="row">
 			<!-- full width -->
 			<div class="col-sm-12">
 				<!-- main page title -->
 				<h1 class="text-center">Pic-A-Pic</h1>
 			</div>
 		</div>
 	</div>

 	<!-- container for pictures -->
 	<div class="container">
 		<!-- create row with grey section -->
 		<div class="row section">
 			<!-- form with 50% screen width -->
 			<div class="col-sm-6">
 				<!-- create a form with GET method -->
 				<form method="GET" action="">
 					<p>Please select from the following and click the button to reveal particular photo:</p>

 					<?php
 						// define variables with default mountain as set to true for default radio selection
 						$select_mountain = true;
						$select_river = false;
						$select_forest = false;

						// check if form is submitted then get the data from the URL
 						if(isset($_GET['selection'])){
 							// get selection
 							$selection = $_GET['selection'];

 							// re-initialize variables and set all false to resrt values
 							$select_mountain = false;
							$select_river = false;
							$select_forest = false;

							// apply conditions for default radio selection based on user input  
 							if($selection == 'mountains'){
 								$select_mountain = true;
 							}
 							else if($selection == 'river'){
 								$select_river = true;
 							}
 							else if($selection == 'forest'){
 								$select_forest = true;
 							}
 						}
 					?>

 					<div class="form-group">
 					    <div class="custom-control custom-radio">
 					    	<!-- set checked attribute if mountain is selected -->
							<input type="radio" id="mountains" value="mountains" name="selection" class="custom-control-input" <?php if($select_mountain == true){echo "checked";} ?> />
							<label class="custom-control-label" for="mountains">Mountains</label>
 					    </div>
 					    <div class="custom-control custom-radio">
 					    	<!-- set checked attribute if river is selected -->
							<input type="radio" id="river" value="river" name="selection" class="custom-control-input" <?php if($select_river == true){echo "checked";} ?> />
							<label class="custom-control-label" for="river">River</label>
 					    </div>
 					    <div class="custom-control custom-radio">
 					    	<!-- set checked attribute if forest is selected -->
							<input type="radio" id="forest" value="forest" name="selection" class="custom-control-input" <?php if($select_forest == true){echo "checked";} ?> />
							<label class="custom-control-label" for="forest">Forest</label>
 					    </div>
 					</div>
 					<!-- submit button, to submit form data for processing -->
 					<button type="submit" class="btn btn-primary">Reveal Photo</button>
 				</form>
 			</div>

 			<!-- image section for 50% screen width -->
 			<div class="col-sm-6">
 				<?php
 					// check if form is submitted then get the data from the URL
 					if(isset($_GET['selection'])){
 						// get selection
 						$selection = $_GET['selection'];

 						// get selection and assign image accordingly
 						if($selection == 'mountains'){
 							// mountain image
 							$image_url = 'https://images.pexels.com/photos/210243/pexels-photo-210243.jpeg';
 						}
 						else if($selection == 'river'){
 							// river image
 							$image_url = 'https://images.pexels.com/photos/219972/pexels-photo-219972.jpeg';
 						}
 						else if($selection == 'forest'){
 							// forest image
 							$image_url = 'https://images.pexels.com/photos/142497/pexels-photo-142497.jpeg';
 						}

 						// display image if selection is not empty
 						if($selection != ''){
 							// create responsive image with alt title as image selection
 							echo '<img src="'.$image_url.'" alt="'.$selection.'" class="img-fluid">';
 						}
 					}
 				?>
 			</div>

 		</div>
 	</div>

	<!-- jQuery and Bootstrap JS libraries -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>