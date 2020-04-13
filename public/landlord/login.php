<?php require_once('../../private/initialize.php'); 

$page_title = "Log In"; 

    $errros = [];
    $username = '';
    $password ='';

    if(is_post_request()) {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // validation
        if(is_blank($username)) {
            $errros[] = "Username can't be blank.";
        }
        if(is_blank($password)) {
            $errros[] = "Password can't be blank.";
        }

        // if there were no errors, try to login
        if(empty($errros)) {
            $login_failure_msg = "Invalid username and password.";

            $landlord = find_landlord_by_username($username);

            if($landlord) {

                if(password_verify($password, $landlord['hashed_password'])) {
                    
                    log_in_landlord($landlord);
                    redirect_to(url_for('/landlord/dashboard.php?id=' . $landlord['id']));
                } else {
                    $errros[] = $login_failure_msg;
                }
            } else {
                $errros[] = $login_failure_msg;
            }
        }
    }

?>

<?php include_once(SHARED_PATH . '/public_header.php'); ?>

<section role="login">
    <a id="back-link" href="<?php echo url_for() ?>">&laquo;back</a>
    <?php echo display_errors($errros); ?>
    <div class="login-form-wrapper">
        <form method="post" action="<?= url_for('/landlord/login.php')?>">
            <dl>
                <dt>
                    <label for="username" role="usernamelabel">Username : </label>
                </dt>
                <dd>
                    <input type="text" name="username" value="<?= $username ?>">
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="password" role="passwordlabel">Password : </label>
                </dt>
                <dd>
                    <input type="password" name="password">
                </dd>
            </dl>
            <input type="submit" name="submit" value="log In">
        </form>  
    </div>
</section>


<?php include_once(SHARED_PATH . '/public_footer.php'); ?>