<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Depense');
    }

    public function liste_depense() {

        $depenses = $this->Depense->select_depense();

        foreach ($depenses as $depense) {
            $depense->total = $depense->prixunitaire * $depense->quantite;
        }
        $data['depenses'] = $depenses;

        $data['page']='depenses';
        $this->load->view('template_back/template',$data);

    }

    public function create_depense() {
        $data['page']='insertion_depense';

        if ($this->input->post()) {
            // Récupérer les données du formulaire
            $date_depense = $this->input->post('date_depense');
            $designation = $this->input->post('designation');
            $prixunitaire = $this->input->post('prixunitaire');
            $quantite = $this->input->post('quantite');

            $this->Depense->create_depense(array(
                'date_depense' => $date_depense,
                'designation' => $designation,
                'prixunitaire' => $prixunitaire,
                'quantite' => $quantite
             ));

            $mess['message'] = "Création réussie !";
            $this->load->view('template_back/template',$data);
            return; 
        }
        $this->load->view('template_back/template',$data);
    }
}