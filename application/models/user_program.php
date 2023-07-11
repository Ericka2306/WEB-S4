<?php
    class user_program extends CI_Model {
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
    
    public function create_user_program($data) {
        $this->db->insert('user_programme', $data);
        return $this->db->insert_id();
    }
}
?>