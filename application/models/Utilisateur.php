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
        public function getProgrammeUser($userId){
            $sql="select id_programme from user_programme where id_utilisateur =$userId";
            $query=$this->db->query($sql);
            return $query->row();
        }
    }
?>