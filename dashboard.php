<?php
session_start();
if(isset($_SESSION['user_login']))
{
    //echo"<h1>Welcome to profile</h1>";
}
else{
    echo"<script>window.location.href='login.php';</script>";
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

    <link rel="stylesheet" href="sources/css/dashboard.css">
    <title>Dashboard</title>
</head>
<body>

<?php include_once("includes/d_nav.php");?>

<div class="container-fluid">
  <div class="row">
    <?php include_once("includes/sidebar.php");?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="pt-3 pb-2 mb-3">
      <img src="sources/images/Logo_Long.webp" alt="" width="200px">
      <hr>
      <div class="row">
        <div class="col-sm-4">
          <a href="walletbuilder.php" class="d-card-a">
              <div class="d-card pt-5">
                <h4 class="d-card-head  ps-3 pe-3 pb-1 text-center">Créer ou Modifier votre VirtuaCard Digitale </h4>
                <div class="text-center">
                  <img src="sources/images/VirtuaCard Digitale.png" class="img-fluid pb-2" alt="" width="150px">
                </div>
            </div>
          </a>
        </div>
        <div class="col-sm-4">
          <a href="vcfbuilder.php" class="d-card-a">
              <div class="d-card pt-5">
                <div class="text-center">
                  <h4 class="d-card-head ps-3 pe-3 pb-1">Créer ou Modifier votre Fiche Contact </h4>
                  <img src="sources/images/Fiche Contact.png" class="img-fluid pb-2" alt="" width="150px">
                </div>
            </div>
          </a>
        </div>
        <div class="col-sm-4">
          <a href="page3.php" class="d-card-a">
              <div class="d-card pt-5">
                <div class="text-center">
                  <h4 class="d-card-head ps-3 pe-3 pb-4">Imprimer ou Réimprimer Votre VirtuaCard </h4>
                  <img src="sources/images/NFC Card.png" class="img-fluid pb-4" alt="" width="250px">
                </div>
            </div>
          </a>
        </div>
      </div>

      </div>
    </main>
  </div>
</div>
</body>
</html>