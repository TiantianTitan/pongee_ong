<?php
require_once('config.php');
include('./constant/connect.php');

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 9; 
$offset = ($page - 1) * $limit;

$id = $_SESSION['userId'];
$date = date('Y-m-d');

$cf1 = 1;

$sa = '€';

$query = "SELECT C.*, P.lien as idcc FROM categories C 
          LEFT JOIN pro P ON C.id = P.category_id 
          GROUP BY C.id 
          LIMIT $limit OFFSET $offset";
$products = $conn->query($query);

$totalQuery = "SELECT COUNT(DISTINCT C.id) as total FROM categories C 
               LEFT JOIN pro P ON C.id = P.category_id";
$totalResult = $conn->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalCourses = $totalRow['total'];
$totalPages = ceil($totalCourses / $limit);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Courses</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/popup_style.css">
    <style>
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            opacity: 0.5;
        }
        .top-bar {
            background-color: black;
            color: white;
            padding: 10px;
            text-align: center;
            z-index: 1;
        }
        .top-bar a {
            color: white;
            text-decoration: none;
        }
        .back-img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }
        .container.content {
            position: relative;
            z-index: 1;
            padding: 20px;
        }
        .card {
            margin-bottom: 20px;
            background-color: rgba(255, 255, 255, 0.5);
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            height: 100%;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            height: 180px;
            object-fit: cover;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 15px;
        }
        .card-title {
            font-size: 1.25rem;
            margin-bottom: 10px;
        }
        .card-text {
            font-size: 1rem;
            flex-grow: 1;
            margin-bottom: 10px;
            color: #333;
        }
        .btn-primary {
            background-color: rgba(0, 123, 255, 0.8);
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: rgba(0, 123, 255, 1);
        }
        .pagination {
            margin-top: 20px;
            justify-content: center;
        }
        .pagination .page-item {
            margin: 0 5px;
        }
        .pagination .page-link {
            color: #007bff;
            border: 1px solid #007bff;
            border-radius: 5px;
            padding: 5px 10px;
            transition: background-color 0.3s;
        }
        .pagination .page-link:hover {
            background-color: #007bff;
            color: #fff;
        }
        .pagination .active .page-link {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }
        .course-container {
            overflow: hidden;
            position: relative;
            width: 100%;
        }
        .course-wrapper {
            display: flex;
            flex-wrap: wrap;
            transition: transform 0.5s ease;
        }
        .course-item {
            display: flex;
            flex-direction: column;
            width: 30%; 
            margin: 1.5%; 
            height: 380px; 
        }
    </style>
</head>
<body>
    

    
        <video autoplay muted loop preload="auto" class="video-background" poster="assets/videos/background.png">
        <source src="assets/videos/background.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    
    <!-- Black top bar with navigation -->
    <div class="top-bar">
        <a href="https://formationpangee.com/tableaub.php" class="btn btn-success btn-lg">
            <img src="/assets/uploadImage/Icon_bouton/retour.png" class="back-img" alt="Retour">
        </a>
    </div>

    <div class="container content">
        <?php if($cf1 == 0): ?>
        <div class="popup popup--icon -error js_error-popup popup--visible">
            <div class="popup__background"></div>
            <div class="popup__content">
                <h3 class="popup__content__title">
                    Compléter votre Inscription
                </h3>
                <p>Desolé vous devez configurer votre regime fiscal</p>
                <p>
                    <?php echo "<script>setTimeout(\"location.href = 'inform.php';\", 2500);</script>"; ?>
                </p>
            </div>
        </div>
        <?php else: ?>
        <section class="py-5">
            <div class="container">
                <div id="course-container" class="course-container">
                    <div id="course-wrapper" class="course-wrapper">
                        <?php 
                        $displayedCourses = [];
                        while($row = $products->fetch_assoc()): 
                            if (in_array($row['id'], $displayedCourses)) {
                                continue;
                            }
                            $displayedCourses[] = $row['id'];
                            
                            $upload_path = base_app.'/a/uploads/cours_'.$row['id'];
                            $img = "";
                            if(is_dir($upload_path)){
                                $fileO = scandir($upload_path);
                                if(isset($fileO[2]))
                                    $img = "a/uploads/cours_".$row['id']."/".$fileO[2];
                                else
                                    $img = "path/to/default/image.jpg";
                            } else {
                                $img = "path/to/default/image.jpg";
                            }
                            foreach($row as $k => $v){
                                $row[$k] = trim(stripslashes($v));
                            }
                        ?>
                        <div class="course-item">
                            <div class="card">
                                <img class="card-img-top" src="<?php echo validate_image($img) ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['category'] ?></h5>
                                    <a href="/bn/a/p/prom.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">View Course</a>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>

                <!-- Pagination Controls -->
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <?php if($page > 1): ?>
                        <li class="page-item"><a class="page-link" href="#" onclick="loadPage(<?php echo $page - 1; ?>); return false;">Previous</a></li>
                        <?php endif; ?>

                        <?php for($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?php if($i == $page) echo 'active'; ?>"><a class="page-link" href="#" onclick="loadPage(<?php echo $i; ?>); return false;"><?php echo $i; ?></a></li>
                        <?php endfor; ?>

                        <?php if($page < $totalPages): ?>
                        <li class="page-item"><a class="page-link" href="#" onclick="loadPage(<?php echo $page + 1; ?>); return false;">Next</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </section>
        <?php endif; ?>

        <iframe src="/z/i/c/contrat.php" name="iframe_a" width="0px" height="1px"></iframe>

        <?php include('./constant/layout/footer.php'); ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(function(){
        $(".preloader").fadeOut();
    });

    function loadPage(page) {
        $.ajax({
            url: window.location.pathname,
            type: 'GET',
            data: { page: page },
            success: function(response) {
                var newContent = $(response).find('#course-wrapper').html();
                var $courseWrapper = $('#course-wrapper');
                $courseWrapper.css('transform', 'translateX(-100%)');
                setTimeout(function() {
                    $courseWrapper.html(newContent);
                    $courseWrapper.css('transform', 'translateX(0)');
                    updatePagination(page); 
                }, 500);
            }
        });
    }

    function updatePagination(currentPage) {
        $('.pagination').empty();

        if (currentPage > 1) {
            $('.pagination').append('<li class="page-item"><a class="page-link" href="#" onclick="loadPage(' + (currentPage - 1) + '); return false;">Previous</a></li>');
        }

        var totalPages = <?php echo $totalPages; ?>;
        var displayPages = [];
        if (totalPages <= 7) {
            for (var i = 1; i <= totalPages; i++) {
                displayPages.push(i);
            }
        } else {
            if (currentPage <= 4) {
                displayPages = [1, 2, 3, 4, 5, '...', totalPages];
            } else if (currentPage >= totalPages - 3) {
                displayPages = [1, '...', totalPages - 4, totalPages - 3, totalPages - 2, totalPages - 1, totalPages];
            } else {
                displayPages = [1, '...', currentPage - 1, currentPage, currentPage + 1, '...', totalPages];
            }
        }

        for (var i = 0; i < displayPages.length; i++) {
            if (displayPages[i] === '...') {
                $('.pagination').append('<li class="page-item disabled"><a class="page-link" href="#">...</a></li>');
            } else {
                var activeClass = displayPages[i] == currentPage ? 'active' : '';
                $('.pagination').append('<li class="page-item ' + activeClass + '"><a class="page-link" href="#" onclick="loadPage(' + displayPages[i] + '); return false;">' + displayPages[i] + '</a></li>');
            }
        }

        if (currentPage < totalPages) {
            $('.pagination').append('<li class="page-item"><a class="page-link" href="#" onclick="loadPage(' + (currentPage + 1) + '); return false;">Next</a></li>');
        }
    }

    $(document).ready(function() {
        updatePagination(<?php echo $page; ?>);
    });
    </script>
</body>
</html>
