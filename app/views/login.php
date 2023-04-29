<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Admin Panel | login</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

  <!-- Font Awesome -->
  <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="../../vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="/css/custom.css" rel="stylesheet">

  <link rel="icon" type="image/x-icon" href="images/ball.ico">
</head>

<body class="login">
  <div>
    <?php
    if (isset($_SESSION['error'])) {
      echo '<div class="alert alert-danger"><center>' . $_SESSION['error'] . '</center></div>';
    }
    unset($_SESSION['error']);
    ?>
    <div class="login_wrapper shadow-lg">
      <section class="login_content">
        <img src="/images/ball.gif" class="logo">

        <form action="/login" method="post" enctype="multipart/form-data">
          <h1>El-La3eeb! </h1>
          <div>
            <input type="email" class="form-control" placeholder="email" name="email" required="" />
          </div>
          <div>
            <input type="password" class="form-control" placeholder="Password" name="password" required="" />
          </div>
          <div class="form-group" id='login_buttons'>
            <label for="remember_me">
              <input type="checkbox" id="remember_me" name="remember_me"> Remember Me
            </label>
            <div>
              <button type="submit" class="btn btn-outline-dark submit">Log in</button>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="separator">


            <div class="clearfix"></div>
            <br />

            <div>
              <h1><img src="/images/football.png" width=40px> El-La3eeb!</h1>
              <p>©2016 All Rights Reserved. El-La3eeb is a football blog. Privacy and Terms</p>
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/212d832ea4.js" crossorigin="anonymous"></script>
</body>

</html>