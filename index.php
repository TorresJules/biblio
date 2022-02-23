<!doctype html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- slick CSS -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

  <!--CSS BOOTSTRAP et PERSO-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet">

  <title>Bibliothèque</title>
</head>

<body>
  <header id="header" style="background-image:url('img/headerNew.jpg'); height:100vh;">

    <!-- navbar -->
    <?php 
        include('include/navbar.php');
    ?>

    <!-- titre header -->
    <div class="position-absolute top-50 start-50 translate-middle text-center titreHead d-flex flex-column justify-content-center">
      <div>
        <p class="text-uppercase mb-0">bibliothèque</p>
        <p class="mt-0">de la ville</p>
        <p class="quoteHead">"Books, books, books ..."</p>
      </div>
    </div>

  </header>

  <div class="bordure"></div>
  <section id="alaUne" class="mx-auto mt-5">
    <div class="container px-4">
      <div class="row g-3">
        <div class="col-2 bg-info rounded my-3 d-flex justify-content-center">
          <p class="titre text-uppercase m-auto">à la une :</p>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-4">
          <div class="tile  rounded overflow-hidden">
            <img src="https://bibliotheque.bordeaux.fr/in/rest/public/Attachment/attach_cmsUpload_1d09e8dd-d088-4e14-a9f3-416892a64019" class="contain newImg">
            <p class="fw-bold">Prix des lecteurs - Escale du livre 2022</p>
            <p>Participez au vote !</p>
            <p>Plusieurs rendez-vous en janvier-février</p>
          </div>
        </div>
        <div class="col-4">
          <div class="tile  rounded overflow-hidden">
            <img src="https://bibliotheque.bordeaux.fr/in/rest/public/Attachment/attach_cmsUpload_9e8b255d-7ab0-4efb-897d-beb9cf9e339d" class="contain newImg">
            <p class="fw-bold">La Nuit de la Lecture</p>
            <p>6ème édition</p>
            <p>Samedi 22 janvier | Mériadeck</p>
          </div>
        </div>
        <div class="col-4">
          <div class="tile  rounded overflow-hidden">
            <img src="https://bibliotheque.bordeaux.fr/in/rest/public/Attachment/attach_cmsUpload_9e77f53a-d723-4ead-818f-cc956d91eb64" class="contain newImg">
            <p class="fw-bold">Le paysage dans la peinture</p>
            <p>Conférence</p>
            <p>Mardi 25 janvier | Pierre Veilletet</p>
          </div>
        </div>
      </div>
      <div class="row g-3">
        <div class="col-10"></div>
        <div class="col-2">
        <button type="button" class="btn btn-outline-info">Tout voir</button>
        </div>
      </div>
    </div>

  </section>

  <!-- FOOTER -->
  <?php
    include("include/footer.php")
    ?>

  <!-- slick -->
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!--Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>