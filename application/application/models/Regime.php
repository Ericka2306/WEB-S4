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
    
        public function select_regime() {
            $sql="SELECT * FROM regime";
            $query = $this->db->query($sql);
            return $query->result();
        }
    
        // Update
        public function update_regime($id_regime, $nom, $prix, $duree){
            $data = array(
                'nom' => $nom,
                'prix' => $prix,
                'duree' => $duree
            );
            $this->db->where('id', $id_regime);
            $this->db->update('regime', $data);
        }

        // Delete
        public function delete_regime($id) {
            $this->db->where('id', $id);
            $this->db->delete('regime');
        }
    }
    
    
?>

