<?php 
    class code extends CI_Model{
        public function __construct(){
            parent::__construct();
            $this->load->database();

        }
        public function get_code(){
            $sql="SELECT * FROM code";
            $query=$this->db->query($sql);
            return $query->result();
        }
        public function get_code_reserve(){
            $sql="SELECT * FROM code_reserve";
            $query=$this->db->query($sql);
            return $query->result();
        }
        public function reserver($id,$data){
            
            $this->db->set('etat',1);
            $this->db->where('id', $id);
            $this->db->update('code');
            $data = array(
                'id_code' => $id,
                'id_user' =>$_SESSION['userId'] 
            );
            $this->db->insert('code_reserve', $data);
    
        }
        public function confirm_code(){
            $sql="SELECT * FROM code where etat=1";
            $query=$this->db->query($sql);
            return $query->result();
        }
        public function get_reserve($id){
            $sql="SELECT * FROM code_reserve where id=$id";
            $query=$this->db->query($sql);
            return $query->result();
        }
        public function get_code_id($id){
            $sql="SELECT * FROM code where id=$id";
            $query=$this->db->query($sql);
            return $query->result();
        }
    }
?>