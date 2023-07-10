<?php
    class Sport extends CI_Model {
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
        // Create
        public function create_sport($data) {
            $this->db->insert('sport', $data);
            return $this->db->insert_id();
        }

        public function select_sport() {
            $sql="SELECT * FROM sport";
            $query = $this->db->query($sql);
            return $query->result();
        }
    }
?>