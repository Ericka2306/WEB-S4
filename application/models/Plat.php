<?php
    class Plat extends CI_Model {
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
        
        public function create_plat($data) {
            $this->db->insert('plat', $data);
            return $this->db->insert_id();
        }

        public function select_plat() {
            $sql="SELECT * FROM plat";
            $query = $this->db->query($sql);
            return $query->result();
        }
        public function get_plat($id) {
            $query = $this->db->get_where('plat', array('id' => $id));
            return $query->row();
        }

        public function update_plat($id_plat, $nom, $sary){
            $data = array(
                'nom' => $nom,
                'sary' => $sary,
                
            );
            $this->db->where('id', $id_plat);
            $this->db->update('plat', $data);
        }
    }
?>