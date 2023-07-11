<?php
class Client extends CI_Model{
    public function getHistoriqueActivite($userId){
        $query = $this->db->query("SELECT u.id as id, u.nom as utilisateur , r.nom as regime , s.nom as sport , ha.montant as montant , up.debut as debut , up.fin as fin FROM historiqueachat as ha Join user_programme as up on up.id = ha.id_user_programme Join programme as p on p.id = up.id_programme Join regime as r on r.id=p.id_regime Join sport as s on s.id = p.id_sport Join utilisateur as u on u.id = up.id_utilisateur where ha.etat=10 and up.id_utilisateur = $userId");
        return $query->result();
    }
    public function get_recette(){
        $query = $this->db->query("SELECT u.id as id, u.nom as utilisateur , r.nom as regime , s.nom as sport , ha.montant as montant , ha.dateachat FROM historiqueachat as ha Join user_programme as up on up.id = ha.id_user_programme Join programme as p on p.id = up.id_programme Join regime as r on r.id=p.id_regime Join sport as s on s.id = p.id_sport Join utilisateur as u on u.id = up.id_utilisateur where ha.etat=10");
        return $query->result();
    }
    public function getAllUser(){
        $query = $this->db->query("SELECT * FROM utilisateur where estAdmin=0 ");
        return $query->result();
    }
}
?>