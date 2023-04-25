<?php
session_start();
include __DIR__ . '/../partials/header.php';
// include("../partials/header.php");
// require_once("../../controllers/UserController.php");

?>
<div class="right_col" role="main">
  <?php include('message.php'); ?>
  <div class="page-title">
    <div class="title_left">
      <h3>Users Details</h3>
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
    <div class="title_left">
      <a href="create.php" class="btn btn-primary float-end ">Add Users</a>
    </div>
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
        <div class="x_title">
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                    // $query = "SELECT * FROM users";
                    // $query_run = mysqli_query($con, $query);

                    // if (mysqli_num_rows($query_run) > 0) {
                    //   foreach ($query_run as $user) {
                    foreach ($users as $user) {
                    ?>
                      <tr>
                        <td><?= $user['id']; ?>
                        </td>
                        <td><?= $user['name']; ?>
                        </td>
                        <td><?= $user['email']; ?>
                        </td>
                        <td><?= $user['phone']; ?>
                        </td>
                        <td>
                          <?= $user['username']; ?>
                        </td>
                        <td>
                          <?= $user['group_id']; ?>
                        </td>
                        <td class="d-inline-flex p-2">
                          <a href="view.php?id=<?= $user['id']; ?>" class=" btn btn-info btn-sm">View</a>
                          <a href="edit.php?id=<?= $user['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                          <form action="code.php" method="POST">
                            <button type="submit" name="delete_user" value="<?= $user['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                          </form>
                        </td>
                      </tr>
                    <?php } ?>
                    <!-- // } else {
                    // echo "<h5> No Records Found</h5>";
                    // }
                    ?> -->
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