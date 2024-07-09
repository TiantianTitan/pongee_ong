<?php
require_once('./constant/connect.php');
include("php/dbconnect.php");

$courseId = $_GET['id'];

$courseQuery = $conn->query("SELECT * FROM `categories` WHERE id = '$courseId'");
$courseData = $courseQuery->fetch_assoc();

$qcmQuery = $conn->query("SELECT * FROM `qcm` WHERE course_id = '$courseId'");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>QCM - <?php echo htmlspecialchars($courseData['category'], ENT_QUOTES, 'UTF-8'); ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">QCM for <?php echo htmlspecialchars($courseData['category'], ENT_QUOTES, 'UTF-8'); ?></h2>
        <form action="submit_qcm.php" method="POST">
            <?php while($qcm = $qcmQuery->fetch_assoc()): ?>
                <div class="form-group">
                    <label><?php echo htmlspecialchars($qcm['question'], ENT_QUOTES, 'UTF-8'); ?></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?php echo $qcm['id']; ?>" value="1" required>
                        <label class="form-check-label"><?php echo htmlspecialchars($qcm['choice1'], ENT_QUOTES, 'UTF-8'); ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?php echo $qcm['id']; ?>" value="2" required>
                        <label class="form-check-label"><?php echo htmlspecialchars($qcm['choice2'], ENT_QUOTES, 'UTF-8'); ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?php echo $qcm['id']; ?>" value="3" required>
                        <label class="form-check-label"><?php echo htmlspecialchars($qcm['choice3'], ENT_QUOTES, 'UTF-8'); ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?php echo $qcm['id']; ?>" value="4" required>
                        <label class="form-check-label"><?php echo htmlspecialchars($qcm['choice4'], ENT_QUOTES, 'UTF-8'); ?></label>
                    </div>
                </div>
            <?php endwhile; ?>
            <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($courseId, ENT_QUOTES, 'UTF-8'); ?>">
            <button type="submit" class="btn btn-primary btn-block">FINIR LE TEST</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
