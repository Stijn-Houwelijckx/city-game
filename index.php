<?php
require_once 'includes/config_session.inc.php';

if (isset($_SESSION["group_id"])) {
  session_start();
  session_unset();
  session_destroy();
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
    <div class="container mechelen-background">
      <header>
        <a class="logo-big" href="index.php">
          <img src="assets/images/Logo.svg" alt="XD-Logo" />
        </a>

        <h1 class="home-title orange1">Community day</h1>
        <h2>City game</h2>
      </header>

      <section class="home-section">
        <p class="title">Create or log in to your fellow group</p>

        <div class="btn-container green1">
          <a class="btn btn-primary" href="createGroup.php"
            >Create fellow group</a
          >
          <a class="btn" href="login.php">Log in to fellow group</a>
        </div>
      </section>
    </div>
  </body>
</html>
