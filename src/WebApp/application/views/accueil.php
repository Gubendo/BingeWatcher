<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
<link rel="icon" href="<?php echo base_url(); ?>assets/img/godfather.png">
  <style>
    .loading {
	  position: fixed;
	  left: 0px;
	  top: 0px;
	  width: 100%;
	  height: 100%;
	  z-index: 9999;
	  background: url('https://web.archive.org/web/20170914202017im_/http://bradsknutson.com/wp-content/uploads/2013/04/page-loader.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: 0.8;
    }

  </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/grayscale.min.css" rel="stylesheet">
    
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/grayscale.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/new_film.js"></script>

    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


	<meta charset="utf-8">
	<title>BingeWatcher</title>
</head>
<body id="page-top">
<div class="loading"></div>
<script> $('.loading').fadeOut(100); </script>


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Accueil</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php/welcome/best_films" onclick="$('.loading').fadeIn(1);">Meilleurs Films</a>
            </li>
              <?php
              $this->load->library('session');
              if(isset($_SESSION['username'])){
                  echo('<li class="nav-item">');
                  echo('<a class="nav-link js-scroll-trigger" href="index.php/User/deconnexion">Déconnexion</a>');
                  echo('</li>');
              }
              else {
                  echo('<li class="nav-item">');
                  echo('<a class="nav-link js-scroll-trigger" href="index.php/User/connexion">Connexion</a>');
                  echo('</li>');
              }
              ?>
              <?php
              $this->load->library('session');
              if(isset($_SESSION['username'])){
                  echo('<li class="nav-item">');
                  echo('<a class="nav-link js-scroll-trigger" href="index.php/User/compte">Compte</a>');
                  echo('</li>');
              }
              ?>
              <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="index.php/User/inscription">Inscription </a>
              </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <?php include('getMovie.php') ?>
    <header class="masthead">
      <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
          <h1 class="mx-auto my-0 text-uppercase">BingeWatcher</h1>
          <h2 class="text-white-50 mx-auto mt-2 mb-5">Découvrez des films, sans aucune limite</h2>
          <form method="POST" action="." name="formulaire">
			  <div class="form-group">
			        <!--<input type = submit class="btn btn-primary js-scroll-trigger " href="#projects" value = "Cliquez ici pour générer un film2 aléatoire">-->
                   <label for="film"><a class="btn btn-primary js-scroll-trigger" href="#projects" onclick="document.formulaire.submit();return false;" type="submit">Cliquez ici pour générer un film aléatoire</a>
            <br /><br /><br /><select name="genre" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="genre" style="text-align:center">
            <option value="">Tous les genres</option>
            <option value=18>Action</option>
            <option value=12>Aventure</option>
            <option value=35>Comédie</option>
            <option value=18>Drame</option>
            <option value=27>Horreur</option>
            <option value=9648>Mystère</option>
            <option value=878>Science-Fiction</option>
            </select>
            <br/>

				    </label>
              </div>
          </form>
        </div>
      </div>
    </header>

    <!-- Projects Section -->
    <section id="projects" class="projects-section bg-light">
      <div class="container">
        <!-- Featured Project Row -->
        <div class="row align-items-center no-gutters mb-4 mb-lg-5">
          <div class="col-xl-4 col-lg-7">

            <?php 
            if (isset($_POST["genre"]))
			{
              $rand=getRandomMovieWithGenre($_POST["genre"]);
            }
            else
            {
              $rand=getRandomMovieWithGenre("");
            }
            ?>

            <img class="img-fluid mb-3 mb-lg-0" src="https://image.tmdb.org/t/p/w500/<?php echo($rand['poster_path'])?>" width=375 height=563 alt="">
          </div>
          <div class="col-xl-8 col-lg-5">
            <div class="featured-text text-center text-lg-left">
              <h4 style="text-align:left"><?php echo($rand['title'])?>  <span style="float:right;"><a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-height="1000" data-width="1000" data-text= "J'ai découvert &quot;<?php echo($rand['title']) ?>&quot; avec @BingeWatcher_FR !" data-url="http://bingewatcher.com/id=<?php echo($rand['id'])?>" data-hashtags="BingeWatcher" data-lang="fr" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></span></h4>
              <p class="text-black-50 mb-0"><?php echo($rand['overview'])?></p>
              <br/>
        <a class="btn btn-primary" href="index.php/welcome/fiche_film?id=<?php echo($rand['id'])?>" onclick="$('.loading').fadeIn(1);"  >Voir la fiche du film</a>
        <a class="btn btn-primary text-white" onclick='window.location.reload(false)'>Nouveau film</a>
    
            </div>
          </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>

		  <div class="container d-flex h-100 align-items-center">
			  <div class="mx-auto text-center">
				  <h3>Rechercher un film</h3>
				  <br/>
				  <form method="POST" action="." >
					  <div class="form-group">
						  <input width=33 type="text" name="research" />
						  <br/><br/>
						  <input class="btn btn-primary text-white" type="submit" name="bouton" onclick="$('.loading').fadeIn(1);" value="Rechercher">
						  <br/><br/>
					  </div>
				  </form>
			  </div>
		  </div>
	  <br/><br/>
		  <br/>
		  <?php
            if (isset($_POST["research"]))
			{ echo "<h3> Resultat de votre recherche </h3>" ;
				$array=getResearchMovieArray(str_replace(" ","%20",$_POST["research"]))?>
		  <div id="class">
				<table class="table borderless">
					<tbody>
					<tr>
						<br/>
						<?php
						for($k=0; $k<1; $k++)
						{
							echo('<tr>');
							for ($i = (0+5*$k); $i < min(5+5*$k,count($array)); $i++) {
								echo('<td><br/><a href="index.php/welcome/fiche_film?id='.$array[$i]['id'].'" onclick="$(\'.loading\').fadeIn(1);"><img class="img-fluid img-thumbnail" width="100%" src="https://image.tmdb.org/t/p/w500/'.$array[$i]['poster_path'].'" alt="affiche du film"> <br/><br/><b><center>'.($i+1).'- '.$array[$i]['title'].'</center></b></a> </td>');
							}
							echo('</tr>');
						}
						?>
					</tr>
					</tbody>
				</table>
			  <?php } ?>

        <!-- Project Two Row -->
        <div class="row justify-content-center no-gutters">

        </div>

        <!-- Project Three Row -->
        <div class="row justify-content-center no-gutters mb-5 mb-lg-0">

        </div>
        <a href="https://twitter.com/BingeWatcher_FR?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-size="large" data-lang="fr" data-show-count="false">Follow @BingeWatcher_FR</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        <a class="twitter-timeline" data-lang="fr" data-height="1000" data-theme="dark" href="https://twitter.com/BingeWatcher_FR?ref_src=twsrc%5Etfw">Tweets by BingeWatcher_FR</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        
      </div>
	  </div>
    </section>


    <!-- Contact Section -->
    <section class="contact-section bg-black">
      <div class="container">

        <div class="row">

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <h4 class="text-uppercase m-0">Adresse</h4>
                <hr class="my-4">
                <div class="small text-black-50">1 Square de la Résistance,91000 Évry</div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <h4 class="text-uppercase m-0">Email</h4>
                <hr class="my-4">
                <div class="small text-black-50">
                  <a href="#">contact@bingewatcher.com</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <h4 class="text-uppercase m-0">Téléphone</h4>
                <hr class="my-4">
                <div class="small text-black-50">06 77 38 99 48 </div>
              </div>
            </div>
          </div>
        </div>

        <div class="social d-flex justify-content-center">
          <a href="#" class="mx-2">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="mx-2">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="mx-2">
            <i class="fab fa-github"></i>
          </a>
        </div>

      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50">
      <div class="container">
        Copyright &copy; La team Zer Aka Pichet Hansen Gub Pruneau Barnum & Source (le sang de la veine cette équipe)
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url(); ?>assets/js/grayscale.min.js"></script>

  </body>
</html>
