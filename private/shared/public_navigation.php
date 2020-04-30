<nav class="nav navbar-dark navbar-expand-sm" style="background-color: #8F939E;">
    <div class="container">
        <div class="navbar-nav justify-content-end p-1">
            <a class="nav-item nav-link" href="<?php url_for(); ?>">Home</a>
            <a class="nav-item nav-link" href="#">About Us</a>
            <a class="nav-item nav-link bg-danger rounded-pill" href="#">Rules & Regulations For Tenent</a>
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
              <div class="dropdown-menu" aria-lablledby="accountDropdown">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Logout</a>
              </div>
            </div>
            <a class="nav-item nav-link" href="#">Contact Us</a>
        </div>
    </div>
</nav>