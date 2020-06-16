<?php
/**
 * Created by PhpStorm.
 * User: corentin
 * Date: 16/12/18
 * Time: 18:52
 */
$this->load->library('session');
$id=$_SESSION['id_film'];
echo "<a class='btn btn-primary text-white' onclick=\"window.location='http://127.0.0.1/WebApp/index.php/welcome/film_vu?id=" . $id . "'\" >Marquer comme vu</a> <br/>";
