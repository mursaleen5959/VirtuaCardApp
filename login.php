<?php
session_start();
if(isset($_SESSION['user_login']))
{
    echo"<script>window.location.href='dashboard.php';</script>";
}
else{
    //echo"<script>window.location.href='login.php';</script>";
}


include('includes/db.php');
require_once("sources/captcha_keys.php");
if(isset($_POST['g-recaptcha-response']))
{
    $captcha    =   $_POST['g-recaptcha-response'];
    $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha);
    $response   =   json_decode($verifyResponse);
    //echo "Im here to print it out";
    if($response->success)
    {
        $email=$_POST['email'];
        $password=$_POST['password'];

        $sql = $conn->prepare("SELECT COUNT(*) AS `total` FROM `users` WHERE email = :email");
        $sql->execute(array(':email' => $email));
        $result = $sql->fetchObject();
        if ($result->total > 0)
        {
          $sql = "SELECT * from users WHERE email='$email' AND `password`='$password'";
          $result=$conn->query($sql);
          while($row = $result->fetch())
          {
              $_SESSION['user_login']      = true;
              $_SESSION['user_id']         = $row['id'];
              $_SESSION['license_type']    = $row['license_type'];
              echo"<script>window.location.href='dashboard.php';</script>";
          }
          $err_message = "Invalid Username or Password";
        }
        else
        {
              $err_message = "User does not exist. Please Sign up before logging in.";
        }
    }
}
else{
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    <title>Document</title>
</head>
<body>

<?php include_once("includes/navbar.inc.php");?>

<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
            <?php
            if(isset($err_message))
            {
            ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error !</strong> <?=$err_message;?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php
            }
            ?>
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>
                <form class="mx-1 mx-md-4" method="POST" action="">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" name="email" id="form-email" class="form-control" placeholder="Your Email"/>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" name="password" id="form-pass" class="form-control" placeholder="Password"/>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                    <div class="g-recaptcha" data-sitekey="<?=$siteKey?>"></div>
                    </div>
                  </div>
                  <!-- <div class="d-flex gap-2 justify-content-center mx-4 mb-3 mb-lg-4"> -->
                  <div class="d-grid form-outline flex-fill" style="margin-left:2.6rem!important">
                    <button type="submit" class="btn btn-primary" name="submit">Login</button>
                  </div>
                  <div class="">
                    <a href="forgot.php" class="btn btn-link mt-2">Forgot Password?</a>
                  </div>
                </form>
              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="sources/images/authentication.svg" class="img-fluid" alt="Sample image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>
</html>