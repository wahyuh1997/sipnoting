$(".datepicker").datepicker({
  format: "yyyy-mm-dd",
  autoclose: true,
  orientation: "bottom auto"
});

$('#regCrudForm').on('submit', function (e) {
  e.preventDefault();
  // init
  var url = $(this).attr('action');
  var redUrl = $(this).data('redurl');
  var form_data = new FormData($(this)[0]);
  Swal.fire({
    icon: 'warning',
    title: 'Konfirmasi',
    showCancelButton: true,
    confirmButtonText: `OK`,
    cancelButtonText: `Batal`,
    text: 'Pastikan Data Yang Anda Input Telah Sesuai',
  }).then((result) => {
    if (result.isConfirmed == false) {
      return false;
    } else if (result.isConfirmed == true) {
      $.ajax({
        type: 'POST',
        url: url,
        data: form_data,
        dataType: 'JSON',
        async: true,
        processData: false,
        contentType: false,
        beforeSend: function () {
          $('.bg-process').fadeIn();
        },
        success: function (textParse) {
          $('.bg-process').attr('style', 'display: none !important');

          if (textParse.status == true) {
            Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: textParse.message,
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = redUrl;
              }
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: textParse.message,
            })
          }
        }
      }).fail(function (jqXHR, ajaxOptions, thrownError) {
        $('.bg-process').attr('style', 'display: none !important');
        Swal.fire({
          icon: 'error',
          title: 'Failed',
          text: 'Server Not Responding',
        })
      });
    }
  })
});

/* Logout Function */
$(document).on('click', '.btn-logout', function (e) {
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
      $.get(url, function () {
        window.location.href = redUrl;
      });
    }
  });
});

$(document).on('click', '.del-sel', function (e) {
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
    text: 'Apakah Anda Yakin Akan Menghapus Data Ini ?',
  }).then((result) => {
    // check if confirmed
    if (result.isConfirmed) {
      // do delete
      $.get(url, function (response) {
        // parsing the json
        let textParse = JSON.parse(response);

        // check status of response
        if (textParse.status == true) {
          Swal.fire({
            icon: 'success',
            title: "Data Berhasil Dihapus",
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