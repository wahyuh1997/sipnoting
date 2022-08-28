<!-- FLOT CHART -->
<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.canvaswrapper.js"></script>
<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.colorhelpers.js"></script>
<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.js"></script>
<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.saturated.js"></script>
<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.browser.js"></script>
<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.drawSeries.js"></script>
<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.uiConstants.js"></script>
<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.time.js"></script>
<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.resize.js"></script>
<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.pie.js"></script>
<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.crosshair.js"></script>
<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.categories.js"></script>
<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.navigate.js"></script>
<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.touchNavigate.js"></script>
<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.hover.js"></script>
<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.touch.js"></script>
<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.selection.js"></script>
<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.symbol.js"></script>
<script src="<?= base_url(); ?>assets/plugins/flot/source/jquery.flot.legend.js"></script>

<script>
  var handleInteractiveChart = function() {
    "use strict";
    $('#interactive-chart').empty();
    $('#interactive-chart2').empty();
    $('#interactive-chart3').empty();

    function showTooltip(x, y, contents) {
      $('<div id="tooltip" class="flot-tooltip">' + contents + '</div>').css({
        top: y - 45,
        left: x - 55
      }).appendTo("body").fadeIn(200);
    }

    if ($('#interactive-chart').length !== 0) {
      var data1 = [];
      var data2 = [];
      var data3 = [];
      $.get('dashboard/get_statistic', function(data) {
        let res = JSON.parse(data);
        for (let i = 1; i <= 12; i++) {
          let res1 = [
            i, res.data.grafik_pendapatan_bulanan.value[i]
          ]
          let res2 = [
            i, res.data.grafik_dishes_selled.value[i]
          ]
          let res3 = [
            i, res.data.grafik_table_used.value[i]
          ]
          data1.push(res1)
          data2.push(res2)
          data3.push(res3)
        }

        var xLabel = [
          [1, 'Januari'],
          [2, 'Februari'],
          [3, 'Maret'],
          [4, 'April'],
          [5, 'Mei'],
          [6, 'Juni'],
          [7, 'Juli'],
          [8, 'Agustus'],
          [9, 'September'],
          [10, 'Oktober'],
          [11, 'November'],
          [12, 'Desember'],
        ];

        $.plot($("#interactive-chart"), [{
          data: data1,
          label: "Total Pendapatan",
          color: app.color.blue,
          lines: {
            show: true,
            fill: false,
            lineWidth: 2
          },
          points: {
            show: true,
            radius: 3,
            fillColor: app.color.componentBg
          },
          shadowSize: 0
        }], {
          xaxis: {
            ticks: xLabel,
            tickDecimals: 0,
            tickColor: 'rgba(' + app.color.darkRgb + ', .2)'
          },
          yaxis: {
            ticks: 10,
            tickColor: 'rgba(' + app.color.darkRgb + ', .2)',
            min: 0,
            max: 1000000
          },
          grid: {
            hoverable: true,
            clickable: true,
            tickColor: 'rgba(' + app.color.darkRgb + ', .2)',
            borderWidth: 1,
            backgroundColor: 'transparent',
            borderColor: 'rgba(' + app.color.darkRgb + ', .2)'
          },
          legend: {
            labelBoxBorderColor: 'rgba(' + app.color.darkRgb + ', .2)',
            margin: 10,
            noColumns: 1,
            show: true
          }
        });

        $.plot($("#interactive-chart2"), [{
          data: data2,
          label: "Total Menu",
          color: app.color.purple,
          lines: {
            show: true,
            fill: false,
            lineWidth: 2
          },
          points: {
            show: true,
            radius: 3,
            fillColor: app.color.componentBg
          },
          shadowSize: 0
        }], {
          xaxis: {
            ticks: xLabel,
            tickDecimals: 0,
            tickColor: 'rgba(' + app.color.darkRgb + ', .2)'
          },
          yaxis: {
            ticks: 10,
            tickColor: 'rgba(' + app.color.darkRgb + ', .2)',
            min: 0,
            max: 1000000
          },
          grid: {
            hoverable: true,
            clickable: true,
            tickColor: 'rgba(' + app.color.darkRgb + ', .2)',
            borderWidth: 1,
            backgroundColor: 'transparent',
            borderColor: 'rgba(' + app.color.darkRgb + ', .2)'
          },
          legend: {
            labelBoxBorderColor: 'rgba(' + app.color.darkRgb + ', .2)',
            margin: 10,
            noColumns: 1,
            show: true
          }
        });

        $.plot($("#interactive-chart3"), [{
          data: data3,
          label: "Total Meja",
          color: app.color.green,
          lines: {
            show: true,
            fill: false,
            lineWidth: 2
          },
          points: {
            show: true,
            radius: 3,
            fillColor: app.color.componentBg
          },
          shadowSize: 0
        }], {
          xaxis: {
            ticks: xLabel,
            tickDecimals: 0,
            tickColor: 'rgba(' + app.color.darkRgb + ', .2)'
          },
          yaxis: {
            ticks: 10,
            tickColor: 'rgba(' + app.color.darkRgb + ', .2)',
            min: 0,
            max: 1000000
          },
          grid: {
            hoverable: true,
            clickable: true,
            tickColor: 'rgba(' + app.color.darkRgb + ', .2)',
            borderWidth: 1,
            backgroundColor: 'transparent',
            borderColor: 'rgba(' + app.color.darkRgb + ', .2)'
          },
          legend: {
            labelBoxBorderColor: 'rgba(' + app.color.darkRgb + ', .2)',
            margin: 10,
            noColumns: 1,
            show: true
          }
        });

        var previousPoint = null;

        $("#interactive-chart").bind("plothover", function(event, pos, item) {
          $("#x").text(pos.x.toFixed(0));
          $("#y").text(pos.y.toFixed(0));
          if (item) {
            if (previousPoint !== item.dataIndex) {
              previousPoint = item.dataIndex;
              $("#tooltip").remove();
              var y = item.datapoint[1].toFixed(0);

              var content = item.series.label + " " + y;
              showTooltip(item.pageX, item.pageY, content);
            }
          } else {
            $("#tooltip").remove();
            previousPoint = null;
          }
          event.preventDefault();
        });

        $("#interactive-chart2").bind("plothover", function(event, pos, item) {
          $("#x").text(pos.x.toFixed(0));
          $("#y").text(pos.y.toFixed(0));
          if (item) {
            if (previousPoint !== item.dataIndex) {
              previousPoint = item.dataIndex;
              $("#tooltip").remove();
              var y = item.datapoint[1].toFixed(0);

              var content = item.series.label + " " + y;
              showTooltip(item.pageX, item.pageY, content);
            }
          } else {
            $("#tooltip").remove();
            previousPoint = null;
          }
          event.preventDefault();
        });

        $("#interactive-chart3").bind("plothover", function(event, pos, item) {
          $("#x").text(pos.x.toFixed(0));
          $("#y").text(pos.y.toFixed(0));
          if (item) {
            if (previousPoint !== item.dataIndex) {
              previousPoint = item.dataIndex;
              $("#tooltip").remove();
              var y = item.datapoint[1].toFixed(0);

              var content = item.series.label + " " + y;
              showTooltip(item.pageX, item.pageY, content);
            }
          } else {
            $("#tooltip").remove();
            previousPoint = null;
          }
          event.preventDefault();
        });

      });

    }
  };

  handleInteractiveChart();
</script>