<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControllerBack extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Regime');
        $this->load->model('Sport');
        $this->load->model('Regime_plat');
        $this->load->model('Plat');

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

    public function liste_regime() {
        $data['page']='liste_regime';

        $this->load->model('Regime'); // Charger le modèle "Regime_model"
        $data['regime_data'] = $this->Regime->select_regime();
    
        // Passez les données récupérées à votre vue
        $this->load->view('template_back/template',$data);

    }

    public function details_regime($id) {
        $data['page']='details_regime';
        $data['regime'] = $this->Regime->get_regime($id);

        $data['plats'] = $this->Regime_plat->get_plats_by_regime($id);
        // Vérifier si le régime existe
        if ($data['regime']) {
            $this->load->view('template_back/template',$data);
        } else {
            echo "Le régime demandé n'existe pas.";
        }
    }

    public function modifier_regime($id) {
        $data['page'] = 'modification_regime';
        $data['regime'] = $this->Regime->get_regime($id);
        $data['plats'] = $this->Regime_plat->get_plats_by_regime($id);
        $data['tous_plats'] = $this->Plat->select_plat();

        if ($this->input->post()) {
            $id_regime = $this->input->post('id_regime');
            $nom = $this->input->post('nom');
            $prix = $this->input->post('prix');
            $duree = $this->input->post('duree');
            $plat = $this->input->post('plat');

            $this->Regime_plat ->add_plat_to_regime($id_regime,$plat);
            // Mettre à jour le régime dans la base de données avec les nouvelles valeurs
            $this->Regime->update_regime($id_regime, $nom, $prix, $duree);
    
            // Rediriger vers la page de détails du régime modifié
            redirect('ControllerBack/modifier_regime/' . $id_regime);
        }
    
        $this->load->view('template_back/template', $data);
    }
    
    public function supprimer_plat_regime($id_plat,$id_regime){
        $this->Regime_plat->remove_plat_from_regime($id_plat,$id_regime);
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
        
    public function liste_sport() {
        $data['page']='liste_sport';

        $this->load->model('Sport'); // Charger le modèle "sport_model"
        $data['sport_data'] = $this->Sport->select_sport();
    
        // Passez les données récupérées à votre vue
        $this->load->view('template_back/template',$data);

    }
}