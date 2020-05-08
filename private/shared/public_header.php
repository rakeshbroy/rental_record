<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $page_title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?= url_for("/css/bootstrap.min.css") ?>" />
  </head>
  <body>
    <header >
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100 img-fluid" style="height:350px;" src="<?= url_for('/images/c-one.jpg'); ?>" alt="house-image">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 img-fluid" style="height:350px;" src="<?= url_for('/images/c-two.jpg'); ?>" alt="house-image">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 img-fluid" style="height:350px;" src="<?= url_for('/images/c-three.jpg'); ?>" alt="house-image">
          </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
      </div>
    </header>