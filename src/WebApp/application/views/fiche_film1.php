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
<?php


?>