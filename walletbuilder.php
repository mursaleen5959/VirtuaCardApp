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
    <title>Wallet Builder</title>
</head>
<body>

<?php include_once("includes/d_nav.php");?>

<div class="container-fluid">
  <div class="row">
    <?php include_once("includes/sidebar.php");?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="container mt-2">
      <img src="sources/images/Logo_Long.webp" alt="" width="200px">
        <!-- <h1 class="h2">Wallet Builder</h1> -->
        <hr>
        <div class="row">
          <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
            <form id="booking-form" action="index.php" method="post" class="form-stacked" enctype="multipart/form-data">
                        <h2 class="form-page-head">Créez votre VirtuaCard</h2>
                        <div class="form-group form-input">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom" id="nom" value="" required/>
                        </div>
                        <div class="form-group form-input">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="prenom" name="prenom" id="prenom" value="" class="form-control" required />
                        </div>
                        <div class="form-group form-input">
                          <label for="fonction" class="form-label">Fonction</label>
                            <input type="fonction"
                                   name="fonction"
                                   id="fonction"
                                   type="text"
                                   class="form-control"
                                   value="" required/>
                        </div>
                        <div class="form-group form-input">
                          <label for="entreprise" class="form-label">Entreprise</label>
                            <input type="entreprise"
                                   name="entreprise"
                                   id="entreprise"
                                   type="text"
                                   class="form-control"
                                   value="" required/>
                        </div>
                        <div class="form-group form-input">
                          <label for="foregroundColor" class="form-label">Couleur de la police</label>
                            <input type="color"
                                   name="foregroundColor"
                                   id="foregroundColor"
                                   class="form-control form-control-color"
                                   value="" required/>
                        </div>
                        <div class="form-group form-input">
                          <label for="labelColor" class="form-label">Couleur de titre</label>
                            <input type="color"
                                   name="labelColor"
                                   id="labelColor"
                                   class="form-control form-control-color"
                                   value="" required/>
                        </div>
                        <div class="form-group form-input">
                          <label for="backgroundColor" class="form-label">Couleur de fond</label>
                            <input type="color"
                                   name="backgroundColor"
                                   id="backgroundColor"
                                   class="form-control form-control-color"
                                   value="" required/>
                        </div>       
                        <div class="form-group form-input mt-2">
                        <form action="upload.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="file" class="form-control">
                            </div>
                            <div class="form-group form-input mt-2 mb-2">
                                <select name="logocouleur" class="form-select">
                                    <option value="" disabled selected>Logo VirtuaCard</option>
                                    <option value="./logoblanc/logo@2x.png">Logo Blanc</option>
                                    <option value="./logonoir/logo@2x.png">Logo Noir</option>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-warning text-white mb-2">UPLOAD</button>
                        </form>
                        <div class="form-submit mb-5">
                            <input type="submit" class="btn btn-primary" value="Créez votre pass &gt;"/>
                            <a href="#" class="btn btn-link vertify-booking">Profitez de votre VirtuaCard</a>
                        </div>
                    </form>
          </div>
          <div class="col-md-10 col-lg-6 col-xl-7 order-1 order-lg-2">
            <img src="sources/images/form2.jpg" class="img-fluid fix-img" alt="Form Filling" width="500">
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
</body>
</html>