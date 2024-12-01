<?php

require_once '../classes/DbConnector.php';
require_once '../classes/Quiz.php'; // Adjust the path accordingly

use classes\Quiz;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quizName = $_POST['quiz-name'];
    $questions = $_POST['questions'];
    $options = $_POST['options1'];
    $correctAnswers = $_POST['correct'];

    $quiz = new Quiz(null, $quizName, null, null, null);

    try {
        $quiz->saveQuiz($quiz, $questions, $options, $correctAnswers);

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
