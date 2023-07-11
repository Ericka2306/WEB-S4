<?php
    class Exercice extends CI_Model {
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
        public function create_exercice($data) {
            $this->db->insert('exercice', $data);
            return $this->db->insert_id();
        }
        public function select_exercice() {
            $sql="SELECT * FROM exercice";
            $query = $this->db->query($sql);
            return $query->result();
        }

        public function get_exercice($id) {
            $query = $this->db->get_where('exercice', array('id' => $id));
            return $query->row();
        }

        public function update_exercice($id_exercice, $nom, $sary){
            $data = array(
                'nom' => $nom,
                'sary' => $sary,
                
            );
            $this->db->where('id', $id_exercice);
            $this->db->update('exercice', $data);
        }
    }
?>