<?php

// if not logged in, Redirect the user to the login page
if (!isset($_SESSION['user_id'])) {
  header('Location: /login');
  exit;
}

include __DIR__ . '/partials/header.php';

// retrieve data for chart
$db = new MySQLHandler("users");
$rows = $db->group_vs_user();
$rows2 = $db->user_vs_article();
// Create arrays of labels and data values for the chart
$labels = [];
$data = [];
foreach ($rows as $row) {
  $labels[] = $row['group_name'];
  $data[] = $row['user_count'];
}
$labels2 = [];
$data2 = [];
foreach ($rows2 as $row) {
  $labels2[] = $row['user_name'];
  $data2[] = $row['article_count'];
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
$dataObject2 = [
  'labels' => $labels2,
  'datasets' => [
    [
      'label' => 'Number of articles',
      'data' => $data2,
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
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
          <h3>Admins! <small>Below are some useful analysis</small> </h3><br>
        <?php } ?>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'editor') { ?>
          <h3>Editors! <small>Below are some useful analysis</small></h3><br>
        <?php } ?>
        <?php if (!isset($_SESSION['role'])) { ?>
          <h3>Hey <?php echo $_SESSION['username']; ?> ! </h3><br>
        <?php } ?>
      </div>

    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
          <div class="x_panel">
            <div class="x_title">
              <h2>Group vs Number of Users</h2>
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
                    <!-- chart1 -->
                    <canvas width="70%" height="25vh" id="myChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>

        <?php if (isset($_SESSION['role'])) {?>
          <?php if ($_SESSION['role'] == 'editor' || $_SESSION['role'] == 'admin') { ?>
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
                      <canvas width="70%" height="25vh" id="myChart2"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        <?php } ?>

        <?php if (!isset($_SESSION['role'])) { ?>
          <div class="x_panel">
            <div class="card-box table-responsive" style="display: flex; justify-content:center;">
              <!-- Gif -->
              <img src="/images/trophy.gif" class="animation shadow" width="300px">
            </div>
          </div>
        <?php } ?>

      </div>

    </div>
  </div>

</div>

<!-- Create a script that initializes the chart with the data -->
<script>
  var ctx = document.getElementById('myChart2').getContext('2d');
  var chart = new Chart(ctx, {
    type: 'bar',
    data: <?php echo json_encode($dataObject2); ?>,
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