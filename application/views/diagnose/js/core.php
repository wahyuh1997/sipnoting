<script>
  $(document).on('click', '.font-icon-wrapper', function() {
    $('.font-icon-wrapper').removeClass('bg-night-fade').removeClass('text-white')
    $('.font-icon-wrapper').find('p').removeClass('text-white')

    $(this).addClass('bg-night-fade');
    $(this, 'i').addClass('text-white');
    $(this).find('p').addClass('text-white');
  });
</script>