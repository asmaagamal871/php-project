<?php
include __DIR__ . '/../partials/header.php';
?>
<!-- /top navigation -->
<link rel="stylesheet" href="/css/groupsForm.css">
<!-- page content -->
<div class="right_col test " role="main">
    <div class="container row ">
    <div class="col-8 offset-2">
        <div class="w-50 px-5  mt-5 mb-5 mx-auto showContainer col-12 " id="makeMaxWidth"> <!-- Edited in CSS -->
                <h2 class="fw-bold text-dark text-center  fs-4 " style='color:#34495E'>  
                    <?php
                        echo  $result[0]["name"]; ?>
                    <br>
                </h2>
            <div class="d-flex flex-row mb-3" >
            <div class="d-flex flex-culomn">
                <div class="profile_pic text-center w-75  me-4 mt-2 " >
					<img src="/images/default.png" alt="..." class="img-circle profile_img text-center">
				</div>
               
                <div class="ms-2 w-100">
                    
                    
                </br>
                <label class="form-label mt-2 fw-bold mt-3">Email : </label>
                <span class="text-dark mb-4 fs-6">
                    <?php echo $result[0]["email"]; ?>
                </span>
            </br>
            <label class="form-label mt-2 fw-bold mt-3">Phone : </label>
            <span class="text-dark mb-4 fs-6">
                        <?php echo $result[0]["phone"]; ?>
                    </span>
                </br>
                
                    
                    <label class="form-label mt-2 fw-bold mt-3 mb-3">Group : </label>
                    <span class="text-dark mb-4 fs-6">
                        <?php echo $result[0]["group_name"]; ?>
                    </span>
                </br>
                <a href="/users" class=" btn backBtn "><i class="fa-sharp fa-solid fa-arrow-left bt-5"></i> Back</a>
            </div>
        </div>
        </div>
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