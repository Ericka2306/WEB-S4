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
}
?>
