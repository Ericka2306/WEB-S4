<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfilController extends CI_Controller {
    public function poids_evolution($userId) {
        $this->load->database();
        $this->load->model('Profil');
        $this->load->model('Client');
        $data['results'] = $this->Profil->getProfilPoids($userId);
        $data['utilisateurs'] = $this->Client->getAllUser();
        $data['page'] = 'EvolutionPoids';
        $this->load->view('template/template',$data);
    }
}
?>
