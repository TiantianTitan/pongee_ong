<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <link rel="stylesheet" href="./index.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inria+Serif:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Irish+Grover:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Italianno&display=swap" />
</head>
<body>
    <div class="header">
        <div class="bg-header"></div>
        <div class="home">Home</div>
        <div class="about-us" id="aboutUsText">About us</div>
        <img class="phone-icon" alt="" src="./images/header/logo_tel.png">
        <div class="destinations">Destinations</div>
        <div class="menu-scolling-destinations">
            <div class="destinations_text">Destinations</div>
            <div class="paris_lien" id="parisText">Paris</div>
            <div class="carcassonne_lien">Carcassonne</div>
            <div class="honfleur_lien">Honfleur</div>
            <div class="la-rochelle_lien">La Rochelle</div>
            <div class="strasbourg_lien">Strasbourg</div>
            <div class="bordeaux_lien" id="bordeauxText">Bordeaux</div>
            <div class="marseilles_lien">Marseilles</div>
            <div class="rennes_lien">Rennes</div>
            <div class="nice_lien">Nice</div>
            <div class="toulouse_lien">Toulouse</div>
            <div class="lourdes_lien">Lourdes</div>
            <div class="lyon_lien">Lyon</div>
        </div>
        <img class="menu-icon" alt="" src="./images/header/logo_menu.png">
        <img class="logo-ong-1-icon" alt="" src="./images/header/logo_ong.png">
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            var menuScrollingDestinations = document.querySelector('.menu-scolling-destinations');
            var destinationMenu = document.querySelector('.destinations');
        
            var showMenu = function() {
              menuScrollingDestinations.classList.add('show');
            };
        
            var hideMenu = function() {
              if (!menuScrollingDestinations.matches(':hover') && !destinationMenu.matches(':hover')) {
                menuScrollingDestinations.classList.remove('show');
              }
            };
        
            destinationMenu.addEventListener('mouseenter', showMenu);
            destinationMenu.addEventListener('mouseleave', function() {
              setTimeout(hideMenu, 100);
            });
        
            menuScrollingDestinations.addEventListener('mouseenter', showMenu);
            menuScrollingDestinations.addEventListener('mouseleave', function() {
              setTimeout(hideMenu, 100);
            });

            var parisText = document.getElementById("parisText");
            if(parisText) {
                parisText.addEventListener("click", function (e) {
                    window.location.href = "paris.php";
                });
            }

            var bordeauxText = document.getElementById("bordeauxText");
            if(bordeauxText) {
                bordeauxText.addEventListener("click", function (e) {
                    // 添加你的代码
                });
            }
        });
    </script>
