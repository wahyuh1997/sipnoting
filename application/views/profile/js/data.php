<script>
  $(document).on('click', '.font-icon-wrapper', function() {
    $('.font-icon-wrapper').removeClass('active');
    $(this).addClass('active');

    $('#jenis_kelamin').val($(this).data('val'));
  });

  function checkKey(e) {
    if (/\d/.test(e.key)) {
      e.preventDefault();
      e.stopPropagation();
    }
  }

  const input = document.querySelector('input');
  input.addEventListener('touchstart', checkKey);
  input.addEventListener('keydown', checkKey);
</script>