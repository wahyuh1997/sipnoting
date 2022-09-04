</div>
</div>
</div>
</div>
<script src="<?= base_url('assets/js/jquery-3.6.1.js'); ?>"></script>
<script src="<?= base_url('assets/js/all.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/datatables.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/assets/scripts/main.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/main.js"></script>
<script>
  /* Logout Function */
  $(document).on('click', '.btn-logout', function(e) {
    e.preventDefault();

    // init
    var url = $(this).attr('href');
    var redUrl = $(this).data('redurl');

    // confirmation
    Swal.fire({
      icon: 'question',
      title: 'Konfirmasi',
      showCancelButton: true,
      confirmButtonText: `OK`,
      cancelButtonText: 'Batal',
      text: 'Apakah Anda Yakin Ingin Keluar ?',
    }).then((result) => {
      // check if confirmed
      if (result.isConfirmed) {
        // do logout
        $.get(url, function() {
          window.location.href = redUrl;
        });
      }
    });
  });
</script>

</body>

</html>