<?php 
    class Programme extends CI_Model{
        public function __construct(){
            parent::__construct();
            $this->load->database();

        }
        public function select_programme(){
            $sql="SELECT * FROM programme";
            $query=$this->db->query($sql);
            return $query->result();
        }
        public function insert_programme($data){
            $this->db->insert('programme',$data);
        }

        public function select_programme_correspondant($objectif,$poids){
            $sql="SELECT * FROM programme where id_objectif=".$objectif." and intervalle_d<=".$poids." and intervalle_f>=".$poids;
            
            $query=$this->db->query($sql);
            return $query->result();
        }
    }
?>