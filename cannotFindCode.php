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
        <nav class="primary-nav location-nav">
          <a class="logo-small" href="index.php">
            <img src="assets/images/Logo.svg" alt="XD-Logo" />
          </a>

          <a class="back-btn" href="codeInput.php">
            <span class="icon-container icon-btn-standard">
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                class="icon"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M7.71967 12.5303C7.42678 12.2374 7.42678 11.7626 7.71967 11.4697L15.2197 3.96967C15.5126 3.67678 15.9874 3.67678 16.2803 3.96967C16.5732 4.26256 16.5732 4.73744 16.2803 5.03033L9.31066 12L16.2803 18.9697C16.5732 19.2626 16.5732 19.7374 16.2803 20.0303C15.9874 20.3232 15.5126 20.3232 15.2197 20.0303L7.71967 12.5303Z"
                  fill="currentColor"
                />
              </svg>
            </span>
          </a>
        </nav>

        <h1 class="heading location-heading cannot-find-heading">Location</h1>
      </header>

      <section class="location-section">
        <!-- <p class="coordinates">
          <span class="longitude">51.028752</span>,
          <span class="latitude">4.478094</span>
        </p> -->
        <!-- <div class="btn-container">
          <a class="btn" href="#">See on map</a>
        </div> -->

        <img src="<?php echo $_SESSION["location_image"] ?>" alt="Location" />

        <div class="btn-container">
          <a class="btn" href="includes/get_location.inc.php">Found Code</a>
        </div>

        <p class="title call-us-title">Still cannot find it? Call us.</p>
        <a class="phone-number" href="tel:+32472073283"
          >Stijn: +32472073283</a
        >
        <a class="phone-number" href="tel:+32476756736"
          >Jonas: +32476756736</a
        >
      </section>
    </div>
  </body>
</html>
