<?php 
    class sport extends CI_Model{
        public function __construct(){
            parent::__construct();
            $this->load->database();

        }
        public function select_sport(){
            $sql="SELECT * FROM sport";
            $query=$this->db->query($sql);
            return $query->result();
        }
    }
?>