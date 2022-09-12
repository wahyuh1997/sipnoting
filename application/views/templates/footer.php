</div>
</div>
</div>
</div>
<script src="<?= base_url('assets/js/jquery-3.6.1.js'); ?>"></script>
<script src="<?= base_url('assets/js/all.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/datatables.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/select2.full.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/assets/scripts/main.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/main-02.js"></script>
<script>
  $(document).ready(function() {
    $('#myTable').DataTable({
      'scrollX': true
    });

    $('#export-table').DataTable({
      scrollX: true,
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    });

    $('.select2').select2();
  });
</script>

</body>

</html>