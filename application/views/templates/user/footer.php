<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/js/all.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script>
  $(".datepicker").datepicker({
    format: "yyyy-mm-dd",
    autoclose: true,
    orientation: "bottom auto"
  });
</script>
</body>

</html>