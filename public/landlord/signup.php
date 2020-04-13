<?php require_once('../../private/initialize.php'); ?>
<?php $page_title = "Sign Up"; ?>

<?php include_once(SHARED_PATH . '/public_header.php'); ?>

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

<section role="signup">
    <a id="back-link" href="<?= url_for() ?>">&laquo;Back</a>
    <div class="singup-form-wrapper">
        <?php echo display_errors($errors); ?>
        <form role="singup-form" method="post" action="<?= url_for('/landlord/signup.php'); ?>">
            <dl>
                <dt><label for="first_name" role="firstnamelabel">First Name</label>
                <dd><input type="text" name="first_name" value="<?= $landlord['first_name'] ?>">
            </dl>
            <dl>
                <dt><label for="last_name" role="lastnamelabel">Last Name</label>
                <dd><input type="text" name="last_name" value="<?= $landlord['last_name'] ?>">
            </dl>
            <dl>
                <dt><label for="email" role="emaillabel">E mail</label>
                <dd><input type="text" name="email" value="<?= $landlord['email'] ?>">
            </dl>
            <dl>
                <dt><label for="username" role="usernamelabel">Username</label>
                <dd><input type="text" name="username" value="<?= $landlord['username'] ?>">
            </dl>
            <dl>
                <dt><label for="password" role="passwordlabel">Password</label>
                <dd><input type="password" name="password" value="">
            </dl>
            <dl>
                <dt><label for="confirm_password" role="confirmpasswordlabel">Confirm Password</label>
                <dd><input type="password" name="confirm_password" value="">
            </dl>
            <input type="submit" name="submit" value="Sign Up">
        </form>
    </div>
</section>


<?php include_once(SHARED_PATH . '/public_footer.php');