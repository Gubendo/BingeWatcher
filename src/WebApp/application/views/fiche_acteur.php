<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('getMovie.php');
$id=$_GET['id'];
$ActorArray=getActorArray($id);
$CreditsArray=getCreditsArray($id);
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
	<title><?php echo($ActorArray['name'])?> - BingeWatcher</title>

	<style type="text/css" media="screen">
		.masthead {
			position: relative;
			width: 100%;
			height: 1%;
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
					<a class="nav-link js-scroll-trigger" href="#resume">Biographie et Informations</a>
				</li>
				<li class="nav-item">
					<a class="nav-link js-scroll-trigger" href="#filmographie">Filmographie</a>
				</li>
			</ul>
		</div>
	</div>
</nav>


	<header class="masthead">
		<div class="container d-flex h-100 align-items-center">
			<div class="mx-auto text-center">
				<h1 class="mx-auto my-0 text-uppercase"><?php echo($ActorArray['name'])?></h1>
			</div>
		</div>
	</header>

<br/><br/>

<div class="container">

	<!-- Featured Project Row -->
	<div id="resume" class="row align-items-center no-gutters mb-4 mb-lg-5">
		<div class="col-xl-6 col-lg-6">
			<img class="img-fluid mb-3 mb-lg-0" src="https://image.tmdb.org/t/p/w500/<?php echo($ActorArray['profile_path'])?>" alt="photo de profil">
		</div>
		<div class="col-xl-6 col-lg-6">			
			<div class="table-responsive">
            <h3> Biographie et Informations </h3>
            <br/>
				<table class="table borderless">
					<tbody>
                    <tr>
						<td style="text-align: right;">Sexe :</td>
						<td>
							<?php if ($ActorArray['gender'] == "2") {echo("Homme");} else {echo("Femme");}?>
						</td>
					</tr>
					<tr>
						<td style="text-align: right;">Date de naissance :</td>
						<td>
							<?php echo($ActorArray['birthday'])?>
						</td>
					</tr>
                    <tr>
						<td style="text-align: right;">Lieu de naissance :</td>
						<td>
                            <?php echo($ActorArray['place_of_birth'])?>
						</td>
					</tr>
					<tr>
						<td style="text-align: right;">Date de décès :</td>
						<td>
                            <?php echo($ActorArray['deathday'])?>
						</td>
					</tr>
					<tr>
						<td style="text-align: right;">Popularité :</td>
						<td>
                        <?php echo($ActorArray['popularity'])?>
						</td>
					</tr>
					</tbody>

				</table>
			</div>
            <br/><br/>
            <div class="featured-text text-center text-lg-left">
				<p class="text-black-50 mb-0"><?php echo($ActorArray['biography'])?></p>
			</div>
		</div>
	</div>
	<br/>

	<div id="filmographie" class="row align-items-center no-gutters mb-4 mb-lg-5">
		<div class="featured-text text-center text-lg-left">
			<h3>Filmographie :</h3>

			<div>
				<table class="table borderless">
					<tbody>
					 	<tr>
							<?php
							{
								for ($i = 0; $i < 5; $i++) {
									echo('<td><a href="fiche_film?id='.$CreditsArray['results'][$i]['id'].'" onclick="$(\'.loading\').fadeIn(1);"> <img class="img-fluid img-thumbnail"  width="100%" src="https://image.tmdb.org/t/p/w500/'.$CreditsArray['results'][$i]['poster_path'].'" alt="photo du film"> <br/><center>'.$CreditsArray['results'][$i]['title'].'</center></a>');
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

