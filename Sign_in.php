<?php
session_start();
include 'conn.php';
$msg = "";
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  if (!empty($email) && !empty($password)) {
    if (login($email, $password)) {
      if ($_SESSION['role'] == "users") {
        header("Location: Request.php");
      } else if ($_SESSION['role'] == "admin") {
        header("Location: admin.php");
      }
    } else {
      $msg = "Invalid email or Password";
    }
  } else {
    $msg = "Please insert valid information";
  }
}

function login($email, $password)
{
  include 'conn.php';
  $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
  $query = mysqli_query($conn, $sql);
  if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    if ($row['is_deleted'] == 1) {
      return false;
    }
    $user_id = $row['id'];
    $email = $row['email'];
    $username = $row['username'];
    if ($row['is_admin'] == 1) {
      $role = "admin";
    } else {
      $role = "users";
    }
    $_SESSION['id'] = $user_id;
    $_SESSION['email'] = $email;
    $_SESSION['role'] = $role;
    $_SESSION['username'] = $username;
    return true;
  }
  return false;
}
?>

<!DOCTYPE html>
<!-- saved from url=(0059)https://codescandy.com/geeks-bootstrap-5/pages/sign-in.html -->
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Required meta tags -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Libs CSS -->
  <link href="./Bootstrap/feather.css" rel="stylesheet">
  <link href="./Bootstrap/bootstrap-icons.css" rel="stylesheet">
  <link href="./Bootstrap/dragula.min.css" rel="stylesheet">
  <link href="./Bootstrap/materialdesignicons.min.css" rel="stylesheet">
  <link href="./Bootstrap/dropzone.css" rel="stylesheet">
  <link href="./Bootstrap/magnific-popup.css" rel="stylesheet">
  <link href="./Bootstrap/bootstrap-select.min.css" rel="stylesheet">
  <link href="./Bootstrap/tagify.css" rel="stylesheet">
  <link href="./Bootstrap/tiny-slider.css" rel="stylesheet">
  <link href="./Bootstrap/tippy.css" rel="stylesheet">
  <link href="./Bootstrap/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="./Bootstrap/prism-okaidia.min.css" rel="stylesheet">
  <link href="./Bootstrap/simplebar.min.css" rel="stylesheet">
  <link href="./Bootstrap/nouislider.min.css" rel="stylesheet">
  <link href="./Bootstrap/glightbox.min.css" rel="stylesheet">
  <!-- Theme CSS -->
  <link rel="stylesheet" href="./Bootstrap/theme.min.css">
  <title>EAC Online Module</title>
</head>

<body data-new-gr-c-s-check-loaded="14.1087.0" data-gr-ext-installed="">
  <!-- Page content -->

  <div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0 min-vh-100">

      <div class="col-lg-5 col-md-8 py-8 py-xl-0">
        <!-- Card -->
        <div class="card shadow ">
          <!-- Card body -->
          <div class="card-body p-6">
            <div class="mb-4">
            <?php if (isset($msg) && $msg !== "") : ?>
                <div class="alert alert-danger">
                  <h5> <i class="icon fas fa-ban"></i> <?php echo $msg; ?></h5>
                </div>
              <?php endif ?>
              <a href="index.php"></a>
              <h1 class="mb-1 fw-bold">Sign in</h1>
              <span>Don’t have an account? <a href="Sign_up.php" class="ms-1">Sign up</a></span>
            </div>
            <!-- Form -->
            <form method="POST">
              <!-- email -->
              <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="Email address here" required="">
              </div>
              <!-- Password -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="**************" required="">
              </div>
              <!-- Checkbox -->
              <div class="d-lg-flex justify-content-between align-items-center mb-4">
                <div>
                  <a href="./forgot.php">Forgot your
                    password?</a>
                </div>
              </div>
              <div>
                <!-- Button -->
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary " name="submit">Sign in</button>
                </div>
              </div>
              <hr class="my-4">
              <div class="mt-4 text-center">
                <!--Facebook-->
                <!-- <a href="https://codescandy.com/geeks-bootstrap-5/pages/sign-in.html#" class="btn-social btn-social-outline btn-facebook">
                  <i class="mdi mdi-facebook fs-4"></i>
                </a> -->
                <!--Twitter-->
                <!-- <a href="https://codescandy.com/geeks-bootstrap-5/pages/sign-in.html#" class="btn-social btn-social-outline btn-twitter">
                  <i class="mdi mdi-twitter fs-4"></i>
                </a> -->
                <!--LinkedIn-->
                <!-- <a href="https://codescandy.com/geeks-bootstrap-5/pages/sign-in.html#" class="btn-social btn-social-outline btn-linkedin">
                  <i class="mdi mdi-linkedin"></i>
                </a> -->
                <!--GitHub-->
                <!-- <a href="https://codescandy.com/geeks-bootstrap-5/pages/sign-in.html#" class="btn-social btn-social-outline btn-github">
                  <i class="mdi mdi-github"></i>
                </a> -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Scripts -->
  <!-- Libs JS -->
  <script src="./Bootstrap/jquery.min.js"></script>
  <script src="./Bootstrap/bootstrap.bundle.min.js"></script>
  <script src="./Bootstrap/odometer.min.js"></script>
  <script src="./Bootstrap/jquery.magnific-popup.min.js"></script>
  <script src="./Bootstrap/bootstrap-select.min.js"></script>
  <script src="./Bootstrap/flatpickr.min.js"></script>
  <script src="./Bootstrap/jquery.inputmask.min.js"></script>
  <script src="./Bootstrap/apexcharts.min.js"></script>
  <script src="./Bootstrap/quill.min.js"></script>
  <script src="./Bootstrap/file-upload-with-preview.iife.js"></script>
  <script src="./Bootstrap/dragula.min.js"></script>
  <script src="./Bootstrap/bs-stepper.min.js"></script>
  <script src="./Bootstrap/dropzone.min.js"></script>
  <script src="./Bootstrap/jQuery.print.js"></script>
  <script src="./Bootstrap/prism.js"></script>
  <script src="./Bootstrap/prism-scss.min.js"></script>
  <script src="./Bootstrap/tagify.min.js"></script>
  <script src="./Bootstrap/tiny-slider.js"></script>
  <script src="./Bootstrap/popper.min.js"></script>
  <script src="./Bootstrap/tippy-bundle.umd.min.js"></script>
  <script src="./Bootstrap/typed.min.js"></script>
  <script src="./Bootstrap/jsvectormap.min.js"></script>
  <script src="./Bootstrap/world.js"></script>
  <script src="./Bootstrap/jquery.dataTables.min.js"></script>
  <script src="./Bootstrap/dataTables.bootstrap5.min.js"></script>
  <script src="./Bootstrap/dataTables.responsive.min.js"></script>
  <script src="./Bootstrap/responsive.bootstrap5.min.js"></script>
  <script src="./Bootstrap/prism-toolbar.min.js"></script>
  <script src="./Bootstrap/prism-copy-to-clipboard.min.js"></script>
  <script src="./Bootstrap/main.min.js"></script>
  <script src="./Bootstrap/lottie-player.js"></script>
  <script src="./Bootstrap/simplebar.min.js"></script>
  <script src="./Bootstrap/nouislider.min.js"></script>
  <script src="./Bootstrap/wNumb.min.js"></script>
  <script src="./Bootstrap/glightbox.min.js"></script>



  <!-- CDN File for moment -->
  <script src="./Bootstrap/moment.min.js"></script>




  <!-- Theme JS -->
  <script src="./Bootstrap/theme.min.js"></script>
</body>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>

</html>