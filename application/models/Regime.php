<?php 
    class Regime extends CI_Model{
        public function __construct(){
            parent::__construct();
            $this->load->database();

        }
        public function select_regime(){
            $sql="SELECT * FROM regime";
            $query=$this->db->query($sql);
            return $query->result();
        }
    }
?>