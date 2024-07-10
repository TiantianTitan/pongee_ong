<?php
session_start();
require_once('./constant/connect.php');
include("php/dbconnect.php");

// 开启错误报告
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $courseId = $_POST['course_id'];
    $userId = $_SESSION['userId']; // 假设用户ID保存在会话中
    $score = 0;
    $questions = [];

    if (empty($userId)) {
        die('User ID not found in session.');
    }

    $qcmQuery = $conn->query("SELECT * FROM `qcm` WHERE course_id = '$courseId'");

    while ($qcm = $qcmQuery->fetch_assoc()) {
        $questionId = $qcm['id'];
        $correctChoice = $qcm['correct_choice'];
        $userChoice = isset($_POST['question'.$questionId]) ? $_POST['question'.$questionId] : -1;

        if ($userChoice == $correctChoice) {
            $score++;
        }

        $questions[] = [
            'question' => $qcm['question'],
            'choices' => [$qcm['choice1'], $qcm['choice2'], $qcm['choice3'], $qcm['choice4']],
            'correct_choice' => $correctChoice,
            'user_choice' => $userChoice
        ];
    }

    $totalQuestions = count($questions);
    $percentage = ($score / $totalQuestions) * 100;
    $testDate = date('Y-m-d H:i:s');

    // 保存测试结果到数据库
    $insertQuery = "INSERT INTO qcm_results (user_id, course_id, score, total_questions, percentage, test_date) VALUES ('$userId', '$courseId', '$score', '$totalQuestions', '$percentage', '$testDate')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Résultat du QCM</title>
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
        .result {
            font-size: 1.5em;
            font-weight: bold;
        }
        .question {
            margin-top: 20px;
        }
        .correct {
            color: green;
        }
        .incorrect {
            color: red;
        }
        .not-answered {
            color: orange;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Résultat du QCM</h2>
        <div class="result text-center">
            Note: <?php echo $score; ?>/<?php echo $totalQuestions; ?> (<?php echo number_format($percentage, 2); ?>%)
        </div>
        <div class="questions mt-4">
            <?php foreach ($questions as $q): ?>
                <div class="question">
                    <p><strong><?php echo htmlspecialchars($q['question'], ENT_QUOTES, 'UTF-8'); ?></strong></p>
                    <?php foreach ($q['choices'] as $index => $choice): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" disabled <?php if ($q['user_choice'] == $index + 1) echo 'checked'; ?>>
                            <label class="form-check-label <?php if ($q['correct_choice'] == $index + 1) echo 'correct'; elseif ($q['user_choice'] == $index + 1) echo 'incorrect'; ?>">
                                <?php echo htmlspecialchars($choice, ENT_QUOTES, 'UTF-8'); ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                    <?php if ($q['user_choice'] == -1): ?>
                        <p class="text-danger">Vous n'avez pas sélectionné de réponse pour cette question.</p>
                        <p class="text-success">Réponse correcte: <?php echo htmlspecialchars($q['choices'][$q['correct_choice'] - 1], ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php elseif ($q['user_choice'] != $q['correct_choice']): ?>
                        <p class="text-danger">Vous avez sélectionné: <?php echo htmlspecialchars($q['choices'][$q['user_choice'] - 1], ENT_QUOTES, 'UTF-8'); ?></p>
                        <p class="text-success">Réponse correcte: <?php echo htmlspecialchars($q['choices'][$q['correct_choice'] - 1], ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4">
            <a href="prom.php?id=<?php echo $courseId; ?>" class="btn btn-primary">Retour au cours</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
