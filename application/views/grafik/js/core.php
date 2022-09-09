<script>
  var base_url = '<?= base_url() ?>'
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

  $(document).on('click', '#select-date', function() {
    let month = $('.datemonth').val();

    window.location.href = base_url + 'grafik/index/' + month
  });

  $(document).on('click', '.list-data', function() {
    let id = $(this).data('id');
    let month = $('.datemonth').val();

    $('tr').removeClass('selected');
    $(this).toggleClass('selected');

    $.get(base_url + `grafik/get_statistic?month=${month}&id=${id}`, function(data) {
      let res = JSON.parse(data)
      let berat = [];
      let tinggi = [];
      let score = [];

      for (let i = 7; i <= 9; i++) {
        let tempBerat = res.data.bulan[i].length > 0 ? res.data.bulan[i][0].berat_balita / 1000 : 0
        let tempTinggi = res.data.bulan[i].length > 0 ? res.data.bulan[i][0].tinggi_balita : 0
        let tempScore = res.data.bulan[i].length > 0 ? res.data.bulan[i][0].z_score : 0
        berat.push(tempBerat);
        tinggi.push(tempTinggi);
        score.push(tempScore);
      }

      $('.chart-view').removeClass('d-none');
      const ctxLine = document.getElementById('myLineChart').getContext('2d');
      const myLineChart = new Chart(ctxLine, {
        type: 'line',
        data: {
          labels: ['Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
          datasets: [{
              label: 'Berat Badan (Kg)',
              data: berat,
              fill: false,
              tension: 0.1,
              borderColor: '#d92550',
              backgroundColor: '#d92550',
              borderWidth: 1
            }, {
              label: 'Tinggi Badan',
              data: tinggi,
              fill: false,
              tension: 0.1,
              borderColor: '#3ac47d',
              backgroundColor: '#3ac47d',
              borderWidth: 1
            },
            {
              label: 'Z-Score',
              data: score,
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
    });
  });
</script>