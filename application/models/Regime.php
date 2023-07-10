<?php
    class Regime extends CI_Model {
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
    
        // Create
        public function create_regime($data) {
            $this->db->insert('regime', $data);
            return $this->db->insert_id();
        }
    
        // Read
        public function get_regime($id) {
            $query = $this->db->get_where('regime', array('id' => $id));
            return $query->row();
        }
    
        // public function get_all_regimes() {
        //     $query = $this->db->get('regime');
        //     return $query->result();
        // }
    
        // Update
        public function update_regime($id, $data) {
            $this->db->where('id', $id);
            $this->db->update('regime', $data);
        }
    
        // Delete
        public function delete_regime($id) {
            $this->db->where('id', $id);
            $this->db->delete('regime');
        }
    }
    
    
?>
