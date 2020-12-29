    <footer class="container bg-light text-center">
        <p>Copyright <?php echo date('Y'); ?>, Online Rental Record Service</p>
    </footer>

  </body>
  <script src="<?= url_for('/js/jquery.slim.min.js'); ?>"></script>
  <script src="<?= url_for('js/script.js'); ?>"></script>
  <script src="<?= url_for('js/popper.min.js'); ?>"></script>
  <script src="<?= url_for('js/bootstrap.min.js'); ?>"></script>
</html>

<?php db_disconnect($db); ?>