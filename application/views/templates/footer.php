</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/js/all.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/datatables.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/assets/scripts/main.js"></script>

<script>
  $(".datepicker").datepicker({
    format: "yyyy-mm-dd",
    autoclose: true,
    orientation: "bottom auto"
  });

  $(document).ready(function() {
    $('#myTable').DataTable({
      scrollX: true,
    });
  });
</script>
</body>

</html>