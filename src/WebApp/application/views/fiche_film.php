<?php
/**
 * Created by PhpStorm.
 * User: Quentin
 * Date: 27/10/2018
 */
defined('BASEPATH') OR exit('No direct script access allowed');
include('getMovie.php');
$id=$_GET['id'];
$MovieArray=getMovieArray($id);
$CastArray=getMovieCastArray($id);
$RecommendationArray=getMovieRecommendationArray($id);
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
	<title><?php echo($MovieArray['title'])?> - BingeWatcher</title>

	<style type="text/css" media="screen">
		.masthead {
			position: relative;
			width: 100%;
			height: auto;
			min-height: 35rem;
			padding: 15rem 0;
			background: -webkit-gradient(linear, left top, left bottom, from(rgba(22, 22, 22, 0.1)), color-stop(75%, rgba(22, 22, 22, 0.5)), to(#161616)), url("https://image.tmdb.org/t/p/w500/<?php echo(getMovieArray(297762)['backdrop_path'])?>");
			background: linear-gradient(to bottom, rgba(22, 22, 22, 0.1) 0%, rgba(22, 22, 22, 0.5) 75%, #161616 100%), url("https://image.tmdb.org/t/p/w500/<?php echo($MovieArray['backdrop_path'])?>");
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
					<a class="nav-link js-scroll-trigger" href="#resume">Résumé et Informations</a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="#cast">Casting</a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="#trailer">Trailer</a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="#recommendations">Recommandations</a>
				</li>
			</ul>
		</div>
	</div>
</nav>


	<header class="masthead">
		<div class="container d-flex h-100 align-items-center">
			<div class="mx-auto text-center">
				<h1 class="mx-auto my-0 text-uppercase"><?php echo($MovieArray['title'])?></h1>
			</div>
		</div>
	</header>

<br/><br/>

<div class="container">

	<!-- Featured Project Row -->
	<div id="resume" class="row align-items-center no-gutters mb-4 mb-lg-5">
		<div class="col-xl-6 col-lg-6">
			<img class="img-fluid mb-3 mb-lg-0" src="https://image.tmdb.org/t/p/w500/<?php echo($MovieArray['poster_path'])?>" alt="affiche du film">
		</div>
		<div class="col-xl-6 col-lg-6">
			<div class="featured-text text-center text-lg-left">
				<p class="text-black-50 mb-0"><?php echo($MovieArray['overview'])?></p>
			</div>
			<br/><br/>
			<div class="table-responsive">
				<table class="table borderless">
					<tbody>
					<tr>
						<td style="text-align: right;">Genre :</td>
						<td>
							<?php foreach($MovieArray['genres'] as $tab)
							{
								echo($tab['name'].' / ');
							}
							?>
						</td>
					</tr>
					<tr>
						<td style="text-align: right;">De :</td>
						<td>
							<?php foreach($CastArray['crew'] as $tab)
							{
								if($tab['job']=="Director")
								{
									echo($tab['name'].' / ');
								}
							}
							?>
						</td>
					</tr>
					<tr>
						<td style="text-align: right;">Ecrit par :</td>
						<td>
							<?php foreach($CastArray['crew'] as $tab)
							{
								if($tab['job']=="Story")
								{
									echo($tab['name'].' / ');
								}
							}
							?>
						</td>
					</tr>
					<tr>
						<td style="text-align: right;">Date de sortie :</td>
						<td><?php echo($MovieArray['release_date'])?></td>
					</tr>
					<tr>
						<td style="text-align: right;">Durée :</td>
						<td><?php echo($MovieArray['runtime'])?></td>
					</tr>
					<tr>
						<td style="text-align: right;">Budget :</td>
						<td><?php echo($MovieArray['budget'])?></td>
					</tr>
					<tr>
						<td style="text-align: right;">Box-Office :</td>
						<td><?php echo($MovieArray['revenue'])?></td>
					</tr>
					<tr>
						<td style="text-align: right;">Nationalité :</td>
						<td>
							<?php foreach($MovieArray['production_countries'] as $tab)
							{
								echo($tab['name'].' / ');
							}
							?>
						</td>
					</tr>
					<tr>
						<td style="text-align: right;">Langue originale :</td>
						<td><?php echo($MovieArray['original_language'])?></td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<br/>

	<div id="cast" class="row align-items-center no-gutters mb-4 mb-lg-5">
		<div class="featured-text text-center text-lg-left">
			<h3>Casting</h3>

			<div>
				<table class="table borderless">
					<tbody>
					<tr>
						<?php
						for($k=0; $k<1; $k++)
						{
							echo('<tr>');
							for ($i = (0+5*$k); $i < (5+5*$k); $i++) {
								echo('<td><a href="https://www.google.com/search?q='.str_replace(' ', '+', $CastArray['cast'][$i]['name']).'"><img class="img-fluid img-thumbnail" width="100%" src="https://image.tmdb.org/t/p/w500/'.$CastArray['cast'][$i]['profile_path'].'" alt="photo de l\'acteur/actrice"> <br/>'.$CastArray['cast'][$i]['name'].'<br/><p class="text-black-50 mb-0">'.$CastArray['cast'][$i]['character'].'</p></a></td>');
							}
							echo('</tr>');
						}
						?>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<br/>
	<div id="trailer" class="row align-items-center no-gutters mb-4 mb-lg-5">
		<div class="featured-text text-center text-lg-left">
		<h3>Trailer</h3>
		</div>
	</div>
	<div class="row align-items-center no-gutters mb-4 mb-lg-5">
		<div class="col-xl-2 col-lg-2">
		</div>
		<div class="col-xl-8 col-lg-8">
			<center><iframe width="100%" height="350" src="https://www.youtube.com/embed/<?php echo(getMovieVideoArray($id)['results']['0']['key'])?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></center>
		</div>
		<div class="col-xl-2 col-lg-2">
		</div>
	</div>


	<div id="recommendations" class="row align-items-center no-gutters mb-4 mb-lg-5">
		<div class="featured-text text-center text-lg-left">
			<h3>Si vous aimez ce film vous aimerez aussi :</h3>

			<div>
				<table class="table borderless">
					<tbody>
					 	<tr>
							<?php
							{
								for ($i = 0; $i < 5; $i++) {
									echo('<td><a href="fiche_film?id='.$RecommendationArray['results'][$i]['id'].'" onclick="$(\'.loading\').fadeIn(1);"> <img class="img-fluid img-thumbnail"  width="100%" src="https://image.tmdb.org/t/p/w500/'.$RecommendationArray['results'][$i]['poster_path'].'" alt="photo du film"> </a> <br/><center>'.$RecommendationArray['results'][$i]['title'].'</center>');
								}
							}
							?>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

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

