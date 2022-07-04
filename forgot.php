<?php
function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}
// Check user login
session_start();
if(isset($_SESSION['user_login']))
{
    echo"<script>window.location.href='dashboard.php';</script>";
}
else{
    //echo"<script>window.location.href='login.php';</script>";
}
require_once("includes/db.php");
if(isset($_POST['forgotPass']))
{
  $email = $_POST['email'];
  if($email!='')
  {
    $sql = $conn->prepare("SELECT COUNT(*) AS `total` FROM `users` WHERE email = :email");
    $sql->execute(array(':email' => $email));
    $result = $sql->fetchObject();
    if ($result->total > 0)
    {
      $pass = generateRandomString();

      $data = [
        'email' => $email,
        'password' => $pass
      ];
      $sql = "UPDATE users SET password=:password WHERE email=:email";
      $stmt= $conn->prepare($sql);
      $stmt->execute($data);

      $to = $email;
      $subject = "Password Recovery for VirtuaCard";
      $txt = "Your New Password is :".$pass;
      $headers = "From: recovery@virtuacard.app";

      if(mail($to,$subject,$txt,$headers))
      {
        $suc_message = "Email sent. Please check your email";
      }
      else 
      {
        $err_message = "Some error occured. Please try again later.";
      }
    }
    else
    {
      $err_message = "Some error occured. Please enter correct e-mail address";
    }
  }
  else
  {
    $err_message = "Please fill out E-mail field.";
  }
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
            if(isset($suc_message))
            {
            ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong></strong> <?=$suc_message;?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php
            }
            ?>
              <div class="col-md-10 col-lg-6 col-xl-6 order-2 order-lg-1">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Forgot Password</p>
                <form class="mx-1 mx-md-4" action="" method="POST">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form-email" class="form-control" placeholder="Account Email" name="email" required/>
                    </div>
                  </div>
                  <!-- <div class="d-flex gap-2 justify-content-center mx-4 mb-3 mb-lg-4"> -->
                  <div class="d-grid form-outline flex-fill" style="margin-left:2.6rem!important">
                    <button type="submit" name="forgotPass" class="btn btn-primary">Send Mail</button>
                  </div>
                </form>
              </div>
              <div class="col-md-10 col-lg-6 col-xl-6 d-flex align-items-center order-1 order-lg-2">
                <img src="sources/images/forgot.jpg" class="img-fluid" alt="Sample image" width="400">
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