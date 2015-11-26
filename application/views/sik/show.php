
<!-- Info boxes -->
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-ambulance"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Jumlah Puskesmas</span>
        <span class="info-box-number"><?php echo $j_puskesmas ;?> Puskesmas</span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-blue"><i class="fa fa-bank"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Jumlah Ruangan </span>
        <span class="info-box-number"><?php foreach ($j_ruangan as $row) { 
        echo number_format($row->jml);  
        }?> Ruangan</span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix visible-sm-block"></div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Nilai Aset</span>
        <span class="info-box-number">Rp. <?php foreach ($j_asset as $row) { 
        echo number_format($row->nilai,2);  
        }?></span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-archive"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Jumlah Aset</span>
        <span class="info-box-number">
        <?php foreach ($j_asset as $row) { 
        echo number_format($row->jml);  
        }?>
        Barang</span>
      </div><!-- /.info-box-content -->
    </div><!-- /.info-box -->
  </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
  <div class="col-md-8">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Kondisi Aset per Puskesmas </h3>
          <select name="bar_tipe" id="type" class="form-control" style="width:25%;float:right;margin-top:30px">
            <option value="jml" >Jumlah Aset</option>
            <option value="nilai">Nilai Aset</option>
          </select>
          <br>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div><!-- /.box-header -->
        <div class="box-body">
        <div class="row" id="row_dim">
          <div class="chart">
            <canvas id="barChart" height="240" width="511" style="width: 511px; height: 240px;"></canvas>
          </div>
        </div>
        <div class="row" id="row_dim2" >
          <div class="chart">
            <canvas id="barChart1" height="240" width="511" style="width: 511px; height: 240px;"></canvas>
          </div>
        </div>
          <div class="bux"></div><label>Baik</label><br>
          <div class="bux1"></div><label>Rusak Ringan</label><br>
          <div class="bux2"></div><label>Rusak Berat</label>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
  <div class="col-md-4">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Nilai Aset per Puskesmas </h3>        
          <select name="pie_tioe" id="type1" class="form-control" style="width:40%;float:right;margin-top:10px">
            <option value="jml" >Jumlah Aset </option>
            <option value="nilai" >Nilai Aset</option>
          </select>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div><!-- /.box-header -->
        <div class="box-body">
        <div class="row" id="row1">
          <div class="chart">
            <canvas id="pieChart" height="240" width="511" style="width: 511px; height: 240px;"></canvas>
          </div>
        </div>
        <div class="row" id="row2">
          <div class="chart">
            <canvas id="pieChart1" height="240" width="511" style="width: 511px; height: 240px;"></canvas>
          </div>
        </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- /.row -->


<!-- <script src="<?php  base_url()?>public/themes/disbun/dist/js/pages/dashboard2.js" type="text/javascript"></script> -->
<script>
  $(function () { 
    $("#menu_dashboard").addClass("active");
    $("#menu_dashboard_home").addClass("active");
  });
</script>
    <script>
      $(function () {
        var areaChartData = {
          labels: [<?php
           foreach ($datapuskesmas as $row ) {
            echo "\"".str_replace(array("KEC. ","KEL. "),"", $row->value)."\",";}
            ?>],
          datasets: [
            {
              label: "Baik",
              fillColor: "#20ad3a",
              strokeColor: "#20ad3a",
              pointColor: "#20ad3a",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [<?php foreach ($j_barang_baik as $row) { 
                echo "\"".$row->jml."\",";  }
              ?>]
            },
            {
              label: "Kurang Baik",
              fillColor: "#ffb400",
              strokeColor: "#ffb400",
              pointColor: "#ffb400",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [<?php foreach ($j_barang_rr as $row) { echo "\"".$row->jml."\",";  }?>]
            },
            {
              label: "Rusak Berat",
              fillColor: "#e02a11",
              strokeColor: "#e02a11",
              pointColor: "#e02a11",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [<?php foreach ($j_barang_rb as $row)  { echo "\"".$row->jml."\",";  }?>]
            }
          ]
        };

        var areaChartOptions = {
          //Boolean - If we should show the scale at all
          showScale: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: false,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - Whether the line is curved between points
          bezierCurve: true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension: 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot: false,
          //Number - Radius of each point dot in pixels
          pointDotRadius: 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth: 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius: 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke: true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth: 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true
        };
  

        var areaChartData1 = {
          labels: [<?php
           foreach ($datapuskesmas as $row ) {
            echo "\"".str_replace(array("KEC. ","KEL. "),"", $row->value)."\",";}
            ?>],
          datasets: [
            {
              label: "Baik",
              fillColor: "#20ad3a",
              strokeColor: "#20ad3a",
              pointColor: "#20ad3a",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [<?php foreach ($j_barang_baik1 as $row) { 
                echo "\"".$row->nilai."\",";  }
              ?>]
            },
            {
              label: "Kurang Baik",
              fillColor: "#ffb400",
              strokeColor: "#ffb400",
              pointColor: "#ffb400",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [<?php foreach ($j_barang_rr1 as $row) { echo "\"".$row->nilai."\",";  }?>]
            },
            {
              label: "Rusak Berat",
              fillColor: "#e02a11",
              strokeColor: "#e02a11",
              pointColor: "#e02a11",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [<?php foreach ($j_barang_rb1 as $row)  { echo "\"".$row->nilai."\",";  }?>]
            }
          ]
        };

        var areaChartOptions1 = {
          //Boolean - If we should show the scale at all
          showScale: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: false,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - Whether the line is curved between points
          bezierCurve: true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension: 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot: false,
          //Number - Radius of each point dot in pixels
          pointDotRadius: 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth: 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius: 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke: true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth: 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true
        };


        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
          
            <?php foreach ($nilai_aset as $row ) {
              echo "
            {
            value: $row->jml,
            color: \"#00a65a\",
            highlight: \"#00a65a\",
            label: \"".$row->value."\"
            },";
            }
            ?>
          
        ];
        var pieOptions = {
          //Boolean - Whether we should show a stroke on each segment
          segmentShowStroke: true,
          //String - The colour of each segment stroke
          segmentStrokeColor: "#fff",
          //Number - The width of each segment stroke
          segmentStrokeWidth: 2,
          //Number - The percentage of the chart that we cut out of the middle
          percentageInnerCutout: 50, // This is 0 for Pie charts
          //Number - Amount of animation steps
          animationSteps: 100,
          //String - Animation easing effect
          animationEasing: "easeOutBounce",
          //Boolean - Whether we animate the rotation of the Doughnut
          animateRotate: true,
          //Boolean - Whether we animate scaling the Doughnut from the centre
          animateScale: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true,
          // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: false,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);

        var pieChartCanvas1 = $("#pieChart1").get(0).getContext("2d");
        var pieChart1 = new Chart(pieChartCanvas1);
        var PieData1 = [
          
            <?php foreach ($nilai_aset1 as $row ) {
              echo "
            {
            value: $row->nilai,
            color: \"#aaff00\",
            highlight: \"#aaff00\",
            label: \"".$row->value."\"
            },";
            }
            ?>
          
        ];
        var pieOptions1 = {
          //Boolean - Whether we should show a stroke on each segment
          segmentShowStroke: true,
          //String - The colour of each segment stroke
          segmentStrokeColor: "#fff",
          //Number - The width of each segment stroke
          segmentStrokeWidth: 2,
          //Number - The percentage of the chart that we cut out of the middle
          percentageInnerCutout: 50, // This is 0 for Pie charts
          //Number - Amount of animation steps
          animationSteps: 100,
          //String - Animation easing effect
          animationEasing: "easeOutBounce",
          //Boolean - Whether we animate the rotation of the Doughnut
          animateRotate: true,
          //Boolean - Whether we animate scaling the Doughnut from the centre
          animateScale: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true,
          // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: false,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart1.Doughnut(PieData1, pieOptions1);

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = areaChartData;
        var barChartOptions = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - If there is a stroke on each bar
          barShowStroke: true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth: 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing: 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing: 1,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to make the chart responsive
          responsive: true,
          maintainAspectRatio: false
        };


        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);

        var barChartCanvas1 = $("#barChart1").get(0).getContext("2d");
        var barChart1 = new Chart(barChartCanvas1);
        var barChartData1 = areaChartData1;
        var barChartOptions1 = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - If there is a stroke on each bar
          barShowStroke: true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth: 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing: 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing: 1,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to make the chart responsive
          responsive: true,
          maintainAspectRatio: false
        };


        barChartOptions1.datasetFill = false;
        barChart1.Bar(barChartData1, barChartOptions1);

      
      });
    </script>
    <style type="text/css">

      .bux{
        width: 10px;
        padding: 10px; 
        margin-right: 40%;
        background-color: #20ad3a;
        margin: 0;
        float: left;
      }
      .bux1{
        width: 10px;
        padding: 10px;
        background-color: #ffb400;
        margin: 0;
        float: left;
      }
      .bux2{
        width: 10px;
        padding: 10px;
        background-color: #e02a11;
        margin: 0;
        float: left;
      }
    </style>

    <script>
    $(function() {
      $('#row_dim2').hide(); 
      $('#type').change(function(){
        if($(this).val() == 'jml') {
          $('#row_dim').show(); 
          $('#row_dim2').hide(); 
        } else {
          $('#row_dim').hide(); 
          $('#row_dim2').show(); 
        } 

      });

      
  });
</script>
<script>
    $(function() {
      $('#row2').hide(); 
      $('#type1').change(function(){
        if($(this).val() == 'jml') {
          $('#row1').show(); 
          $('#row2').hide(); 
        } else {
          $('#row1').hide(); 
          $('#row2').show(); 
        } 

      });

      
  });
</script>
  