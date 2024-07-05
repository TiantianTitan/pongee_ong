<?php 

require_once('./constant/connect.php');
include("php/dbconnect.php");

$id = $_SESSION['userId'];
$soto = $_GET['id'];

// Récupérer les informations de la catégorie
$categoryQuery = $conn->query("SELECT * FROM `categories` WHERE id = '$soto'");
$categoryData = $categoryQuery->fetch_assoc();
$categoryDescription = $categoryData['description'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://process.fs.teachablecdn.com/ADNupMnWyR7kCWRvm76Laz/resize=width:72,height:72/https://www.filepicker.io/api/file/f1iQ65JcQ9ySzldWtd4w' rel='apple-touch-icon' type='image/png'>
    <link href='https://process.fs.teachablecdn.com/ADNupMnWyR7kCWRvm76Laz/resize=width:144,height:144/https://www.filepicker.io/api/file/f1iQ65JcQ9ySzldWtd4w' rel='apple-touch-icon' type='image/png'>
    <link href='https://process.fs.teachablecdn.com/ADNupMnWyR7kCWRvm76Laz/resize=width:320,height:345/https://www.filepicker.io/api/file/V6pFdpVuTW6SpKxTKJd5' rel='apple-touch-startup-image' type='image/png'>
    <link href='https://process.fs.teachablecdn.com/ADNupMnWyR7kCWRvm76Laz/resize=width:640,height:690/https://www.filepicker.io/api/file/V6pFdpVuTW6SpKxTKJd5' rel='apple-touch-startup-image' type='image/png'>
    <meta name='apple-mobile-web-app-capable' content='yes' />
    <meta name="csrf-param" content="authenticity_token" />
    <meta name="csrf-token" content="p27e14+Hg4uUvh2W9vaXhWytGf2cGAi4Esa1iwH3slogIohz+W4myeHXZM0CrSCJt3XFQmu12OzlkxsFFmDX8g==" />
    <link rel="stylesheet" media="screen" href="../../mya/assets/bootstrap-a14e0219bff457941c01e229139fcb9f4709e289d96efa3a24bad96561d56e6c.css" data-turbolinks-track="true">
    <link href="../../themes2.teachablecdn.com/themecss/production/base22eb.css?_=de473e730796&amp;brand_course_heading=%23ffffff&amp;brand_heading=%23000000&amp;brand_homepage_heading=%23ffffff&amp;brand_navbar_fixed_text=%23ffffff&amp;brand_navbar_text=%23ffffff&amp;brand_primary=%23000000&amp;brand_secondary=%23FF9900&amp;brand_text=%232b3636&amp;font=OpenSans&amp;logged_out_homepage_background_image_overlay=0.0&amp;logged_out_homepage_background_image_url=https%3A%2F%2Fwww.filepicker.io%2Fapi%2Ffile%2FV6pFdpVuTW6SpKxTKJd5" rel="stylesheet" data-turbolinks-track="true">
    <title>FORMATION PANGEE</title>
    <meta name="description" content="hybridlearning">
    <link rel="canonical" href="hybridlearning">
    <meta property="og:description" content="hybridlearning">
    <meta property="og:image" content="https://www.filepicker.io/api/file/ONkNq16PRbaPTNOA5GbZ">
    <meta property="og:title" content="hybridlearning">
    <meta property="og:type" content="website">
    <meta property="og:url" content="hybridlearning">
    <meta name="brand_video_player_color" content="#FF9900">
    <meta name="site_title" content="hybridlearning">
    <style>
        body {
            font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
            font-weight: 300;
        }
        .droite {
            color:#996600;
            float: right;
            position:relative;
        }
        .p1 {
            height: 70px;
        }
        .pk {
            position: absolute;
            top: 10px;
        }
        .pko {
            top: -10px;
        }
        .container {
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 10px;
            padding: 20px;
        }
        .course-section {
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .course-description, .course-content {
            padding: 20px;
        }
        .dropdown-menu {
            padding: 0;
        }
        .dropdown-menu a {
            display: block;
            padding: 10px;
            text-decoration: none;
        }
        .gauche a {
            margin-left: 15px;
        }
        .profile-img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            opacity: 0.3;
        }
        .full-width {
            position: relative;
            z-index: 1;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    

    
    <video autoplay muted loop preload="auto" class="video-background" poster="assets/videos/share.png">
        <source src="/assets/videos/share.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    
    <header class='full-width half-height is-not-signed-in p1'>
        <div class='lecture-left pk'>
            <div class="deux" style="background-color:black;"></div>
        </div>
       <div class="gauche pko">
            <a class='nav-icon-back' aria-label='Back to course curriculum' data-no-turbolink="true" role='button' href='https://formationpangee.com/dashboard.php'>
                <img src="/assets/uploadImage/Icon_bouton/home.png" class="profile-img" alt="Retour">
            </a>
        </div>
        
        <div class='droite pko'>
            <ul class="navbar-nav my-lg-0 ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/assets/uploadImage/Profile/profil.png" style="width:50px;height:50px;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated zoomIn"> 
                        <a class="dropdown-item" href="#"><i class="fa fa-key"></i> Modifier mot de passe</a>
                        <a class="dropdown-item" href="./constant/logout.php"><i class="fa fa-power-off"></i> Se deconnecter</a>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <div class='container'>
        <div class='row'>
            <div class='col-md-6 course-description'>
                <h2>Programme de la formation <?php echo $categoryData['category']; ?></h2>
                <div><?php echo $categoryDescription; ?></div>
            </div>
            <div class='col-md-6 course-content'>
                <?php
                $products = $conn->query("SELECT * FROM sub_categories WHERE parent_id='$soto'");
                while($row = $products->fetch_assoc()):
                    $fg = $row['sub_category'];
                    $i = $row['id'];
                ?>
                <div class='course-section'>
                    <div class='section-title' data-release-date="" data-days-until-dripped="" data-is-dripped-by-date="" data-course-id="258459">
                        <span class="section-lock">
                            <i class="fa fa-lock"></i>&nbsp;
                        </span>
                        <?php echo $fg; ?>
                        <div class="section-days-to-drip">
                            <div class="section-days-logged-in">
                                Disponible dans <span class="section-days-to-drip-number"></span> Jours
                            </div>
                            <div class="section-days-logged-out">
                                <span class="section-days-to-drip-number"></span> Jours après avoir commencer la formation
                            </div>
                        </div>
                    </div>
                    <?php
                    $productsv = $conn->query("SELECT * FROM products WHERE sub_category_id='$i'");
                    while($rowv = $productsv->fetch_assoc()):
                        $pro = $rowv['title'];
                        $pi = $rowv['id'];
                        if($cf1 <= 0) {
                            $q1 = $conn->query("INSERT INTO visionnage(`idcl`, `idcour`, `idchp`) VALUES ('$id','$soto','$pi')");
                        }
                    ?>
                    <ul class='section-list'>
                        <li class='section-item'>
                            <a class='item' href="https://formationpangee.com/bn/a/courses/258459/lectures/index.php?pro=<?php echo $g ?>&vid=<?php echo $pi ?>">
                                <span class='lecture-icon'>
                                    <i class='fa fa-youtube-play'></i>
                                </span>
                                <div class='btn-primary btn-sm pull-right lecture-start'>Voir</div>
                                <?php echo $pro; ?>
                            </a>
                        </li>
                    </ul>
                    <?php endwhile; ?> 
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("span.vat-subscription-disclaimer a").click(function(e){
                e.stopPropagation()
            })
        });
    </script>
</body>
</html>
