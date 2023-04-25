<?php

// if not logged in, Redirect the user to the login page
if (!isset($_SESSION['user_id'])) {
  header('Location: /login');
  exit;
}

include __DIR__ . '/partials/header.php';

// retrieve data for chart1
$db = new MySQLHandler("users");
$rows = $db->group_vs_user();

// Create arrays of labels and data values for the chart
$labels = [];
$data = [];
foreach ($rows as $row) {
  $labels[] = $row['group_name'];
  $data[] = $row['user_count'];
}

// Create a JSON object that represents the data for the chart
$dataObject = [
  'labels' => $labels,
  'datasets' => [
    [
      'label' => 'Number of Users',
      'data' => $data,
      'backgroundColor' => [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      'borderColor' => [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      'borderWidth' => 1,
      'barThickness' => 80,
    ]
  ]
];

?>

<!-- chart -->
<script src="node_modules/chart.js/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Admins! <small>Below are some useful analysis</small></h3><br>
      </div>

      <!-- <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div> -->
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Group vs Number of Users</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                    class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Settings 1</a>
                  <a class="dropdown-item" href="#">Settings 2</a>
                </div>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li> -->
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

                  <!-- chart1 -->
                  <canvas width="70%" height="25vh" id="myChart"></canvas>

                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="x_panel">
          <div class="x_title">
            <h2>User vs Number of Articles</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <!-- chart2 -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Create a script that initializes the chart with the data -->
<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    type: 'bar',
    data: <?php echo json_encode($dataObject); ?>,
    options: {
      scales: {
        y: {
          beginAtZero: true,
          min: 0,
          max: 10,
          ticks: {
            // forces step size to be 50 units
            stepSize: 1
          }
        }
      }
    }
  });
</script>


<?php
include __DIR__ . '/partials/footer.php';
?>

<?php
include __DIR__ . '/partials/scripts.php';
?>