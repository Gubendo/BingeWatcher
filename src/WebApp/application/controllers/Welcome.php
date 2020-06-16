<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Ce site sera BingeWatcher 
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('accueil');
	}
	public function test()
	{
		$this->load->view('getMovie');
	}

	public function fiche_film()
	{
	    $this->load->library('session');
        $this->load->database();
        $id=$_GET['id'];


        $query = $this->db->query("SELECT * FROM utilisateur WHERE mail='".$_SESSION['username']."'");

        foreach ($query->result() as $row) {
            $id_user= $row->id_utilisateur;
        }
        $query = $this->db->query("SELECT * FROM film_utilisateur WHERE id_user=".$id_user."AND id_film=".$id."AND vu='true'" );
        $marque=false;
        foreach ($query->result() as $row) {
            $marque=true;
        }
        $query = $this->db->query("SELECT * FROM film_utilisateur WHERE id_user=".$id_user."AND id_film=".$id."AND note BETWEEN 0 AND 10");
        $note=false;
        foreach ($query->result() as $row) {
            $note=true;
        }
        $_SESSION['id_film']=$id;
		$this->load->view('fiche_film1');
        if (!$marque && isset($_SESSION['username'])){
            $this->load->view('bouton_vu');
        }
        if (!$note && isset($_SESSION['username'])){
            $this->load->view('bouton_note');
        }
        $this->load->view('fiche_film2');
	}

	public function film_vu(){
        $this->load->library('session');
        $this->load->database();
        $id=$_GET['id'];


        $query = $this->db->query("SELECT * FROM utilisateur WHERE mail='".$_SESSION['username']."'");

        foreach ($query->result() as $row) {
            $id_user= $row->id_utilisateur;
        }

        $query = $this->db->query("SELECT * FROM film_utilisateur WHERE id_user=".$id_user."AND id_film=".$id);
        $enregistré=false;
        foreach ($query->result() as $row) {
            $enregistré=true;
        }

        if(!$enregistré) {
            $data = array('id_user' => $id_user, 'id_film' => $id, 'vu' => true);
            $this->db->insert('film_utilisateur', $data);
        }
        else{
            $this->db->simple_query("update film_utilisateur set vu='true' where id_user=".$id_user."AND id_film=".$id);
        }
        $this->fiche_film();
    }

	public function best_films()
	{
		$this->load->view('best_films');
	}

	public function fiche_acteur()
	{
		$this->load->view('fiche_acteur');
	}
}
