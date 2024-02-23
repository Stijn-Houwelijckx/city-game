<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/finish_view.inc.php';

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

        <h1 class="heading finish-heading orange5">
          You finished <br />
          all questions
        </h1>
      </header>

      <section class="finish-section">
        <p class="finish-score">
            You got <?php show_right_answer_count() ?>/<?php show_total_question_count() ?> questions correct!
        </p>
      </section>

      <h3>
          Go back to the Cultureel Centrum where you started this citygame
      </h3>
    </div>

    <script src="javascript/codeInput.js"></script>
  </body>
</html>
