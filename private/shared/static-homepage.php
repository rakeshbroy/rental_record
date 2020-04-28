<!-- <section class="container" role="static-homepage">
        <ul role="button-wrapper">
            <li><a href="<?= url_for('/landlord/login.php') ?>">Log In</a>
            <li><a href="<?= url_for('/landlord/signup.php') ?>">Sign Up</a>
        </ul>
</section> -->

<section>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 350px;">
            <section class="col-4 ">
                <h4 class="text-center text-uppercase">Tenent</h4>
                <img class="d-block mx-auto" src="<?= url_for('/images/tenent.png'); ?>" alt="tenent-image">
                <a class="d-block text-center bg-dark text-light text-decoration-none mb-2 rounded-sm" href="<?= url_for('/tenent/login.php') ?>">Log In</a>
                <a class="d-block text-center bg-dark text-light text-decoration-none mb-2 rounded-sm" href="<?= url_for('/tenent/singup.php')  ?>">Sing Up</a>
            </section>
            <section class="col-4">
                <h4 class="text-center text-uppercase">Landlord</h4>
                <img class="d-block mx-auto" src="<?= url_for('/images/landlord.png'); ?>" alt="landlord-image">
                <a class="d-block text-center bg-dark text-light text-decoration-none mb-2 rounded-sm" href="<?= url_for('/landlord/login.php') ?>">Log In</a>
                <a class="d-block text-center bg-dark text-light text-decoration-none mb-2 rounded-sm" href="<?= url_for('/landlord/signup.php')  ?>">Sing Up</a>
            </section>
        </div>
    </div>
</section>