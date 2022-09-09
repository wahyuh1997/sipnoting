<script>
  $(".datemonth").datepicker({
    startView: 1,
    minViewMode: 1,
    maxViewMode: 2,
    todayHighlight: true,
    format: "yyyy-mm",
    autoclose: true,
    endDate: '+0m',
    orientation: "bottom auto"
  });

  const ctxLine = document.getElementById('myLineChart').getContext('2d');
  const myLineChart = new Chart(ctxLine, {
    type: 'line',
    data: {
      labels: ['Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
      datasets: [{
          label: 'Berat Badan',
          data: [8, 17, 10, 12, 6, 9],
          fill: false,
          tension: 0.1,
          borderColor: '#d92550',
          backgroundColor: '#d92550',
          borderWidth: 1
        }, {
          label: 'Tinggi Badan',
          data: [12, 19, 3, 5, 8, 3],
          fill: false,
          tension: 0.1,
          borderColor: '#3ac47d',
          backgroundColor: '#3ac47d',
          borderWidth: 1
        },
        {
          label: 'Z-Score',
          data: [19, 7, 4, 8, 2, 6],
          fill: false,
          tension: 0.1,
          borderColor: '#3f6ad8',
          backgroundColor: '#3f6ad8',
          borderWidth: 1
        }
      ]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  $(document).on('click', '#select-date', function() {
    let month = $('.datemonth').val();

    $.get('grafik/index/' + month, function(data) {

    });
  });
</script>