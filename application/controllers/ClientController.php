<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClientController extends CI_Controller {
   public function historique_activites(){
        $this->load->database();
        $this->load->model('Profil');
        $this->load->model('Client');
        
        $userId = "";
        if($this->input->post("userAncien")){
            $userId = $this->input->post("userAncien");
        }
        if($this->input->post("userId")){
            $userId = $this->input->post("userId");
        }else{
            $userId = 2;
        }
        
        $data['poids'] = $this->Profil->getProfilPoids($userId);
        $data['id'] = $userId;
        $data['results'] = $this->Client->getHistoriqueActivite($userId);
        $data['utilisateurs'] = $this->Client->getAllUser();
        $data['page'] = 'Historique_Acahat';
        $this->load->view('template_back/template',$data);
   }
}
?>
