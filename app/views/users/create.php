<?php
include __DIR__ . '/../partials/header.php';
?>
<!-- /top navigation -->
<link rel="stylesheet" href="/css/groupsForm.css">
<!-- page content -->
<div class="right_col" role="main">
    <div class="container row">
        <div class="col-8 offset-2">
            <form action="/users" method="post">
                <div class="w-50 px-5  mx-auto form-container col-12" id="makeMaxWidth"> <!-- Edited in CSS -->
                    <h2 class="fw-bold text-dark text-center fs-4">Create</h2>
                    <?php
                    if (isset($create)) {
                        if (!$create) {
                            echo `<div class="alert alert-danger text-center fs-6" role="alert" id="myAlert">Group isn't Created</div>`;
                        }
                    }
                    ?>
                    <label for="exampleInputPassword1" class="form-label mt-2 fw-bold">Name</label>
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" id="exampleInputUser1" required>
                    </div>

                    <label for="exampleInputPassword2" class="form-label mt-2 fw-bold">Email</label>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" id="exampleInputUser1" required>
                    </div>

                    <label for="exampleInputPassword2" class="form-label mt-2 fw-bold">Phone</label>
                    <div class="input-group mb-3">
                        <input type="text" name="phone" class="form-control" id="exampleInputUser1" required>
                    </div>

                    <label for="exampleInputPassword2" class="form-label mt-2 fw-bold">Username</label>
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" id="exampleInputUser1" required>
                    </div>

                    <label for="exampleInputPassword2" class="form-label mt-2 fw-bold">Password</label>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" id="exampleInputUser1" required>
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

                    <button type="submit" class="offset-4 px-4 btn btn-outline-dark">Create</button>
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

<!-- Javascript functions	-->
<script>
    function hideshow() {
        var password = document.getElementById("password1");
        var slash = document.getElementById("slash");
        var eye = document.getElementById("eye");

        if (password.type === 'password') {
            password.type = "text";
            slash.style.display = "block";
            eye.style.display = "none";
        } else {
            password.type = "password";
            slash.style.display = "none";
            eye.style.display = "block";
        }
    }
</script>

<script>
    // initialize a validator instance from the "FormValidator" constructor.
    // A "<form>" element is optionally passed as an argument, but is not a must
    var validator = new FormValidator({
        "events": ['blur', 'input', 'change']
    }, document.forms[0]);
    // on form "submit" event
    document.forms[0].onsubmit = function(e) {
        var submit = true,
            validatorResult = validator.checkAll(this);
        console.log(validatorResult);
        return !!validatorResult.valid;
    };
    // on form "reset" event
    document.forms[0].onreset = function(e) {
        validator.reset();
    };
    // stuff related ONLY for this demo page:
    $('.toggleValidationTooltips').change(function() {
        validator.settings.alerts = !this.checked;
        if (this.checked)
            $('form .alert').remove();
    }).prop('checked', false);
</script>

<script>
    var alert = document.getElementById("myAlert");

    alert.style.display = "block";

    setTimeout(function() {
        alert.style.display = "none";
    }, 1500);
</script>
<?php
include __DIR__ . '/../partials/scripts.php';
?>