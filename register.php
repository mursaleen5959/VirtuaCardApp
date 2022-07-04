<?php
// Check user login
session_start();
if(isset($_SESSION['user_login']))
{
    echo"<script>window.location.href='dashboard.php';</script>";
}
else{
    //echo"<script>window.location.href='login.php';</script>";
}

function check_license($lcns)
{
  //$lcns = 'VC7LDJ-IFLA-V45B-MK7I';
  //$lcns = 'VC7LDJ-IFLA-V45B-MK74';
  //         XXXXXX-XXXX-XXXX-XXXX
  $lmfwcConsumerKey = 'ck_c9a4428be305a650601c04ab0ceff0fbc70d6729';
  $lmfwcConsumerSecret = 'cs_545ab898ebcd1b08a13cf4823e20dcb8d0953768';
  //validate license key
  $curl = curl_init();
  curl_setopt_array($curl, array(
      CURLOPT_URL => "https://www.virtuacard.shop/wp-json/lmfwc/v2/licenses/validate/".$lcns."?consumer_key=".$lmfwcConsumerKey."&consumer_secret=".$lmfwcConsumerSecret,
      CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => false,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      ));
      $response = curl_exec($curl);
      $err = curl_error($curl);
      $result = json_decode($response, true);
      curl_close($curl);
      if (array_key_exists("success",$result) && $result['success']=='true')
      {
        //echo "License Valid";
        return true;
      }
      elseif(array_key_exists("code",$result) && $result['code']=="lmfwc_rest_data_error")
      {
        //echo "Error! License Invalid";
        return false;
      }
      else{
        //echo "Unknown ERROR";
        return false;
      }

      //$json_string = json_encode($result, JSON_PRETTY_PRINT);
      //echo "<pre>".$json_string."<pre/>";

      //  Sample Success Response
      // {
      //   "success": true,
      //   "data": {
      //       "timesActivated": 0,
      //       "timesActivatedMax": 1,
      //       "remainingActivations": 1
      //   }
      // }
      // Sample Error Response
      // {
      //   "code": "lmfwc_rest_data_error",
      //   "message": "License Key: VC7LDJ-IFLA-V45B-MK74 could not be found.",
      //   "data": {
      //       "status": 404
      //   }
      // }
}

require_once("includes/db.php");

if(isset($_POST['register']))
{
  $email = $_POST['email'];
  $pass  = $_POST['pass'];
  $cpass = $_POST['cpass'];
  $lcns  = $_POST['license'];
  $license_type = substr($lcns, 0, 2);
 
  if($email!='' && $pass!='' && $cpass!='' && $lcns!='' && $pass==$cpass)
  {
    $sql = $conn->prepare("SELECT COUNT(*) AS `total` FROM `users` WHERE email = :email or license = :license");
    $sql->execute(array(':email' => $email,':license'=>$lcns));
    $result = $sql->fetchObject();
    if ($result->total > 0)
    {
      $err_message = "User already exists";
    }
    else
    {
      $response = check_license($lcns);
      if($response == true)
      {
          $sql = "INSERT INTO `users`(`email`, `password`, `license`, `license_type`) VALUES ('$email','$pass','$lcns','$license_type')";
          $conn->exec($sql);
          echo "<script>window.location.replace('login.php') </script>";
      }
      elseif($response == false)
      {
        $err_message = "Invalid License Key Provided, Please provide valid license key";
      }
    }
  }
  else
  {
    $err_message = "Please fill out all the fields.";
    if($pass!=$cpass)
    {
      $err_message = "Please make sure Password and Confirm Password are same.";
    }
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
            ?>
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                <form class="mx-1 mx-md-4" action="" method="POST">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form-email" class="form-control" placeholder="Your Email" name="email" required/>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form-pass" class="form-control" placeholder="Password" name="pass" required/>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form-cpass" class="form-control" placeholder="Repeat your password" name="cpass" required/>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-id-card fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form-license" class="form-control" placeholder="License Key" name="license" required/>
                    </div>
                  </div>
                  <!-- <div class="d-flex gap-2 justify-content-center mx-4 mb-3 mb-lg-4"> -->
                  <div class="d-grid form-outline flex-fill" style="margin-left:2.6rem!important">
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                  </div>
                </form>
              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="sources/images/draw1.webp" class="img-fluid" alt="Sample image">
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