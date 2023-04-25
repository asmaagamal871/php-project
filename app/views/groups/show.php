<?php
include __DIR__ . '/../partials/header.php';
?>
<!-- /top navigation -->
<link rel="stylesheet" href="/css/groupsForm.css">
<!-- page content -->
<div class="right_col" role="main">
    <div class="container row">
        <div class="col-8 offset-2">
            <h1 class="text-dark text-center">Show</h1>
            <div class="w-50 px-5  mx-auto showContainer col-12" id="makeMaxWidth"> <!-- Edited in CSS -->
                <h5 class="text-center text-dark mb-4">ID :
                    <?php echo $result[0]["id"]; ?>
                </h5>
                <h5 class="text-center text-dark mb-4">Name :
                    <?php echo $result[0]["name"]; ?>
                </h5>
                <h5 class="text-center text-dark">Description</h5>
                <h6 class="text-center text-dark mb-4">
                    <?php echo  $result[0]["description"]; ?>
                </h6>
                <h5 class="text-center text-dark mb-4">Role :
                    <?php echo $result[0]["role"]; ?>
                </h5>
                <a href="/groups" class="offset-4 px-4 btn btn-outline-dark "><i
                        class="fa-sharp fa-solid fa-arrow-left"></i> Back</a>
            </div>
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