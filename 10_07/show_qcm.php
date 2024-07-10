<?php
require_once('./constant/connect.php');
include("php/dbconnect.php");

$courseId = $_GET['id'];

$courseQuery = $conn->query("SELECT * FROM `categories` WHERE id = '$courseId'");
$courseData = $courseQuery->fetch_assoc();

$qcmQuery = $conn->query("SELECT * FROM `qcm` WHERE course_id = '$courseId'");
?>

<!DOCTYPE html>
<meta charset="UTF-8">
<html>
<head>
    <meta charset="UTF-8">
    <title>QCM - <?php echo htmlspecialchars($courseData['category'], ENT_QUOTES, 'UTF-8'); ?></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('bg_qcm.jpeg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
            background-color: rgba(255, 255, 255, 0.9);
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
    <script>
        function validateForm() {
            let form = document.forms["qcmForm"];
            let inputs = form.getElementsByTagName("input");
            let unanswered = false;

            for (let i = 0; i < inputs.length; i++) {
                if (inputs[i].type === "radio") {
                    let name = inputs[i].name;
                    if (!form.querySelector(`input[name="${name}"]:checked`)) {
                        unanswered = true;
                        break;
                    }
                }
            }

            if (unanswered) {
                return confirm("Certaines questions n'ont pas été répondues. Voulez-vous continuer?");
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2 class="text-center">QCM for <?php echo htmlspecialchars($courseData['category'], ENT_QUOTES, 'UTF-8'); ?></h2>
        <form name="qcmForm" action="submit_qcm.php" method="POST" onsubmit="return validateForm()">
            <?php while($qcm = $qcmQuery->fetch_assoc()): ?>
                <div class="form-group">
                    <label><?php echo htmlspecialchars($qcm['question'], ENT_QUOTES, 'UTF-8'); ?></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?php echo $qcm['id']; ?>" value="1">
                        <label class="form-check-label"><?php echo htmlspecialchars($qcm['choice1'], ENT_QUOTES, 'UTF-8'); ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?php echo $qcm['id']; ?>" value="2">
                        <label class="form-check-label"><?php echo htmlspecialchars($qcm['choice2'], ENT_QUOTES, 'UTF-8'); ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?php echo $qcm['id']; ?>" value="3">
                        <label class="form-check-label"><?php echo htmlspecialchars($qcm['choice3'], ENT_QUOTES, 'UTF-8'); ?></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="question<?php echo $qcm['id']; ?>" value="4">
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
