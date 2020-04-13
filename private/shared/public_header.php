<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $page_title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?= url_for("/css/style.css") ?>" />
  </head>
  <body>
    <header role="haeder">
      <a href="<?php if(isset($_SESSION['landlord_id'])) {
        echo url_for('/landlord/show?id=' . $_SERVER['landlord_id']);
      } else {
        echo url_for();
      }
      ?>" ><img role="header-image" src="<?= url_for('/images/header-logo.png') ?>" /></a>
      <h2>Online Rental Record Service</h2>
    </header>