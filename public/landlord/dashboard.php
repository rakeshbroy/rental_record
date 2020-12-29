<?php require_once('../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php

$id = $_GET['id'];

$landlord = find_landlord_by_id($id);

$tenants = find_all_tenants();
?>

<?php $page_title = "Dashboard | Tenants"; ?>

<?php include_once(SHARED_PATH . '/public_header.php'); ?>
<?php include_once(SHARED_PATH . '/public_navigation.php'); ?>

<section class="container mt-3" role="dashboard">
    <h4 class="mb-3 mt-3">Tenants<h4>
    <div class="row">
        <table class="table">
            <tr>
                <td>ID</td>
                <td>First Name</td>
                <td>Gender</td>
                <td>Mobile No</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <?php while($tenant = mysqli_fetch_assoc($tenants)) { ?>
                <tr>
                    <td><?= $tenant['id'] ?></td>
                    <td><?= $tenant['first_name'] ?></td>
                    <td><?= $tenant['gender'] ?></td>
                    <td><?= $tenant['mobile_no'] ?></td>
                    <td><a class="btn btn-secondary" href="<?= url_for('/tenant/show.php?id=' . $tenant['id']); ?>">Show</a></td>
                    <td><a class="btn btn-secondary" href="<?= url_for('/tenant/edit.php?id=' . $tenant['id']); ?>">Edit</a></td>
                    <td><a class="btn btn-secondary" href="<?= url_for('/tenant/delete.php?id=' . $tenant['id']); ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</section>


<?php include_once(SHARED_PATH . '/public_footer.php'); ?>