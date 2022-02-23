<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS et PERSO -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">

    <title>Contact</title>
  </head>
  <body>
  <header id="header" style="background-image:url('img/headerNew.jpg'); height:100vh;">

    <!-- navbar -->
    <?php 
        include('include/navbar.php');
    ?>

    <!-- map -->
    
      <div class="w-50 m-auto p-5" id="boxMap">
        <h1 style="color:white">Comment venir ?</h1>
        <div class="m-100 d-flex justify-content-center">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2894.82535387945!2d-1.5154113846393396!3d43.48511497912742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd51401ae6ca84bb%3A0x598e542803c83963!2sBiblioth%C3%A8que%20municipale%20d&#39;Anglet!5e0!3m2!1sfr!2sde!4v1642853995614!5m2!1sfr!2sde" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </div>
    

    <!-- FORMULAIRE DE CONTACT -->
    <form id="contact" class="w-50 p-5 m-auto">
      <h1 style="color:white">Nous contacter</h1>
  <div class="form-group">
    <label for="exampleFormControlInput1">Adresse e-mail</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Nom</label>
    <input type="text" class="form-control" placeholder="Votre nom">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Prénom</label>
    <input type="text" class="form-control" placeholder="Votre prénom">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Écrivez ici votre message" rows="3"></textarea>
  </div>
</form>

  </header>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>