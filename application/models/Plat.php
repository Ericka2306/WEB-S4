<?php
    class Plat extends CI_Model {
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
        
        public function select_plat() {
            $sql="SELECT * FROM plat";
            $query = $this->db->query($sql);
            return $query->result();
        }
    }
?>