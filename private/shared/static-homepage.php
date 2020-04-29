<section>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 350px;">
            <section class="col-4 ">
                <div class="h5 text-center text-uppercase">Tenent</div>
                <img class="d-block mx-auto img-fluid" src="<?= url_for('/images/tenent.png'); ?>" alt="tenent-image" style="width: 100px;">
                <a class="d-block text-center bg-dark text-light text-decoration-none mb-2 rounded-sm p-1" href="<?= url_for('/tenent/login.php') ?>">Log In</a>
                <a class="d-block text-center bg-dark text-light text-decoration-none mb-2 rounded-sm p-1" href="<?= url_for('/tenent/singup.php')  ?>">Sign Up</a>
            </section>
            <section class="col-4">
                <div class="h5 text-center text-uppercase">Landlord</div>
                <img class="d-block mx-auto img-fluid" src="<?= url_for('/images/landlord.png'); ?>" alt="landlord-image" style="width: 100px;">
                <a class="d-block text-center bg-dark text-light text-decoration-none mb-2 rounded-sm p-1" href="<?= url_for('/landlord/login.php') ?>">Log In</a>
                <a class="d-block text-center bg-dark text-light text-decoration-none mb-2 rounded-sm p-1" href="<?= url_for('/landlord/signup.php')  ?>">Sign Up</a>
            </section>
        </div>
    </div>
</section>