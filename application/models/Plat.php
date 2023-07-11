<?php
    class Plat extends CI_Model {
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
        
        public function create_plat($data) {

            $this->db->insert('plat', $data);
            $plat_id = $this->db->insert_id();
            $this->load->helper('url', 'form');	
            $this->load->library('form_validation');
    
            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2000;
            $config['max_width'] = 1500;
            $config['max_height'] = 1500;
    
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) 
            {
                $error = array('error' => $this->upload->display_errors());
                // $this->load->view('imageupload_form', $error);
            } 
            else 
            {
                $data = array('image_metadata' => $this->upload->data());
    
                // $this->load->view('imageupload_success', $data);
            }

            return $plat_id;
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