<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="initial-scale=1, width=device-width">
  	
  	<link rel="stylesheet"  href="./index.css" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inria Serif:wght@400&display=swap" />
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Irish Grover:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" />
  
  	
  	
  	
</head>

<script>
</script>

<body>
    
        	
<?php include('header.php'); ?>

<div class="home-page-en">
    <img class="effel-1-icon" alt="" src="./images/homepage/effel.jpeg">
    <div class="pange-ong-voyage">PANGÉE ONG VOYAGE</div>
    <div class="why-travel-in">Why travel in France?</div>
    <div class="we-are-flexible-container">
        <p class="we-are-flexible">We are flexible and can help you customize your own travel ideas.</p>
        <p class="we-are-flexible">According to your wishes, you can make a trip that suits you.</p>
    </div>
    <div class="travel-guide">Travel Guide</div>
    <div class="map">
        <img class="capture-dcran-du-2024-07-17" alt="" src="./images/homepage/map.png">
        <img class="map-child" alt="" src="./images/homepage/Vec_bordeaux.png" id="vector">
        <div class="bordeaux_vec">Bordeaux</div>
        <div class="paris-container" id ="paris-container" >
            <img class="map-item" alt="Paris" src="./images/homepage/Vec_paris.png" id="vector1">
            <div class="paris_vec">Paris</div>
        </div>
    </div>
    <div class="visiting-france-provides">
        Visiting France provides a rich and diverse experience with its unique culture, historical landmarks, renowned cuisine, and stunning landscapes. Iconic sites like the Eiffel Tower and Mont Saint-Michel, picturesque villages of Provence, and the grand châteaux of the Loire each tell a unique story. France's fine cuisine and exceptional wines make every meal a delight. World-class museums, vibrant festivals, and the warm hospitality of the French further enhance the appeal of this captivating country.
    </div>
</div>

<?php include('footer.php'); ?>

  	
  	<script>
  
                      	
              	
              	
    		var aboutUsText = document.getElementById("aboutUsText");
    		if(aboutUsText) {
      			aboutUsText.addEventListener("click", function (e) {
        				// Add your code here
      			});
    		}
    		
    		
    		
    		
    		
    		var vector = document.getElementById("vector");
    		if(vector) {
      			vector.addEventListener("click", function (e) {
        				// Add your code here
      			});
    		}
    		
    		var vector1 = document.getElementById("paris-container");
    		if(vector1) {
      			vector1.addEventListener("click", function (e) {
                     window.location.href = "paris.php";
      			});
    		}
    	    

    	</script>

    	
    	</body>
</html>