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
        $this->load->model('Sport_exercice');
        $this->load->model('Exercice');

    }

    public function accueil(){
        $data['page']='accueil_back';
        $this->load->view('template_back/template',$data);
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

            if($plat){
            $this->Regime_plat ->add_plat_to_regime($id_regime,$plat);
            }
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
    public function details_sport($id) {
        $data['page']='details_sport';
        $data['sport'] = $this->Sport->get_sport($id);

        $data['exercices'] = $this->Sport_exercice->get_exercices_by_sport($id);
        // Vérifier si le régime existe
        if ($data['sport']) {
            $this->load->view('template_back/template',$data);
        } else {
            echo "Le sport demandé n'existe pas.";
        }
    }

    public function modifier_sport($id) {
        $data['page'] = 'modification_sport';
        $data['sport'] = $this->Sport->get_sport($id);
        $data['exercices'] = $this->Sport_exercice->get_exercices_by_sport($id);
        $data['tous_exercices'] = $this->Exercice->select_exercice();

        if ($this->input->post()) {
            $id_sport = $this->input->post('id_sport');
            $nom = $this->input->post('nom');
            $duree = $this->input->post('duree');
            $exercice = $this->input->post('exercice');

            if($exercice){
                $this->Sport_exercice ->add_exercice_to_sport($id_sport,$exercice);
            }
            // Mettre à jour le régime dans la base de données avec les nouvelles valeurs
            $this->Sport->update_sport($id_sport, $nom, $duree);
    
            // Rediriger vers la page de détails du régime modifié
            redirect('ControllerBack/modifier_sport/' . $id_sport);
        }
    
        $this->load->view('template_back/template', $data);
    }
    
    public function supprimer_exercice_sport($id_exercice,$id_sport){
        $this->Sport_exercice->remove_exercice_from_regime($id_exercice,$id_regime);
    }
    public function create_exercice() {
        $data['page']='insertion_exercice';

        if ($this->input->post()) {
            // Récupérer les données du formulaire
            $nom = $this->input->post('nom');
            $sary = $this->input->post('sary');

            $this->Exercice->create_exercice(array(
                'nom' => $nom,
                'sary' => $sary
             ));

            $mess['message'] = "Création réussie !";
            $this->load->view('template_back/template',$data);
            return; 
        }
        $this->load->view('template_back/template',$data);
    }
    public function liste_exercice() {
        $data['page']='liste_exercice';

        $this->load->model('Exercice'); // Charger le modèle "exercice_model"
        $data['exercice_data'] = $this->Exercice->select_exercice();
    
        // Passez les données récupérées à votre vue
        $this->load->view('template_back/template',$data);

    }
    public function modifier_exercice($id) {
        $data['page'] = 'modification_exercice';
        $data['exercice'] = $this->Exercice->get_exercice($id);

        if ($this->input->post()) {
            $id_exercice = $this->input->post('id_exercice');
            $nom = $this->input->post('nom');
            $sary = $this->input->post('sary');

            $this->Exercice->update_exercice($id_exercice, $nom, $sary);
        }
        $this->load->view('template_back/template', $data);

    }
    public function create_plat() {
        $data['page']='insertion_plat';

        if ($this->input->post()) {
            // Récupérer les données du formulaire
            $nom = $this->input->post('nom');
            $sary = $this->input->post('sary');

            $this->Plat->create_plat(array(
                'nom' => $nom,
                'sary' => $sary
             ));

            $mess['message'] = "Création réussie !";
            $this->load->view('template_back/template',$data);
            return; 
        }
        $this->load->view('template_back/template',$data);
    }
    public function liste_plat() {
        $data['page']='liste_plat';

        $this->load->model('Plat'); // Charger le modèle "plat_model"
        $data['plat_data'] = $this->Plat->select_plat();
    
        // Passez les données récupérées à votre vue
        $this->load->view('template_back/template',$data);

    }
    public function modifier_plat($id) {
        $data['page'] = 'modification_plat';
        $data['plat'] = $this->Plat->get_plat($id);

        if ($this->input->post()) {
            $id_plat = $this->input->post('id_plat');
            $nom = $this->input->post('nom');
            $sary = $this->input->post('sary');

            $this->Plat->update_plat($id_plat, $nom, $sary);
        }
        $this->load->view('template_back/template', $data);

    }

}