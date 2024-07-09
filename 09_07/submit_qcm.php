<?php
require_once('./constant/connect.php');
include("php/dbconnect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $courseId = $_POST['course_id'];
    $score = 0;
    $questions = [];

    $qcmQuery = $conn->query("SELECT * FROM `qcm` WHERE course_id = '$courseId'");

    while($qcm = $qcmQuery->fetch_assoc()) {
        $questionId = $qcm['id'];
        $correctChoice = $qcm['correct_choice'];
        $userChoice = $_POST['question'.$questionId];

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
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            background-color: #fff;
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
                    <?php if ($q['user_choice'] != $q['correct_choice']): ?>
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
