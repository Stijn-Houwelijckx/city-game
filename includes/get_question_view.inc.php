<?php

declare(strict_types=1);

function show_question() {
    if(isset($_SESSION["question_text"])) {
        echo $_SESSION["question_text"];
    } else {
        echo "error question";

        header("Location: includes/get_location.inc.php");

        die();
    }
}

function show_question_number() {
    if(isset($_SESSION["question_id"])) {
        echo $_SESSION["question_id"];
    } else {
        echo "error question number";
    }
}

function show_answer1() {
    if(isset($_SESSION["answer1"])) {
        echo $_SESSION["answer1"];
    } else {
        echo "error answer1";
    }
}

function show_answer2() {
    if(isset($_SESSION["answer2"])) {
        echo $_SESSION["answer2"];
    } else {
        echo "error answer2";
    }
}

function show_answer3() {
    if(isset($_SESSION["answer3"])) {
        echo $_SESSION["answer3"];
    } else {
        echo "error answer3";
    }
}

?>