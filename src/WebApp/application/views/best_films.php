<?php
/**
 * Created by PhpStorm.
 * User: Quentin
 * Date: 24/11/2018
 * Time: 16:23
 */
defined('BASEPATH') OR exit('No direct script access allowed');
include('getMovie.php');

?><!DOCTYPE html>
<html>
<head>

	<style>
    .loading {
	  position: fixed;
	  left: 0px;
	  top: 0px;
	  width: 100%;
	  height: 100%;
	  z-index: 9999;
	  background: url('https://web.archive.org/web/20170914202017im_/http://bradsknutson.com/wp-content/uploads/2013/04/page-loader.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
    }

  </style>

	<link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/grayscale.min.css" rel="stylesheet">

	<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/grayscale.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/new_film.js"></script>

	<link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<meta charset="utf-8">
	<title>Meilleurs films - BingeWatcher</title>

	<style type="text/css" media="screen">
		.masthead {
			position: relative;
			width: 100%;
			height: auto;
			min-height: 35rem;
			padding: 15rem 0;
			background-position: center;
			background-repeat: no-repeat;
			background-attachment: scroll;
			background-size: cover;
		}

	</style>


</head>

<body id="page-top">
<div class="loading"></div>
<script> $('.loading').fadeOut(1); </script>


<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
	<div class="container">
		<a class="navbar-brand js-scroll-trigger" href="../.." onclick="$('.loading').fadeIn(1);">Accueil</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			Menu
			<i class="fas fa-bars"></i>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="#filter">Filtre</a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="#class">Classement</a>
				</li>
			</ul>
		</div>
	</div>
</nav>


<header class="masthead">
	<div class="container d-flex h-100 align-items-center">
		<div class="mx-auto text-center">
			<h1 class="mx-auto my-0 text-uppercase">Les meilleurs films</h1>
		</div>
	</div>
</header>

<br/><br/>

<div class="container">

	<div  id="filter" class="row align-items-center no-gutters mb-4 mb-lg-5">
		<div class="featured-text text-center text-lg-left">

			<center><form method="POST" action="best_films" name="formulaire">
				<div class="form-group">
					<!--<input type = submit class="btn btn-primary js-scroll-trigger " href="#projects" value = "Cliquez ici pour générer un film2 aléatoire">-->
					<label for="film">
						<br /><br /><select name="genre" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="genre" style="text-align:center">
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
						<label>Voir les films sortis entre <input type="number" name="min_year" min="1937" max="2018" value="<?php
			if (isset($_POST["min_year"])){echo $_POST["min_year"];} else {echo 1937;}?>"/> et
						<input type="number" name="max_year" min="1938" max="2019" value="<?php
						if (isset($_POST["max_year"])){echo $_POST["max_year"];} else {echo 2019;}?>" /></label>
						<br/><br/>
						<a class="btn btn-primary js-scroll-trigger" href="#projects" onclick="document.formulaire.submit();$('.loading').fadeIn(1);return false;" type="submit">Cliquez ici pour actualiser le classement</a>
					</label>
				</div>
			</form></center>

			<?php
			if (!isset($_POST["genre"]))
			{
				$_POST["genre"]="";
			}
			if (!isset($_POST["min_year"]))
			{
				$_POST["min_year"]="";
			}
			if (!isset($_POST["max_year"]))
			{
				$_POST["max_year"]="";
			}
			$array=getBestMovieArray(($_POST["genre"]),$_POST["min_year"],$_POST["max_year"]);
			?>

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
								echo('<td><br/><a href="fiche_film?id='.$array[$i]['id'].'" onclick="$(\'.loading\').fadeIn(1);"><img class="img-fluid img-thumbnail" width="100%" src="https://image.tmdb.org/t/p/w500/'.$array[$i]['poster_path'].'" alt="affiche du film"> <br/><br/><b><center>'.($i+1).'- '.$array[$i]['title'].'</center></b></a> </td>');
							}
							echo('</tr>');
						}
						?>
					</tr
					</tbody>
				</table>
				<table class="table borderless">
					<tbody>
					<tr>
						<br/>
						<?php
						for($k=1; $k<4 ; $k++)
						{
							for ($i = (0+5*$k); $i <  min(5+5*$k,count($array)); $i++) {
								echo('<tr>');
								echo('<td><a href="fiche_film?id='.$array[$i]['id'].'" onclick="$(\'.loading\').fadeIn(1);"> <b><center>'.($i + 1).'- '.$array[$i]['title'].'</center></b></a></td>');
								echo('</tr>');
							}
						}
						?>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<br/>


	<!-- Footer -->
	<footer class="bg-white small text-center text-black-50">
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


</div>
</body>
</html>

