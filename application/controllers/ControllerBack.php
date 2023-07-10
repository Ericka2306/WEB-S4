<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerBack extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Regime');
        $this->load->model('Sport');
    }

    public function create_regime() {
        $data['page']='insertion_regime';

        if ($this->input->post()) {
            // Récupérer les données du formulaire
            $nom = $this->input->post('nom');
            $prix = $this->input->post('prix');
            $duree = $this->input->post('duree');

            $this->Regime->create_regime(array(
                'nom' => $nom,
                'prix' => $prix,
                'duree' => $duree
             ));

            $mess['message'] = "Création réussie !";
            $this->load->view('template_back/template',$data);
            return; 
        }
        $this->load->view('template_back/template',$data);
    }

    public function create_sport() {
        $data['page']='insertion_sport';

        if ($this->input->post()) {
            // Récupérer les données du formulaire
            $nom = $this->input->post('nom');
            $duree = $this->input->post('duree');

            $this->Regime->create_sport(array(
                'nom' => $nom,
                'duree' => $duree
             ));

            $mess['message'] = "Création réussie !";
            $this->load->view('template_back/template',$data);
            return; 
        }
        $this->load->view('template_back/template',$data);
    }
        
    
}