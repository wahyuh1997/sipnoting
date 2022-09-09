<script>
  $(document).on('click', '.del-reset', function(e) {
    e.preventDefault();

    // init
    var url = $(this).attr('href');

    // confirmation
    Swal.fire({
      icon: 'warning',
      title: 'Konfirmasi',
      showCancelButton: true,
      confirmButtonText: `Ya`,
      cancelButtonText: 'Tidak',
      text: 'Apakah Anda Yakin Akan Reset Password Pada Akun Ini ?',
    }).then((result) => {
      // check if confirmed
      if (result.isConfirmed) {
        // do delete
        $.get(url, function(response) {
          // parsing the json
          let textParse = JSON.parse(response);

          // check status of response
          if (textParse.status == true) {
            Swal.fire({
              icon: 'success',
              title: "Password Berhasil Di Reset 'qwerty'",
              confirmButtonText: `OK`,
              text: textParse.message,
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = window.location.href;
              }
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: "{{Failed}}",
              text: textParse.message,
            })
          }
        });
      }
    });
  });
</script>