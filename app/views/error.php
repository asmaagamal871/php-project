<?php
include __DIR__ . '/partials/header.php';
?>
<!-- /top navigation -->
<link rel="stylesheet" href="/css/error.css">
<!-- page content -->
<div class="right_col test" role="main">
    <div class="container row">
        <div class="col-8 offset-2">
            <div class="mt-5 mb-5 px-5  mx-auto form-container col-12 " id="makeMaxWidth"> <!-- Edited in CSS -->
                <h2 class="fw-bold text-dark text-center  fs-4">
                    Error 404
                </h2>

                </br>
                <img src="/images/error.png" alt="404 error" class="error" />
                <div class="d-flex justify-content-center">
                    <a href="/" class=" btn backBtn "><i class="fa-sharp fa-solid fa-arrow-left bt-5"></i>
                        Back</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /page content -->

<!-- footer content -->

<?php
include __DIR__ . '/partials/footer.php';
?>

<?php
include __DIR__ . '/partials/scripts.php';
?>