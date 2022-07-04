<?php
session_start();
if(isset($_SESSION['user_login']))
{
  //echo"<h1>Welcome to profile</h1>";
}
else
{
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

    <title>VCF Builder</title>
</head>
<body>

<?php include_once("includes/d_nav.php");?>

<div class="container-fluid">
  <div class="row">
    <?php include_once("includes/sidebar.php");?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="container mt-2">
      <img src="sources/images/Logo_Long.webp" alt="" width="200px">
        <!-- <h1 class="h2">VCF Builder</h1> -->
        <hr>
        <div class="row">
          <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
            <form id="booking-form" action="vcard/builder.php" method="post" class="form-stacked" enctype="multipart/form-data">
                <h2 class="form-page-head">Créez votre fiche contact</h2>
                <div class="form-group form-input">
                  <label for="nom" class="form-label">Nom</label>
                  <input type="text" name="nom" id="nom" value="" class="form-control" required/>
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
                  <label for="phonepro" class="form-label">Téléphone professionnel</label>
                    <input type="phonepro"
                            name="phonepro"
                            id="phonepro"
                            type="text"
                            class="form-control"
                            value="" required/>
                </div> 
  
                <div class="form-group form-input">
                  <label for="phoneperso" class="form-label">Téléphone personnel</label>
                    <input type="phoneperso"
                            name="phoneperso"
                            id="phoneperso"
                            type="text"
                            class="form-control"
                            value="" required/>
                </div>    
  
                <div class="form-group form-input">
                  <label for="mail" class="form-label">Mail</label>
                    <input type="mail"
                            name="mail"
                            id="mail"
                            type="text"
                            class="form-control"
                            value="" required/>
                </div>    
  
                <div class="form-group form-input">
                  <label for="web" class="form-label">Site web</label>
                    <input type="web"
                            name="web"
                            id="web"
                            type="text"
                            class="form-control"
                            value="" required/>
                </div>
                <div class="form-group form-input">
                  <label for="rue" class="form-label">Rue</label>
                    <input type="rue"
                            name="rue"
                            id="rue"
                            type="text"
                            class="form-control"
                            value="" required/>
                </div>
                <div class="form-group form-input">
                  <label for="ville" class="form-label">Ville</label>
                    <input type="ville"
                            name="ville"
                            id="ville"
                            type="text"
                            class="form-control"
                            value="" required/>
                </div>
                <div class="form-group form-input">
                  <label for="codepostal" class="form-label">Code postal</label>
                    <input type="codepostal"
                            name="codepostal"
                            id="codepostal"
                            type="text"
                            class="form-control"
                            value="" required/>
                </div>
                <div class="form-group form-input">
                  <label for="pays" class="form-label">Pays</label>
                    <input type="pays"
                            name="pays"
                            id="pays"
                            type="text"
                            class="form-control"
                            value="" required/>
                </div>
                <div class="form-group form-input">
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                      <br>
                    <input type="file" name="file" class="form-control">
                    <br>
                </div>
                <button type="submit" class="btn btn-primary mt-2 mb-5" refname="submit">C'est parti</button>
                    </form>
            </form>
          </div>
          <div class="col-md-10 col-lg-6 col-xl-7 order-1 order-lg-2">
            <img src="sources/images/form1.jpg" class="img-fluid fix-img" alt="Form Filling" width="500">
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
</body>
</html>