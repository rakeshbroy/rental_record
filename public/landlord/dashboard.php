<?php require_once('../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php

$id = $_GET['id'];

$landlord = find_landlord_by_id($id);

?>

<?php $page_title = "Dashboard"; ?>

<?php include_once(SHARED_PATH . '/public_header.php'); ?>

<section role="dashboard">
    <h2>Dashboard<h2>
    <h3>Welcome, <?php echo $landlord['first_name'] . " " . $landlord['last_name']; ?></h3>
    <a href="<?php echo url_for('/landlord/logout.php') ?>" >Logout</a>

</section>




<?php include_once(SHARED_PATH . '/public_footer.php'); ?>