<?php
include __DIR__ . '/../partials/header.php';
?>
<link rel="stylesheet" href="/css/groupIndex.css">
<div class="right_col" role="main">
  <div class="container">

    <h3 class=" text-center fw-bold my-3">Users</h3>
    <hr class="mb-4 mt-0 mx-auto newhr" />

    <?php
    if (isset($_SESSION['error'])) {
      echo '<div class="alert alert-danger"><center>' . $_SESSION['error'] . '</center></div>';
    }
    unset($_SESSION['error']);
    ?>
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
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Group</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($users)) {
                        foreach ($users as $user) {
                          echo "<tr>";
                          echo "<td>" . $user["id"] . "</td>";
                          echo "<td>" . $user["name"] . "</td>";
                          echo "<td>" . $user["username"] . "</td>";
                          echo "<td>" . $user["email"] . "</td>";
                          echo "<td>" . $user["phone"] . "</td>";
                          echo "<td>" . $user["group_name"] . "</td>";

                          if ($user['is_deleted']) {
                            echo "<td class='d-flex justify-content-center'><a class='me-3 fs-5' href='/users/" . $user["id"] . "/restore'><i style='color:#34495E' class='fa fa-history'></i></a></td>";
                          } else {

                            echo "<td><a class='me-3 text-dark fs-5' href='/users/" . $user["id"] . "'><i  style='color:#34495E' class='fa-solid fa-eye'></i></a>";
                            echo "<a class='me-2 text-primary fs-5' href='/users/" . $user["id"] . "/edit'><i class='fa-solid fa-pen-to-square'></i></a>";
                      ?>
                            <form method="POST" action="/users/<?php echo $user["id"]; ?>" class="delForm">
                              <input type="hidden" name="_method" value="DELETE">


                              <!-- Button trigger modal -->





                              <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $user["id"]; ?>" class="delBtn fs-5">
                                <i class="fa-solid fa-trash text-danger "></i>
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="exampleModal<?php echo $user["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel">
                                        Confirm Deletion</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      Are you sure you want to delete
                                      <?php echo $user["name"]; ?>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </form>
                      <?php
                            echo "</td>";
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