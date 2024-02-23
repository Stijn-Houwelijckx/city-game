<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/get_location_view.inc.php';
require_once 'includes/code_input_view.inc.php';

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
        <nav class="primary-nav primary-location-nav">
          <a class="logo-small" href="index.php">
            <img src="assets/images/Logo.svg" alt="XD-Logo" />
          </a>
        </nav>

        <h1 class="heading location-heading orange5">
          Go to the <br />
          next <a class="location-link" href="http://www.google.com/maps/place/<?php show_location_lat(); ?>,<?php show_location_lon(); ?>" target="_blank">location</a>
        </h1>
      </header>

      <!-- <section class="location-section">
        <p class="coordinates">
          <span class="latitude"> <?php show_location_lat(); ?> </span>,
          <span class="longitude"> <?php show_location_lon(); ?> </span>
        </p>
        <div class="btn-container">
          <a class="btn" href="#">See on map</a>
        </div>

        <a class="btn-cannot-find green5" href="cannotFindCode.html"
          >Cannot find QR-Code</a
        >
      </section> -->

      <section class="map">
        <iframe src="https://www.google.com/maps?q=<?php show_location_lat(); ?>,<?php show_location_lon(); ?>&hl=en;z%3D14&amp&output=embed" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
        <a class="btn-cannot-find" href="cannotFindCode.php">
          Cannot find the code
        </a>
      </section>

      <section class="code-section">
        <form
          action="includes/code_input.inc.php"
          method="post"
        >
          <div class="input-box">
            <input
              id="input-code"
              name="input_code"
              type="text"
              autocomplete="off"
              placeholder="placeholder"
              minlength="1"
              maxlength="50"
              required
            />
            <label for="input-code">Input code</label>
          </div>

          <div class="error-message"> <?php check_code_input_errors(); ?> </div>

          <button class="btn confirmBtn" type="submit">Confirm</button>
        </form>

        <!-- <p class="found">1/15 questions found</p> -->
      </section>
    </div>

    <script src="javascript/codeInput.js"></script>
  </body>
</html>
