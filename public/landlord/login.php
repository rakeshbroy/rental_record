<?php require_once('../../private/initialize.php'); 

$page_title = "Log In"; 

    // $errors = [];
    $username = '';
    $password = '';

    if(is_post_request()) {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // validation
        if(is_blank($username)) {
            $errors[] = "Username can't be blank.";
        }
        if(is_blank($password)) {
            $errors[] = "Password can't be blank.";
        }

        // if there were no errors, try to login
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
<div class="d-none" id="alert-box">

</div>
<section class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-5 col-12">
            <form id="loginform" method="post" action="<?= url_for('/landlord/login.php')?>" name="myform">
                <fieldset class="form-group" role="login">
                    <legend class="text-center">Login</legend>
                    <div class="form-group">
                        <label class="form-control-label sr-only" for="username" role="usernamelabel">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img class="d-block img-fluid" src="<?= url_for('/images/username-icon.png'); ?>" alt="" style="width:20px;">
                                    </div>
                                </div>
                                <input id="username" class="form-control" type="text" name="username" placeholder="Username" value="<?= $username ?>" required >
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
                            <input id="password" class="form-control" type="password" name="password" placeholder="Password" required>
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