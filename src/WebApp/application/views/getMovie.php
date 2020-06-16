
<?php
function getMoviebyID($id)
{
    $tmdb_url = 'https://api.themoviedb.org/3/movie/' . $id . '?api_key=7ac6810245f15284418f2a15b9b22225&language=fr-FR';
    $movie_json = file_get_contents($tmdb_url);
    $movie_array = json_decode($movie_json, true);
   
    $title = $movie_array['title'];

    return $title;

}

function getMovieArray($id)
{
	$tmdb_url = 'https://api.themoviedb.org/3/movie/' . $id . '?api_key=7ac6810245f15284418f2a15b9b22225&language=fr-FR';
	$movie_json = file_get_contents($tmdb_url);
	$movie_array = json_decode($movie_json, true);

	return $movie_array;
}

function getMovieCastArray($id)
{
	$tmdb_url = 'https://api.themoviedb.org/3/movie/' . $id . '/credits?api_key=7ac6810245f15284418f2a15b9b22225&language=fr-FR';
	$movie_json = file_get_contents($tmdb_url);
	$movie_array = json_decode($movie_json, true);

	return $movie_array;
}

function getMovieVideoArray($id)
{
	$tmdb_url = 'https://api.themoviedb.org/3/movie/' . $id . '/videos?api_key=7ac6810245f15284418f2a15b9b22225&language=fr-FR';
	$movie_json = file_get_contents($tmdb_url);
	$movie_array = json_decode($movie_json, true);

	return $movie_array;
}

function getMovieRecommendationArray($id)
{
	$tmdb_url = 'https://api.themoviedb.org/3/movie/'. $id .'/recommendations?api_key=7ac6810245f15284418f2a15b9b22225&language=fr-FR';
	$movie_json = file_get_contents($tmdb_url);
	$movie_array = json_decode($movie_json, true);

	return $movie_array;
}
function getResearchMovieArray($text)
{
	$tmdb_url='https://api.themoviedb.org/3/search/movie?api_key=7ac6810245f15284418f2a15b9b22225&language=fr-FR&query=' . $text . '&sort_by=vote_count.desc.';
	$movie_json = file_get_contents($tmdb_url);
	$movie_array = json_decode($movie_json, true);

	return $movie_array['results'];
}

function getBestMovieArray($genre,$min_y,$max_y)
{
	$tmdb_url='https://api.themoviedb.org/3/discover/movie?api_key=7ac6810245f15284418f2a15b9b22225&language=fr-FR&with_genres=' . $genre . '&sort_by=vote_average.desc&vote_count.gte=3000&primary_release_date.gte=' .$min_y . '&primary_release_date.lte=' .$max_y.'';
	$movie_json = file_get_contents($tmdb_url);
	$movie_array = json_decode($movie_json, true);

	return $movie_array['results'];
}

function getRandomMovie()
{
    $input = array(28,329,299536,157336,578,13183,597,118340,111,68718,1271,16869,348,807,27205,553974,1895,274,497,78,65,238,769,500,3082,37165,200,300,600,100,550,115,155,165,175,180,185,215,235,240,275,280,380,415,435,440,475,565,595,605,620,640,650,680,710,406,313369,11324);
    $random_id = $input[array_rand($input,1)];
    return getMovieArray($random_id);

}

function getRandomMovieWithGenre($genre)
{
	
	
    $tmdb_url = 'https://api.themoviedb.org/3/discover/movie?api_key=7ac6810245f15284418f2a15b9b22225&with_genres=' . $genre . '&language=fr-FR&vote_count.gte=4000';
	$movie_json = file_get_contents($tmdb_url);
	$movies_list = json_decode($movie_json, true);

	$nb_pages = $movies_list['total_pages'];
	if($nb_pages >= 1000)
	{
		$page_rand = rand(1,999);
	}
	else
	{
		$page_rand = rand(1,$nb_pages);
	}
	
	$new_url = 'https://api.themoviedb.org/3/discover/movie?api_key=7ac6810245f15284418f2a15b9b22225&with_genres=' . $genre . '&language=fr-FR&vote_count.gte=4000&page=' . $page_rand;

	$new_json = file_get_contents($new_url);
	$new_list = json_decode($new_json, true);

	$film_rand = rand(0,sizeof($new_list['results'])-1);

	$movie_array = $new_list['results'][$film_rand];

	return $movie_array;

}
$title = getRandomMovie();

function getActorArray($actor_id)
{
	$tmdb_url = 'https://api.themoviedb.org/3/person/' . $actor_id . '?api_key=7ac6810245f15284418f2a15b9b22225&language=fr-FR';
	$actor_json = file_get_contents($tmdb_url);
	$actor_array = json_decode($actor_json, true);

	return $actor_array;
}

function getCreditsArray($actor_id)
{
	$tmdb_url = 'http://api.themoviedb.org/3/discover/movie?api_key=7ac6810245f15284418f2a15b9b22225&with_cast=' . $actor_id . '&language=fr-FR';
	$credits_json = file_get_contents($tmdb_url);
	$credits_array = json_decode($credits_json, true);

	return $credits_array;
}


?>
