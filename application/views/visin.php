<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Visin Google Charts</title>
<link rel="stylesheet" href="<?php echo base_url('vendor/uikit/css/'); ?>uikit.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // Mengambil API visualisasi.
    google.charts.load('current', {'packages':['corechart']});
    google.charts.load('current', {'packages':['table']});
    google.charts.load('current', {'packages':['gauge']});
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawTable);
    google.charts.setOnLoadCallback(drawNos);
    google.charts.setOnLoadCallback(drawVisualization);

    function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Nama');
        data.addColumn('string', 'Nim');
        data.addColumn('string', 'Jurusan');
        data.addRows([
          ['Muhammad Alrizki', '1800016139', 'Sistem Informasi'],
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, fontSize:100,width: '100%', height: '100%'});
      }

      function drawNos() {

var data = google.visualization.arrayToDataTable([
  ['Label', 'Realisasi Luas Tanam, Luas Panen, produksi dan Produktifitas Komoditi Jagung di Kota Jambi di Kota Jambi Tahun 2018 '],
  ['Total Luas Panen', 86],
  ['Total Produksi', 310.23],
  ['Total Produktivitas', 3.62]
]);

var options = {
  width: 400, height: 120,
  redFrom: 90, redTo: 100,
  yellowFrom:75, yellowTo: 90,
  minorTicks: 5
};

var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

chart.draw(data, options);

setInterval(function() {
  data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
  chart.draw(data, options);
}, 13000);
setInterval(function() {
  data.setValue(1, 1, 40 + Math.round(60 * Math.random()));
  chart.draw(data, options);
}, 5000);
setInterval(function() {
  data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
  chart.draw(data, options);
}, 26000);
}

function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['JENIS', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Juni', 'Juli', 'Agus', 'Sept', 'Okt', 'Nov', 'Des'],
          ['Produksi sendiri',   113,   198,   162,   401,   294,   185,    123,    106,    118,    526,   213,   126],
          ['Stock Bulog',   4253,  5832,  3893,  5190,  4340,  4714,   4394,   4396,   5123,   4921,  5546,  5062],
          ['Gudang Distributor',   1672,  2884,  1269,  3062,  2379,  2631,   1783,   1155,   2057,   3745,  2549,  3120],
          ['PUPM',   9,     9.2,   9.22,  9.4,   7.6,   6.3,    6.2,    5.1,    4.85,   9.2,   9.5,   9.3]
        ]);

        var options = {
          title : 'Ketersediaan Beras',
          vAxis: {title: 'Tons'},
          hAxis: {title: 'Ketersediaan Stock'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('combo_div'));
        chart.draw(data, options);
      }
    //mengambil data dari variabel PHP
    var region=[];
    region['dataStr'] = '<?php echo $region;?>';        
    region['dataArray'] = JSON.parse(region['dataStr']);  
    
    //menggambar grafik
    google.charts.setOnLoadCallback(function(){
        drawChart(region['dataArray'], 'pie','region');       
    });

    // Menentukan data yang akan ditampilkan
    function drawChart(dataArray,type,container) {
        // Membuat data tabel yang sesuai dengan format google chart dari sumber data array javascript
        var data = new google.visualization.arrayToDataTable(dataArray,false);      
        // Tentukan pengaturan chart
        var options = {
            legend:'bottom',            
            titlePosition:'none',
            titleTextStyle:{fontSize:18},
            chartArea:{width:'80%',height:'70%'}                      
            };
        if(type == 'pie')
        {
            var chart = new google.visualization.PieChart(document.getElementById(container));
        }
        if(type == 'column')
        {
            var chart = new google.visualization.ColumnChart(document.getElementById(container));
        }
        if(type == 'bar')
        {
            var chart = new google.visualization.BarChart(document.getElementById(container));
        }
        chart.draw(data, options);
    }
</script>
</head>
<body>
<nav class="uk-navbar-container uk-margin" uk-navbar>
    <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo" href="#">Analisis hasil Bumi di Kota Jambi</a>
    </div>
</nav>
<div class="uk-container">
    <div class="uk-child-width-1-2@s" uk-grid uk-height-match="target: > div > .uk-card">    
        <div>
            <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                <h3 class="uk-card-title">Biodata</h3>
                <div id="table_div" style="height:350px;"></div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                <h3 class="uk-card-title">Realisasi Luas Tanam, Luas Panen, produksi dan Produktifitas Komoditi Jagung di Kota Jambi di Kota Jambi Tahun 2018 </h3>
                <div id="chart_div" style="height:350px;"></div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                <h3 class="uk-card-title">Produksi Perikanan di Kota Jambi Tahun 2018 </h3>
                <div id="region" style="height:350px;"></div>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-small uk-card-body" >
                <h3 class="uk-card-title">Kondisi Ketersediaan Beras di Kota Jambi selama Keadaan Tahun 2018</h3>
                <div id="combo_div" style="height:350px;"></div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url('vendor/uikit/js/'); ?>uikit.js"></script>
</body>
</html>