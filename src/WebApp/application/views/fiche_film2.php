<?php
/**
 * Created by PhpStorm.
 * User: corentin
 * Date: 29/11/18
 * Time: 00:04
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$id=$_GET['id'];
$MovieArray=getMovieArray($id);
$CastArray=getMovieCastArray($id);
$RecommendationArray=getMovieRecommendationArray($id);?>
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
    <p style="text-align:center"><a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-height="1000" data-width="1000" data-text= "J'ai découvert &quot;<?php echo($MovieArray['title']) ?>&quot; avec @BingeWatcher_FR !" data-url="http://bingewatcher.com/id=<?php echo($id)?>" data-hashtags="BingeWatcher" data-lang="fr" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></p>
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
                            echo('<td><a href="fiche_acteur?id='.$CastArray['cast'][$i]['id'].'" onclick="$(\'.loading\').fadeIn(1);"><img class="img-fluid img-thumbnail" width="100%" src="https://image.tmdb.org/t/p/w500/'.$CastArray['cast'][$i]['profile_path'].'" alt="photo de l\'acteur/actrice"> <br/>'.$CastArray['cast'][$i]['name'].'<br/><p class="text-black-50 mb-0">'.$CastArray['cast'][$i]['character'].'</p></a></td>');
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
                            echo('<td><a href="fiche_film?id='.$RecommendationArray['results'][$i]['id'].'" onclick="$(\'.loading\').fadeIn(1);"> <img class="img-fluid img-thumbnail"  width="100%" src="https://image.tmdb.org/t/p/w500/'.$RecommendationArray['results'][$i]['poster_path'].'" alt="photo du film">  <br/><center>'.$RecommendationArray['results'][$i]['title'].'</center></a>');
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