<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
    opacity: 0.8;
    }

  </style>

    <link href="<?php echo base_url(); ?>application/css/styles.css" rel="stylesheet" >
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

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../.." onclick="$('.loading').fadeIn(1);" >Accueil</a>
    </div>
</nav>


<!-- Header -->
<header class="masthead">
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
            <h1 class="mx-auto my-0 text-uppercase">Inscription</h1>
            <br><br><br><br>

            <form action="inscription_success" method="POST">
                <div class="form-group">
                    <input class="form-control" name="mail" id="mail" type="email" placeholder="Email">
                    <?php echo form_error("mail");?>
                </div>
                <div class="form-group">
                    <input class="form-control" name="password" id="password" type="password" placeholder="Mot de passe">
                    <?php echo form_error("password");?>
                </div>
                <div class="form-group">
                    <input class="form-control" name="password_confirm" id="password_confirm" type="password" placeholder="Confirmez votre mot de passe">
                    <?php echo form_error("password_confirm");?>
                </div>
                <div>
                    <button class="btn btn-primary mx-auto" name="suscribe">S'inscrire</button>
                </div>
            </form>
        </div>
    </div>
</header>


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