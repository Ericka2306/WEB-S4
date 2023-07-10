<?php
class Profil extends CI_Model{
    public function getProfilPoids($userId){
        $query = $this->db->query("SELECT datemodif , poids FROM profil where id_utilisateur=$userId ORDER BY datemodif");
        return $query->result();
    }
}
?>