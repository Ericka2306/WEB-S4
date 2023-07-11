<?php
    class Plat extends CI_Model {
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
        
        public function create_plat($data) {
            $this->db->insert('plat', $data);
            // $plat_id = $this->db->insert_id();
            // Téléchargez l'image du plat
            
            $upload_path = './';
            $config['upload_path'] = $upload_path; // Remplacez par votre chemin de destination
            $config['allowed_types'] = 'gif|jpg|png|ods'; // Types de fichiers autorisés
            $config['max_size'] = 2048; // Taille maximale du fichier (en kilo-octets)
            $config['file_name'] = $data['sary']; // Nom du fichier

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                // L'image a été téléchargée avec succès
                $image_data = $this->upload->data();
                $image_path = $image_data['file_name'];

                // Mettez à jour le champ 'sary' avec le nom de l'image dans la base de données
                $this->db->where('id', $plat_id);
                $this->db->update('plat', array('sary' => $image_path));
            } else {
                // Une erreur s'est produite lors du téléchargement de l'image
                $error = $this->upload->display_errors();
                echo $error;
                // Gérez l'erreur en conséquence
            }
            // return $plat_id;
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