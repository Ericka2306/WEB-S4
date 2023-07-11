<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_code extends CI_Controller {
    
    public function insert_code() {
        session_start();

        $this->load->model('code');
        $this->load->model('Utilisateur');
        $data['utilisateur']=$this->Utilisateur->select_utilisateur($_SESSION['userId']);
        $data['code'] = $this->code->get_code();
        $data['page']='code';
        $this->load->view('template_back/template',$data);
    }
    public function reserver() {
        $id=$this->input->post('code');
        session_start();
       
        $update=array(
            'etat'=>1,
            'id_utilisateur'=> $_SESSION['userId']
        );
        $this->load->model('code');
        $this->code->reserver($id,$update);
        $data['page']='index';
        $this->load->view('template_back/template',$data);
    }
    public function confirmer_code() {
        session_start();

        $this->load->model('code');
        $this->load->model('Utilisateur');
        $data['utilisateur']=$this->Utilisateur->select_utilisateur($_SESSION['userId']);
        $data['code'] = $this->code->get_code_reserve();
        $data['page']='back_code';
        $this->load->view('template/template',$data);
    }
    public function confirmer_code() {
        session_start();

        $this->load->model('code');
        $this->load->model('Utilisateur');
        $data['utilisateur']=$this->Utilisateur->select_utilisateur($_SESSION['userId']);
        $data['code'] = $this->code->get_code_reserve();
        $data['page']='back_code';
        $this->load->view('template/template',$data);
    }
    public function confirmer() {
        $id=$this->input->post('code');
        $this->load->model('code');
        $reserve=$this->code->get_reserve($id);
        $code=$this->code->get_code_id($reserve[0]->id_code);
        
        $this->db->set('etat',-1);
        $this->db->where('id', $code[0]->id);
        $this->db->update('code');
        $this->load->model('Utilisateur');
        $user=$this->Utilisateur->select_utilisateur($reserve[0]->id_user);
        $valeur=$user->caisse+$code[0]->valeur;
        $this->db->set('caisse',$valeur);
        $this->db->where('id', $user->id);
        $this->db->update('utilisateur');
        
    }
    

}
?>