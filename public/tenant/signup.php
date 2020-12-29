<?php require_once('../../private/initialize.php'); ?>
<?php $page_title = "Sign Up"; ?>


<?php

if(is_post_request()) {
    
    $landlord = [];
    $landlord['first_name'] = $_POST['first_name'];
    $landlord['last_name'] = $_POST['last_name'];
    $landlord['email'] = $_POST['email'];
    $landlord['username'] = $_POST['username'];
    $landlord['password'] = $_POST['password'];
    $landlord['confirm_password'] = $_POST['confirm_password'];
    
    
    $result = insert_landlord($landlord);
    
    if($result === true) {
        $new_id = mysqli_insert_id($db);
        $_SESSION['message'] = "Account Created";
        $landlord['id'] = $new_id;
        // Setting session after complete sucessfull signup
        // then redirecting to dashborad page
        log_in_landlord($landlord);
        redirect_to(url_for('/landlord/dashboard.php?id=' . $new_id));
    } else {
        $errors = $result;
    }
} else {
    
    $landlord = [];
    $landlord['first_name'] = "";
    $landlord['last_name'] = "";
    $landlord['email'] = "";
    $landlord['username'] = "";
    $landlord['password'] = "";
    $landlord['confirm_password'] = "";
    
}

?>

<?php include_once(SHARED_PATH . '/public_header.php'); ?>
<?php include_once(SHARED_PATH . '/public_navigation.php'); ?>
<?php echo display_errors($errors); ?>
<section class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-5 col-12">
            <form role="singup-form" method="post" action="<?= url_for('/landlord/signup.php'); ?>">
                <fieldset role="signup">
                    <!-- <a id="back-link" href="<?= url_for() ?>">&laquo;Back</a> -->
                    <legend class="text-center text-captalize">Sign up</legend>
                    <!-- <?php echo display_errors($errors); ?> -->
                    <div class="form-group">
                        <label class="form-control-label" for="first_name" role="firstnamelabel">First Name</label>
                        <input class="form-control" type="text" name="first_name" value="">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="last_name" role="lastnamelabel">Middle Name</label>
                        <input class="form-control" type="text" name="middle_name" value="">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="email" role="emaillabel">Last Name</label>
                        <input class="form-control" type="text" name="last_name" value="">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="username" role="usernamelabel">Username</label>
                        <input class="form-control" type="text" name="username" value="">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="password" role="passwordlabel">Password</label>
                        <input class="form-control" type="password" name="password" value="">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="confirm_password" role="confirmpasswordlabel">Confirm Password</label>
                        <input class="form-control" type="password" name="confirm_password" value="">
                    </div>
                    </fieldset>
                <input class="btn btn-primary btn-block" type="submit" name="submit" value="Sign Up">
            </form>
        </div>
        <!-- div col -->
    </div>
    <!-- div row -->
</section>
<!-- section container -->

<?php include_once(SHARED_PATH . '/public_footer.php');