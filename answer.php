<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/get_question_view.inc.php';
require_once 'includes/question_view.inc.php';

if (!isset($_SESSION["group_id"])) {
  header("Location: index.php?error=notLoggedIn");
  die();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>XD City Game</title>

    <link rel="stylesheet" href="css/reset.css" />

    <!-- Font Stylesheet -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Jost:wght@900&display=swap"
    />
    <link rel="stylesheet" href="https://use.typekit.net/fem7syl.css" />

    <!-- Main stylesheet -->
    <link rel="stylesheet" href="css/styleApp.css" />
  </head>
  <body>
    <div class="container">
      <header>
        <nav class="primary-nav">
          <a class="logo-small" href="index.php">
            <img src="assets/images/Logo.svg" alt="XD-Logo" />
          </a>
        </nav>

        <h1 class="heading location-heading orange6">Question <?php show_question_number(); ?>:</h1>
      </header>

      <section class="question-section">
        <p class="question green6"> <?php show_question(); ?> </p>
      </section>

      <section class="answers-section">
        <form
          action="includes/get_location.inc.php"
          method="post"
        >
          <div class="radio-box">
            <label class="radio-container">
              <input
                type="radio"
                name="answer"
                id="option1"
                class="answer-option"
                value="<?php show_answer1(); ?>"
                disabled
              />
              <span class="checkmark"></span>
              <?php show_answer1(); ?>
            </label>

            <label class="radio-container">
              <input
                type="radio"
                name="answer"
                id="option2"
                class="answer-option"
                value="<?php show_answer2(); ?>"
                disabled
              />
              <span class="checkmark"></span>
              <?php show_answer2(); ?>
            </label>

            <label class="radio-container">
              <input
                type="radio"
                name="answer"
                id="option3"
                class="answer-option"
                value="<?php show_answer3(); ?>"
                disabled
              />
              <span class="checkmark"></span>
              <?php show_answer3(); ?>
            </label>
          </div>

          <div class="error-message"> <?php echo $_SESSION["right_answer"] ?> </div>

          <button class="btn btn-primary" type="submit">Go to next location</button>
        </form>
      </section>
    </div>

    <script src="javascript/questionPage.js"></script>
  </body>
</html>
