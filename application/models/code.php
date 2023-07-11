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
        public function reserver($id,$data){
           $this->db->where('id',$id);
           return $this->db->update('code',$data);
        }
    }
?>