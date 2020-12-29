<nav class="nav navbar-dark navbar-expand-sm sticky-top" style="background-color: #8F939E;">
    <div class="container">
        <div class="navbar-nav justify-content-end p-1">
            <a class="nav-item nav-link" href=" <?php 
                                                  if(is_logged_in()) {
                                                    echo url_for('/landlord/dashboard.php?id=' . $_SESSION['landlord_id']);
                                                  } else {
                                                    echo url_for();
                                                  }
                                                ?>">Home</a>
            <?php if(!is_logged_in()) {?>
              <?= '<a class="nav-item nav-link" href="#">About Us</a>' ?>
              <?= '<a class="nav-item nav-link" href="#">Rules & Regulations For Tenent</a>' ?>
            <?php } ?>
            <?php if(is_logged_in()) { ?>
              <div class="dropdown">
                <a 
                  href="#"
                  class="nav-item nav-link dropdown-toggle"
                  data-toggle="dropdown"
                  id="accountDropdown"
                  aria-haspopup="true"
                  aria-expnaded="false"
                >
                 Account
                </a>
                <div class="dropdown-menu mt-1" aria-lablledby="accountDropdown">
                  <a class="dropdown-item btn-sm" href="#">Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item btn-sm" href="<?= url_for('/landlord/logout.php'); ?>">Logout</a>
                </div>
              </div>

            <?php } ?>
            <?php if(!is_logged_in()) { ?>
              <?= '<a class="nav-item nav-link" href="#">Contact Us</a>' ?>
            <?php } ?>
        </div>
    </div>
</nav>