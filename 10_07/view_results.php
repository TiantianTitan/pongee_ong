<?php
session_start();
require_once('./constant/connect.php');
include("php/dbconnect.php");

$courseId = $_GET['course_id'];
$userId = $_SESSION['userId']; // 假设用户ID保存在会话中

if (empty($userId)) {
    die('User ID not found in session.');
}

// 获取课程名称
$categoryQuery = $conn->query("SELECT category FROM `categories` WHERE id = '$courseId'");
$categoryData = $categoryQuery->fetch_assoc();
$categoryName = $categoryData['category'];

// 获取当前用户的测试结果
$resultsQuery = $conn->query("SELECT qr.*, s.nom as username FROM qcm_results qr
                             JOIN student s ON qr.user_id = s.id
                             WHERE qr.course_id = '$courseId' AND qr.user_id = '$userId' ORDER BY qr.test_date DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Résultats des tests pour le cours "<?php echo htmlspecialchars($categoryName, ENT_QUOTES, 'UTF-8'); ?>"</title>
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
        .table thead th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Résultats des tests pour le cours "<?php echo htmlspecialchars($categoryName, ENT_QUOTES, 'UTF-8'); ?>"</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Utilisateur</th>
                    <th>Score</th>
                    <th>Total des questions</th>
                    <th>Pourcentage</th>
                    <th>Date du test</th>
                </tr>
            </thead>
            <tbody>
                <?php while($result = $resultsQuery->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($result['username'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo $result['score']; ?></td>
                        <td><?php echo $result['total_questions']; ?></td>
                        <td><?php echo number_format($result['percentage'], 2); ?>%</td>
                        <td><?php echo $result['test_date']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div class="text-center mt-4">
            <a href="prom.php?id=<?php echo $courseId; ?>" class="btn btn-primary">Retour au cours</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
