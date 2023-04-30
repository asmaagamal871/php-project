<?php

// session_start();
include __DIR__ . '/../partials/header.php';
// require_once("../../controllers/articleController.php");

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     create();
// }

// $result = index();

?>
<div class="right_col test" role="main">
  <div class="">
    <div >
      <div class="title_left">
        <h3  class=" text-center fw-bold my-3">Articles</h3>
        <hr class="mb-4 mt-0 mx-auto newhr" />

      </div>

      
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
        
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
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>

                      <?php
                      if (isset($articles)) {
                        foreach ($articles as $article) {
                          echo "<tr>";
                          echo "<td>" . $article['title'] . "</td>";
                          echo "<td>" . $article['summary'] . "</td>";
                          echo "<td>" . $article['publish_date'] . "</td>";
                           ?>
                          <td><img src="/images/articles/<?= $article['image'] ?>" style="width: 30px; height: 30px"></td> 
                           <?php
                          if ($article['is_deleted']) {
                            echo " <td class='d-flex justify-content-center'><a class='me-3 fs-5' href='/articles/" . $article["id"] . "/restore'><i style='color:#34495E' class='fa fa-history'></i></a></td>";
                          } else {
                      ?>
                            <td>
                              <div class="d-flex">
                                <a class='me-3 fs-5 text-dark' href='/articles/<?php echo $article["id"]; ?>'><i style='color:#34495E' class='fa-solid fa-eye'></i></a>
                                <form method="POST" action="/articles/<?php echo $article["id"]; ?>" class="delForm">
                                  <input type="hidden" name="_method" value="DELETE">

                                  <!-- Button trigger modal -->
                                  <button class="border-0 bg-transparent fs-5" type="button" data-bs-toggle="modal" data-bs-target="#delArticles<?php echo $article["id"]; ?>" class="delBtn">
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
                            // echo "</div>";
                          }
                          echo "</tr>";
                        }
                      }

                        ?>

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