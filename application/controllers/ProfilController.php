<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfilController extends CI_Controller {
    public function poids_evolution() {
        $this->load->database();
        $this->load->model('Profil');
        $this->load->model('Client');

        session_start();
        $userId = $_SESSION['userId'];

        $data['results'] = $this->Profil->getProfilPoids($userId);
        $data['user'] = $this->Profil->get_utilisateur($userId);
        $data['profil'] = $this->Profil->get_profil($userId);
        $data['IMC'] = $data['profil']->poids/($data['profil']->taille*$data['profil']->taille);
        $data['utilisateurs'] = $this->Client->getAllUser();
        $data['page'] = 'EvolutionPoids';
        $this->load->view('template/template',$data);
    }
    public function modifier(){
        $this->load->database();
        $this->load->model('Profil');
        session_start();
        $data['user'] = $this->Profil->get_utilisateur($_SESSION['userId']);
        $data['profil'] = $this->Profil->get_profil($_SESSION['userId']);
        $data['page'] = 'modification_profil';
        $this->load->view('template/template',$data);
    }

    public function validation_modification(){
        $this->load->helper('date');
        $this->load->model('Profil');
        $this->load->database();

        $id = $this->input->post('id_utilisateur');
        $nom = $this->input->post('nom');
        $mail = $this->input->post('mail');
        $motdepasse = $this->input->post('mdp');
        $caisse = $this->input->post('caisse');
        $estAdmin = $this->input->post('estAdmin');

        $data = array(
            'id' => $id,
            'nom' => $nom,
            'mail' => $mail,
            'motdepasse' => $motdepasse,
            'caisse' => $caisse,
            'estadmin' => $estAdmin
        );
        $this->Profil->update_utilisateur($id, $data);

    
        $taille = $this->input->post('taille');
        $tailleA = $this->input->post('tailleAncien');

        $poids = $this->input->post('poids');
        $poidsA = $this->input->post('poidsAncien');

        if($taille!=$tailleA || $poids!=$poidsA){
            $this->Profil->addProfil($id , $taille,$poids);
        }
        // Appeler la fonction de mise à jour dans le modèle
        // $this->Profil->update_utilisateur($id, $data);
    
        // Rediriger vers une page de succès ou afficher un message de succès
    }
    public function pdf(){
        $this->load->helper('date');
        $this->load->model('Utilisateur');
        session_start();
        $id_programme = $this->Utilisateur->getProgrammeUser($_SESSION['userId']);
        echo $id_programme;
        $this->load->model('Profil');
        $this->load->database();
        $this->Profil->generer_export_pdf(1);
    }
}
?>
