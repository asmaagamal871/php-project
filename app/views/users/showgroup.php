<?php
include __DIR__ . '/../partials/header.php';
?>
<link rel="stylesheet" href="/css/groupIndex.css">
<div class="right_col" role="main">
    <div class="container">

        <h3 class="text-dark text-center fw-bold my-3">Users In Same Group </h3>
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
                                                }
                                                echo "</tr>";
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