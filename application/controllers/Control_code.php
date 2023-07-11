<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_code extends CI_Controller {
    public function insert_code() {
        $this->load->model('code');
        $this->load->model('Utilisateur');
        $data['utilisateur']=$this->Utilisateur->select_utilisateur(1);
        $data['code'] = $this->code->get_code();
        $data['page']='code';
        $this->load->view('template_back/template',$data);
    }
    public function reserver() {
        $id=$this->input->post('code');
        $update=array(
            'etat'=>1
        );
        $this->load->model('code');
        $this->code->reserver($id,$update);
        $data['page']='index';
        $this->load->view('template_back/template',$data);
    }
}
?>