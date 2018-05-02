<?php 
include 'header.php';
?>
<!--<script src="assets/js/highcharts.js"></script>-->
<script src="https://code.highcharts.com/highcharts.src.js"></script>

<div class="col-md-10">
	<h3></h3>	
</div>
<!-- kalender -->
<div class="pull-right">
	<div id="kalender"></div>
</div>

<div class="panel panel-primary">
     <div class="panel-heading">Data Barang</div>
     <div class="panel-body">
         <div id ="mygraph"></div>
    </div>
</div>

<script>
        var chart; 
        $(document).ready(function() {
              chart = new Highcharts.Chart(
              {
                  
                 chart: {
                    renderTo: 'mygraph',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'Grafik Chart Jumlah Data Barang'
                 },
                 tooltip: {
                    formatter: function() {
                        return '<b>'+
                        this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
                    }
                 },
                 
                
                 plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: 'green',
                            formatter: function() 
                            {
                                return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
                            }
                        }
                    }
                 },
       
                    series: [{
                    type: 'pie',
                    name: 'Browser share',
                    data: [
                    <?php
                        include 'config.php';
                        $query=mysql_query("select nama from barang");
                     
                        while ($row = mysql_fetch_array($query)) {
                            $namabarang = $row['nama'];
                         
                            $data = mysql_fetch_array(mysql_query("SELECT * from barang where nama='$namabarang'"));
                            $jumlah = $data['jumlah'];
                            ?>
                            [ 
                                '<?php echo $namabarang ?>', <?php echo $jumlah; ?>
                            ],
                            <?php
                        }
                        ?>
             
                    ]
                }]
              });
        }); 
    </script>
<?php 
include 'footer.php';

?>