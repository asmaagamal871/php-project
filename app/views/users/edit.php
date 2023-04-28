<?php
include __DIR__ . '/../partials/header.php';
?>
<!-- /top navigation -->
<link rel="stylesheet" href="/css/groupsForm.css">
<!-- page content -->
<div class="right_col" role="main">
    <div class="container row">
        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger"><center>' . $_SESSION['error'] . '</center></div>';
        }
        unset($_SESSION['error']);
        ?>
        <div class="col-8 offset-2">
            <form action="/users/<?php echo $result[0]["id"]; ?>" method="post">
                <input type="hidden" name="_method" value="PUT">
                <div class="w-50 px-5  mx-auto form-container col-12" id="makeMaxWidth"> <!-- Edited in CSS -->
                    <h2 class="fw-bold text-dark text-center fs-4">Update</h2>
                    <?php
                    if (isset($update)) {
                        if (!$update) {
                            echo `<div class="alert alert-danger text-center fs-6" role="alert" id="myAlert">Group isn't Edited</div>`;
                        }
                    }
                    ?>

                    <label for="exampleInputPassword1" class="form-label mt-2 fw-bold">Name</label>
                    <div class="input-group mb-3">
                        <input type="text" maxlength="20" name="name" class="form-control" id="exampleInputUser1" value="<?php echo $result[0]["name"]; ?>" required>
                    </div>

                    <label for="exampleInputPassword2" class="form-label mt-2 fw-bold">Email</label>
                    <div class="input-group mb-3">
                        <input type="text" name="email" class="form-control" id="email" value="<?php echo $result[0]["email"]; ?>" required>
                    </div>

                    <label for="exampleInputPassword2" class="form-label mt-2 fw-bold">Phone</label>
                    <div class="input-group mb-3">
                        <input type="tel" name="phone" class="form-control" id="phone" value="<?php echo $result[0]["phone"]; ?>" required>
                    </div>

                    <label for="exampleInputPassword2" class="form-label mt-2 fw-bold">Username</label>
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" id="exampleInputUser1" value="<?php echo $result[0]["username"]; ?>" required>
                    </div>

                    <label for="exampleInputPassword2" class="form-label mt-2 fw-bold">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" autocomplete="off" name="password" class="form-control" id="exampleInputUser1" value="<?php echo $result[0]["password"]; ?>" required>
                    </div>

                    <label for="exampleInputPassword2" class="form-label mt-2 fw-bold">Group</label>
                    <div class="input-group mb-3">
                        <select name="group_id" id="group_id" class="form-control">
                            <?php
                            $dbHandler = new MySQLHandler('groups');
                            $groups = $dbHandler->get_all();
                            foreach ($groups as $group) {
                                echo '<option value="' . $group['id'] . '">' . $group['name'] . '</option>';
                            }
                            ?>
                        </select><br>
                    </div>
                    <button type="submit" class="offset-4 px-4 btn btn-outline-dark">Update</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /page content -->

<!-- footer content -->

<?php
include __DIR__ . '/../partials/footer.php';
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="../../vendors/validator/multifield.js"></script>
<script src="../../vendors/validator/validator.js"></script>


<?php
include __DIR__ . '/../partials/scripts.php';
?>