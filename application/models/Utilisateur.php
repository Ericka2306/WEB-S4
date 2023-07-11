<?php 
    class Utilisateur extends CI_Model{
        public function __construct(){
            parent::__construct();
            $this->load->database();

        }
        public function select_utilisateur($id){
           $this->db->where('id', $id);
            return $this->db->get('utilisateur')->row();
        }

    }
?>