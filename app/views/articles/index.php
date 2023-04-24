<?php
include("../partials/header.php");
require_once("../../controllers/articleController.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  create();
}

$result = index();
?>




<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Articles</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>List of<small>Articles</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Settings 1</a>
                  <a class="dropdown-item" href="#">Settings 2</a>
                </div>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">

                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Summary</th>
                        <th>Publish Date</th>
                        <th>Description</th>
                        <th>User Id</th>
                        <th>Image</th>
                      </tr>
                    </thead>


                    <tbody>
                      <?php for ($i = 0; $i < sizeof($result); $i++) { ?>
                        <tr>
                          <td><?= $result[$i]['title'] ?></td>
                          <td><?= $result[$i]['summary'] ?></td>
                          <td><?= $result[$i]['publish_date'] ?></td>
                          <td><?= $result[$i]['description'] ?></td>
                          <td><?= $result[$i]['user_id'] ?></td>
                          <td><img src="./../../public/images/articles/<?= $result[$i]['image'] ?>" style="width: 30px; height: 30px"></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include("../partials/footer.php");
?>

<?php
include("../partials/scripts.php");
?>