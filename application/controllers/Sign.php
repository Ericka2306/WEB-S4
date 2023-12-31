<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign extends CI_Controller {

    public function logout(){
        session_start();
        session_destroy();
        redirect("");
    }
    
    public function sign_up(){
        $this->load->database();
        $this->load->model('Profil');

        $data['genre'] = $this->Profil->getGenre();
        $data['page'] = 'Inscription';
        $this->load->view('Inscription',$data);
    }
    public function sign_in() {
        $this->load->view('Login');
    }
    public function log_in_validation(){
        $this->load->database();
        $this->load->model('Profil');

        $email = $this->input->post('mail');
        $mdp = $this->input->post('mdp');

        $profil = $this->Profil->getProfil($email,$mdp);


        if(count($profil)==1){
            $utilisateur = $this->Profil->get_utilisateur($profil[0]->id);

            session_start();
            $_SESSION['userId'] = $profil[0]->id;
            
            if ($utilisateur->estadmin == 1) {
                $data['page'] = 'back_code';
                $this->load->view('template_back/template',$data);
            }
            else {
                redirect("Welcome/");
            }
            
        }else{
            redirect('Sign/sign_in');
        }
    }
    public function inscriptionInfo(){
        $this->load->database();
        $this->load->model('Profil');

        $id_genre = $this->input->post('genre');
        $nom = $this->input->post('nom');
        $mail = $this->input->post('mail');
        $mdp = $this->input->post('mdp');

        $result = $this->Profil->insertUser($id_genre,$nom,$mail,$mdp);
        
        session_start();
        $_SESSION['userId'] = $result['id'];
        $data['userId'] = $result['id'];
        $data['objectif'] = $this->Profil->getObjectif();
        $this->load->view('Inscription_sante' , $data);
    }
    public function inscriptionSante(){
        $this->load->database();
        $this->load->model('Profil');

        $id = $this->input->post('id');
        $taille = $this->input->post('taille');
        $poids = $this->input->post('poids');

        $this->Profil->addProfil($id , $taille , $poids);
    }
}
?>
