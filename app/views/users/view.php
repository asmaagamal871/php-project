<?php
include("../partials/header.php");
require 'dbcon.php';
?>
<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">

    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>User View Details
                    <a href="index.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <?php
                if (isset($_GET['id'])) {
                    $user_id = mysqli_real_escape_string($con, $_GET['id']);
                    $query = "SELECT * FROM users WHERE id='$user_id'";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        $user = mysqli_fetch_array($query_run);
                ?>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <p class="form-control">
                                    <?= $user['name'] ?>
                                </p>
                            </div>
                        </div>
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Username<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <p class="form-control">
                                    <?= $user['username'] ?>
                                </p>
                            </div>
                        </div>

                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">email<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <p class="form-control">
                                    <?= $user['email'] ?>
                                </p>
                            </div>
                        </div>

                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Phone<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <p class="form-control">
                                    <?= $user['phone'] ?>
                                </p>
                            </div>
                        </div>

                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Group<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6">
                                <p class="form-control">
                                    <?= $user['group_id'] ?>
                                </p>
                            </div>
                        </div>
            </div>
    <?php
                    } else {
                        echo "<h4>No Such Id Found</h4>";
                    }
                }
    ?>
        </div>
    </div>
</div>
</div>
<!-- </div> -->
</div>
<!-- </div> -->
<!-- /page content -->

<!-- footer content -->

<?php
include("../partials/footer.php");
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
<?php
include("../partials/scripts.php");
?>