<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_program extends CI_Controller {
    public function insert_program() {
        $this->load->model('Programme');
        $sportvalues=$this->input->post('selected_exercises');
        $dietvalues=$this->input->post('selected_diet');
        $objectif=$this->input->post('selected_objective');
        $montant=$this->input->post('montant');
        $intervalle_d=$this->input->post('intervalle_d');
        $intervalle_f=$this->input->post('intervalle_f');
        
            $data = array(
                'id_sport' => $sportvalues,
                'id_regime' => $dietvalues,
                'id_objectif' => $objectif,
                'montant'=>$montant,
                'intervalle_d'=>$intervalle_d,
                'intervalle_f'=>$intervalle_f,
            );

            // Insérez les données dans la table sport_exercice
           $this->Programme->insert_programme($data);
           redirect('Welcome','program');
        }
        public function detail(){
            $id_sport=$this->input->get('id_sport');
            $id_regime=$this->input->get('id_regime');
            $id_program=$this->input->get('id_program');
            $this->load->model('sport');
            $this->load->model('Regime');
            $data['sport']=$this->sport->get_sport($id_sport);
            $data['page']='detail';
            $data['regime']=$this->Regime->get_regime($id_regime);
            $data['id_program']=$id_program;
           
            /*$sport=$this->sport->get_sport($id_sport);
            $data['page']='detail';
            $data['sport']=$sport;
            $data['regime']=$regime;*/
            $this->load->view('template/template',$data);
        }
        public function confirmer(){
            $sport=$this->input->get('sport');
            $regime=$this->input->get('regime');
            $id_program=$this->input->get('id_program');
            $this->load->model('user_program');
            session_start();
            $this->load->helper('date');
            $data=array(
                'id_utilisateur'=>$_SESSION['userId'],
                'id_programme'=>$id_program,
                'debut'=>mdate('%Y-%m-%d ',now('Europe/Moscow'))
            );
            $this->user_program->create_user_program($data);
            redirect('Welcome/index');


        }
}
?>
