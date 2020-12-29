<?php require_once('../../private/initialize.php'); ?>

<?php

$page_title = "Tenant Details";
$id = $_GET['id'];
$tenant = find_tenant_by_id($id);

if(is_post_request()) {
    $tenant = $_POST;
    if (update_tenant($id, $tenant)) {
        redirect_to(url_for('/landlord/dashboard.php?id=' . $_SESSION['id']));
    }
}


?>


<?php require_once(SHARED_PATH . '/public_header.php'); ?>
<?php require_once(SHARED_PATH . '/public_navigation.php'); ?>

<form class="container mt-4" method="post" action="">
    <div class="row mt-4 mb-4">
        <div class="col">
            <label class="form-control-label" for="first_name">First Name</label>
            <input class="form-control" type="text" name="first_name" value="<?= $tenant['first_name'] ?>">
        </div>
        <div class="col">
            <label class="form-control-label" for="middle_name">Middel Name</label>
            <input class="form-control" type="text" name="middle_name" value="<?= $tenant['middle_name'] ?>">
        </div>
        <div class="col">
            <label class="form-control-label" for="last_name">Last Name</label>
            <input class="form-control" type="text" name="last_name" value="<?= $tenant['last_name'] ?>">
        </div>
    </div>
    <div class="row mt-4 mb-4">
        <div class="col">
            <label class="form-control-text" for="gender">Gender</label>
            <select class="form-control" name="gender">
                <option value="M" <?php if($tenant['gender'] == 'M') echo "selected" ?>>Male</option>
                <option value="F" <?php if($tenant['gender'] == 'F') echo "selected" ?>>Female</option>
            </select>
        </div>
        <div class="col">
            <label class="form-control-text" for="marital_status">Marital Status</label>
            <select class="form-control" name="marital_status" >
                <option value="U" <?php if($tenant['marital_status'] == 'U') echo "selected" ?>>Unmarried</option>
                <option value="M" <?php if($tenant['marital_status'] == 'M') echo "selected" ?>>Married</option>
            </select>
        </div>
    </div>
    <div class="row mt-4 mb-4">
        <div class="col-12">
            <label class="form-control-text" for="parmanent_address">Present Address</label>
            <input class="form-control" type="text" name="parmanent_address" value="<?= $tenant['parmanent_address'] ?>">
        </div>
        <div class="col-12">
            <label class="form-control-text" for="current_address">Current Address</label>
            <input class="form-control" type="text" name="current_address" value="<?= $tenant['current_address'] ?>">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label class="form-control-label" for="mobile_no">Mobile No</label>
            <input class="form-control" type="nunber" name="mobile_no" value="<?= $tenant['mobile_no'] ?>">
        </div>
        <div class="col">
            <label class="form-control-label" for="date_of_prohibition">Date of Prohibition</label>
            <input class="form-control" type="date" name="date_of_prohibition" value="<?= $tenant['date_of_prohibition'] ?>">
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <input class="btn btn-secondary w-25" type="submit" value="Save" >
    </div>
</form>

<?php require_once(SHARED_PATH . '/public_footer.php') ?>