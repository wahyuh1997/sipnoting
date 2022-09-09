<script>
  $(document).on('click', '.font-icon-wrapper', function() {
    $('.font-icon-wrapper').removeClass('active');
    $(this).addClass('active');

    $('#jenis_kelamin').val($(this).data('val'));
  });
</script>