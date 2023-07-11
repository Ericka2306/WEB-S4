<?php
    class Regime_plat extends CI_Model {
        public function __construct() {
            parent::__construct();
            $this->load->database();
            $this->load->model('Plat');

        }

        public function get_plats_by_regime($id_regime) {
            $this->db->select('plat.*');
            $this->db->from('regime_plat');
            $this->db->join('plat', 'plat.id = regime_plat.id_plat');
            $this->db->where('regime_plat.id_regime', $id_regime);
            $query = $this->db->get();
            return $query->result();
        }

        public function add_plat_to_regime($id_regime, $id_plat) {

            $existingRow = $this->db->get_where('regime_plat', array('id_regime' => $id_regime, 'id_plat' => $id_plat))->row();
            if ($existingRow) {
                // Lever une exception ou afficher un message d'erreur approprié
                throw new Exception("Ce plat existe déjà avec le régime.");
            }

            $data = array(
                'id_regime' => $id_regime,
                'id_plat' => $id_plat,
                // Autres colonnes de la table Regime_plat
            );
            $this->db->insert('regime_plat', $data);
        }

        public function remove_plat_from_regime($id_regime, $id_plat) {
            $this->db->where('id_regime', $id_regime);
            $this->db->where('id_plat', $id_plat);
            $this->db->delete('Regime_plat');
        }
    }
    ?>