<?php

declare(strict_types=1);

function show_total_question_count() {
    if (isset($_SESSION['total_question_count'])) {
        echo  $_SESSION["total_question_count"];
    }
}

function show_right_answer_count() {
    if (isset($_SESSION['right_answer_count'])) {
        echo  $_SESSION["right_answer_count"];
    }
}

?>