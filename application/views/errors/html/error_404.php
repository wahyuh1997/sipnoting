<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>404 HTML Tempalte by Colorlib</title>

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">

  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/'); ?>error.css" />

</head>

<body>

  <div id="notfound">
    <div class="notfound">
      <div class="notfound-404">
        <h1>Oops!</h1>
      </div>
      <h2>404 - Page not found</h2>
      <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
      <?php if (isset($_SESSION['sipnoting_admin'])) : ?>
        <a href="<?= base_url('dashboard'); ?>">Go To Homepage</a>
      <?php else : ?>
        <a href="<?= base_url('home'); ?>">Go To Homepage</a>
      <?php endif; ?>
    </div>
  </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>