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

        public function get_sport($id) {
            $query = $this->db->get_where('sport', array('id' => $id));
            return $query->row();
        }

        public function select_sport() {
            $sql="SELECT * FROM sport";
            $query = $this->db->query($sql);
            return $query->result();
        }

        public function update_sport($id_sport, $nom, $duree){
            $data = array(
                'nom' => $nom,
                'duree' => $duree
            );
            $this->db->where('id', $id_sport);
            $this->db->update('sport', $data);
        }

        // Delete
        public function delete_sport($id) {
            $this->db->where('id', $id);
            $this->db->delete('sport');
        }
    }
?>