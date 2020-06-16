function file_get_contents (url, flags, context, offset, maxLen) {
    fs = require('fs');
    return fs.readFileSync(url, 'utf-8');
}


function getMoviebyID($id)
{
    $tmdb_url = 'https://api.themoviedb.org/3/movie/' + $id + '?api_key=7ac6810245f15284418f2a15b9b22225&language=fr-FR';
    $movie_json = file_get_contents($tmdb_url);
    $movie_array = JSON.parse($movie_json);

    $title = $movie_array['title'];

    return $title;

}

function getRandomMovie()
{
    $input = Array(28,329,299536,157336,578,13183,597,118340,111,68718,1271,16869,348,807,27205,553974,1895,274,497,78,65,238,769,500,3082,37165,200,300,600,100,550,115,155,165,175,180,185,215,235,240,275,280,380,415,435,440,475,565,595,605,620,640,650,680,710,406,313369,11324);
    $curseur=Math.floor(Math.random()*$input.length);
    $random_id = $input[$curseur];
    return getMoviebyID($random_id);
}

function generate_film($idchamp){
    document.getElementById($idchamp).value=getRandomMovie();
}