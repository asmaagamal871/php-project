<?php

// session_start();
include __DIR__ . '/../partials/header.php';
// require_once("../../controllers/articleController.php");

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     create();
// }

// $result = index();

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
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>

                      <?php
                      if (isset($articles)) {
                        foreach ($articles as $article) { ?>
                          <tr>
                            <td>
                              <?= $article['title'] ?>
                            </td>
                            <td>
                              <?= $article['summary'] ?>
                            </td>
                            <td>
                              <?= $article['publish_date'] ?>
                            </td>
                            <td>
                              <?= $article['description'] ?>
                            </td>
                            <td>
                              <?= $article['user_id'] ?>
                            </td>
                            <td><img src="/images/articles/<?= $article['image'] ?>" style="width: 30px; height: 30px"></td>

                            <td>
                              <div class="d-flex">
                                <a class='me-3 text-dark' href='/articles/<?php echo $article["id"]; ?>'><i class='fa-solid fa-eye'></i></a>
                                <form method="POST" action="/articles/<?php echo $article["id"]; ?>" class="delForm">
                                  <input type="hidden" name="_method" value="DELETE">

                                  <!-- Button trigger modal -->
                                  <button class="border-0 bg-transparent" type="button" data-bs-toggle="modal" data-bs-target="#delArticles<?php echo $article["id"]; ?>" class="delBtn">
                                    <i class="fa-solid fa-trash text-danger"></i>
                                  </button>

                                  <!-- Modal -->
                                  <div class="modal fade" id="delArticles<?php echo $article["id"]; ?>" tabindex="-1" aria-labelledby="delArticlesLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="delArticlesLabel">
                                            Confirm Deletion</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          Are you sure you want to delete
                                          <?= $article['title']; ?>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                          </tr>

                          </form>
                      <?php
                          echo "</td>";
                          echo "</tr>";
                        }
                      } ?>


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
include __DIR__ . '/../partials/footer.php';
?>

<?php
include __DIR__ . '/../partials/scripts.php';
?>

<script>
  jQuery(document).ready(function($) {
    $('#datatable').DataTable();
  });
</script>