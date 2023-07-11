<?php 
    class exercice extends CI_Model{
        public function __construct(){
            parent::__construct();
            $this->load->database();

        }
        public function select_exercice(){
            $sql="SELECT * FROM exercice";
            $query=$this->db->query($sql);
            return $query->result();
        }
    }
?>