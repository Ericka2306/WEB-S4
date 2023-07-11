<?php
    class Depense extends CI_Model {
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }

        public function create_depense($data) {
            $this->db->insert('depense', $data);
            return $this->db->insert_id();
        }

        public function select_depense() {
            $sql="SELECT * FROM depense";
            $query = $this->db->query($sql);
            return $query->result();
        }
    }
?>