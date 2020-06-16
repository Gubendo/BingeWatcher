<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function inscription()
    {
        $this->load->view('inscription');
    }

    public function inscription_success()
    {
        if (isset($_POST['suscribe'])) {

            $this->load->database();


            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            $this->form_validation->set_rules('mail', 'Mail', 'trim|required|valid_email|is_unique[utilisateur.mail]');

            $this->form_validation->set_rules('password', 'Mot de passe', 'required|min_length[7]');

            $this->form_validation->set_rules('password_confirm', 'Confirmation du mot de passe', 'required|matches[password]');

            if ($this->form_validation->run() == TRUE) {

                $mdp_hash = hash("sha1", $_POST['password']);

                $data = array(
                    'mail' => $_POST['mail'],
                    'password' => $mdp_hash,
                );

                $this->db->insert('utilisateur', $data);

                $this->load->view('inscription_success');


            } else {
                $this->load->view('inscription');
            }
        }
    }

    public function connexion()
    {
        $this->load->view('connexion');
    }

    public function connexion_success()
    {
        if (isset($_POST['login'])) {

            $this->load->database();

            $this->load->library('session');

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            $this->form_validation->set_rules('password_c', 'Mot de passe', 'callback_verif_user');

            if ($this->form_validation->run() == TRUE) {
                $_SESSION['logged_in'] = TRUE;
                $_SESSION['username'] = $_POST['email'];
                $this->load->view('connexion_success');
            } else {
                $this->load->view('connexion');
            }
        }
    }

    public function verif_user()
    {
        $this->db->select('*');
        $this->db->from('utilisateur');
        $this->db->where(array('mail' => $_POST['email'], 'password' => hash("sha1", $_POST['password_c'])));
        $query = $this->db->get();

        $user = $query->row();
        if ($user != NULL) {
            return TRUE;
        } else {
            $this->form_validation->set_message('verif_user', 'Aucun compte ne correspond à ces identifiants');
            return FALSE;
        }
    }

    public function deconnexion()
    {
        $this->load->library('session');
        $this->load->view('deconnexion');
        $this->session->sess_destroy();
    }

    public function compte()
    {
        $this->load->view('compte');
    }

    public function compte_success()
    {
        if (isset($_POST['edition'])) {

            $this->load->database();

            $this->load->library('session');

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            if ($_POST['email_edit'] != $_SESSION['username']) {

                $this->form_validation->set_rules('email_edit', 'Mail', 'valid_email|is_unique[utilisateur.mail]');
            }

            $this->form_validation->set_rules('old_password', 'Ancien mot de passe', 'callback_verif_oldpassword');

            $this->form_validation->set_rules('password_edit', 'Mot de passe', 'min_length[7]');

            $this->form_validation->set_rules('password_c_edit', 'Confirmation du mot de passe', 'matches[password_edit]');

            if ($this->form_validation->run() == TRUE) {

                if ($_POST['password_edit'] != NULL) {
                    $mdp_hash = hash("sha1", $_POST['password_edit']);

                    $this->db->set('password', $mdp_hash);
                    $this->db->where(array('mail' => $_SESSION['username']));
                    $this->db->update('utilisateur');
                }


                if ($_POST['email_edit'] != $_SESSION['username']) {
                    $this->db->set('mail', $_POST['email_edit']);
                    $this->db->where(array('mail' => $_SESSION['username']));
                    $this->db->update('utilisateur');

                    $this->load->library('session');
                    $this->session->sess_destroy();
                }

                $this->load->view('compte_success');
            } else {
                $this->load->view('compte');
            }
        }
    }

    public function verif_oldpassword()
    {
        if ($_POST['old_password'] != NULL) {
            $this->db->select('*');
            $this->db->from('utilisateur');
            $this->db->where(array('mail' => $_SESSION['username']));
            $query = $this->db->get();

            $user = $query->row();

            if ($user->password == hash("sha1", $_POST['old_password'])) {
                return TRUE;
            }
            else {
                $this->form_validation->set_message('verif_oldpassword', 'Ancien mot de passe invalide');
                return FALSE;
            }
        }
        return TRUE;
    }
}