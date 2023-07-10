<?php
    class Sport_exercice extends CI_Model {
        public function __construct() {
            parent::__construct();
            $this->load->database();

        }

        public function get_exercices_by_sport($id_sport) {
            $this->db->select('exercice.*');
            $this->db->from('sport_exercice');
            $this->db->join('exercice', 'exercice.id = sport_exercice.id_exercice');
            $this->db->where('sport_exercice.id_sport', $id_sport);
            $query = $this->db->get();
            return $query->result();
        }

        public function add_exercice_to_sport($id_sport, $id_exercice) {

            $existingRow = $this->db->get_where('sport_exercice', array('id_sport' => $id_sport, 'id_exercice' => $id_exercice))->row();
            if ($existingRow) {
                // Lever une exception ou afficher un message d'erreur approprié
                throw new Exception("Cet exercice existe déjà avec le régime.");
            }

            $data = array(
                'id_sport' => $id_sport,
                'id_exercice' => $id_exercice,
                // Autres colonnes de la table sport_exercice
            );
            $this->db->insert('sport_exercice', $data);
        }

        public function remove_exercice_from_sport($id_sport, $id_exercice) {
            $this->db->where('id_sport', $id_sport);
            $this->db->where('id_exercice', $id_exercice);
            $this->db->delete('sport_exercice');
        }

        public function liste_exercice() {
            $data['page']='liste_exercice';
    
            $this->load->model('Exercice'); // Charger le modèle "exercice_model"
            $data['exercice_data'] = $this->Exercice->select_exercice();
        
            // Passez les données récupérées à votre vue
            $this->load->view('template_back/template',$data);
    
        }
    }
?>