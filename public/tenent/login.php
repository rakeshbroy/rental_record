<?php require_once('../../private/initialize.php'); 

$page_title = "Login"; 

$username = '';
$password = '';

if(is_post_request()) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if(is_blank()) {
        $errors[] = "Username can't be blank";
    }
    if(is_blank($password)) {
        $errors[] = "Password can't be blank.";
    }

    if(empty($errors)) {
        $login_failure_msg = "Invalid username and password.";

        $landlord = find_landlord_by_username($username);

        if($landlord) {

            if(password_verify($password, $landlord['hashed_password'])) {
                
                log_in_landlord($landlord);
                redirect_to(url_for('/landlord/dashboard.php?id=' . $landlord['id']));
            } else {
                $errors[] = $login_failure_msg;
            }
        } else {
            $errors[] = $login_failure_msg;
        }
    }
}


?>

<?php include_once(SHARED_PATH . '/public_header.php'); ?>
<?php include_once(SHARED_PATH . '/public_navigation.php'); ?>
<?php echo display_errors($errors); ?>
<section class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12 col-5">
            <form method="post" action="<?= url_for('/tenent/login.php')?>">
                <fieldset class="form-group" role="login">
                    <!-- <a id="back-link" href="<?php echo url_for() ?>">&laquo;back</a> -->
                    <legend class="text-center">Login</legend>
                    <!-- <?php echo display_errors($errros); ?> -->
                    <div class="form-group">
                        <label class="form-control-label sr-only" for="username" role="usernamelabel">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img class="d-block img-fluid" src="<?= url_for('/images/username-icon.png'); ?>" alt="" style="width:20px;">
                                    </div>
                                </div>
                                <input class="form-control" type="text" name="username" placeholder="Username" value="<?= $username ?>"> 
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label sr-only" for="password" role="passwordlabel">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <img class="d-block img-fluid" src="<?= url_for('/images/password-icon.png'); ?>" alt="" style="width:20px;">
                                </div>
                            </div>
                            <input class="form-control" type="password" name="password" placeholder="Password">
                        </div>
                    </div>
                </fieldset>
                <input class="btn btn-secondary btn-block" type="submit" name="submit" value="log In">
            </form>  
        </div>
        <!-- col div -->
    </div>
    <!-- div row -->
</section>

<?php include_once(SHARED_PATH . '/public_footer.php'); ?>