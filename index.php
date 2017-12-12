<!-- Put in document <head> -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory');?>/js/Chart.js-2.5.0/dist/Chart.bundle.js"></script>



<!-- Chart.js Line Graph and Advanced Custom Fields -->


     <div class="bar-chart-wrapper">
        <canvas id="line-graph" width="350" height="175"></canvas>
      </div>


<!-- Feed in line graph with two lines. Custom field must be a repeater, with a sub number field. -->

<script>
  var dataLine = {
      labels: [<?php if( have_rows('first_line_data_points') ): while ( have_rows('first_line_data_points') ) : the_row(); ?>
                      " ",
        <?php endwhile; else : endif; ?>],
      datasets: [{
        fill: false,
        lineTension: 0.1,
        backgroundColor: "#27beb1",
        borderColor: "#27beb1",
        borderCapStyle: 'butt',
        borderDash: [],
        borderDashOffset: 0.0,
        borderJoinStyle: 'miter',
        pointBorderColor: "#27beb1",
        pointBackgroundColor: "#fff",
        pointBorderWidth: 1,
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "#27beb1",
        pointHoverBorderColor: "#27beb1>",
        pointHoverBorderWidth: 2,
        pointRadius: 1,
        pointHitRadius: 10,
        data: [<?php if( have_rows('first_line_data_points') ): while ( have_rows('first_line_data_points') ) : the_row(); ?>
                      <?php the_sub_field('data_point_1'); ?>,
                       <?php endwhile; else : endif; ?>],
        spanGaps: false,
    }, {
        fill: false,
        lineTension: 0.1,
        backgroundColor: "#4d84f1",
        borderColor: "#4d84f1",
        borderCapStyle: 'butt',
        borderDash: [],
        borderDashOffset: 0.0,
        borderJoinStyle: 'miter',
        pointBorderColor: "#4d84f1",
        pointBackgroundColor: "#fff",
        pointBorderWidth: 1,
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "#4d84f1",
        pointHoverBorderColor: "#4d84f1",
        pointHoverBorderWidth: 2,
        pointRadius: 1,
        pointHitRadius: 10,
        data: [<?php if( have_rows('second_line_data_points') ): while ( have_rows('second_line_data_points') ) : the_row(); ?>
                      <?php the_sub_field('data_point_2'); ?>,
                       <?php endwhile; else : endif; ?>],
        spanGaps: false,
    }]
  };

  var ctxLine = document.getElementById("line-graph").getContext('2d');
  var myLineChart = new Chart(ctxLine, {
    type: 'line',
    data: dataLine,
    options: {
        responsive: true,
        scales: {
          xAxes: [{
                      gridLines: {
                          display:false,
                          color: "#ddd"
                      }
                  }],
          yAxes: [{
                      gridLines: {
                          display:false,
                          color: "#ddd"
                      },
                      ticks: {
                          fontColor: "#fff", // this here
                      }
                  }]
          },
          legend: {
              display: false
           },
           tooltips: {
              enabled: false
           }
    }
  });
</script>