<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $page_title; ?></title>
    <!-- <link rel="stylesheet" type="text/css" href="<?= url_for("/css/style.css") ?>" /> -->
    <link rel="stylesheet" type="text/css" href="<?= url_for("/css/bootstrap.min.css") ?>" />
    <style>
      img {
        width: 100px;
      }
    </style>
  </head>
  <body>
    <header style="height:35vh; background: url(<?php echo url_for('/images/background.jpg') ?>) no-repeat center center; background-size: cover;">
      <div class="container">
          <!-- <img src="<?php echo url_for('/images/header-logo.png'); ?>" alt="header-logo"> -->
      </div>
    </header>