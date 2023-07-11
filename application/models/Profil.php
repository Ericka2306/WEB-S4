<?php
class Profil extends CI_Model{
    public function getProfilPoids($userId){
        $query = $this->db->query("SELECT datemodif , poids FROM profil where id_utilisateur=$userId ORDER BY datemodif");
        return $query->result();
    }
    public function getProfil($email ,$motdepasse){
        $query = $this->db->query("SELECT * from utilisateur where mail='$email' and motdepasse='$motdepasse'");
        return $query->result();
    }
    public function getGenre(){
        $query = $this->db->query("SELECT * from genre");
        return $query->result();
    }
    public function insertUser($id_genre,$nom,$mail,$motdepasse){
        $data = array(
            'id_genre' => $id_genre,
            'nom' => $nom,
            'mail' => $mail,
            'motdepasse' =>$motdepasse,
            'caisse' => 0 ,
            'estadmin'=>0
        );
        
        $this->db->insert('utilisateur', $data);
        
        $insert_id = $this->db->insert_id();
        
        $result = array(
            'id' =>$insert_id,
            'id_genre' => $id_genre,
            'nom' => $nom,
            'mail' => $mail,
            'motdepasse' =>$motdepasse,
            'caisse' => 0 ,
            'estadmin'=>0
        );
        return $result;
    }
    public function addProfil($userId , $taille,$poids){
        $this->load->helper('date');
        $data = array(
            'id_utilisateur' => $userId,
            'taille' => $taille,
            'poids' => $poids,
            'datemodif' => mdate('%Y-%m-%d', now())
        );
        $this->db->insert('profil', $data);
    }

    public function get_utilisateur($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('utilisateur')->row();
    }

    public function get_profil($userId)
    {
        $this->db->where('id_utilisateur', $userId);
        return $this->db->get('profil')->row();
    }

    public function get_all_utilisateurs()
    {
        return $this->db->get('utilisateur')->result();
    }
    public function update_utilisateur($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('utilisateur', $data);
    }
    
    public function generer_export_pdf($id_programme)
    {
        // Inclure le fichier de la classe FPDF
        require_once(APPPATH . 'libraries/fpdf/fpdf.php');
    
        // Récupérer les exercices du programme depuis la base de données
        $this->db->select('exercice.nom,sport_exercice.jour');
        $this->db->from('programme');
        $this->db->join('sport_exercice', 'sport_exercice.id_sport = programme.id_sport');
        $this->db->join('exercice', 'exercice.id = sport_exercice.id_exercice');
        $this->db->where('programme.id', $id_programme);
        $exercices = $this->db->get()->result();
    
        // Récupérer les plats du programme depuis la base de données
        $this->db->select('plat.nom,regime_plat.jour');
        $this->db->from('programme');
        $this->db->join('regime_plat', 'regime_plat.id_regime = programme.id_regime');
        $this->db->join('plat', 'plat.id = regime_plat.id_plat');
        $this->db->where('programme.id', $id_programme);
        $plats = $this->db->get()->result();
    

        foreach ($exercices as $exercice) {
            $jour = $exercice->jour;
            $nom_exercice = $exercice->nom;
        
            if (!isset($exercices_par_jour[$jour])) {
                $exercices_par_jour[$jour] = array();
            }
        
            $exercices_par_jour[$jour][] = $nom_exercice;
        }
        
        foreach ($plats as $plat) {
            $jour = $plat->jour;
            $nom_plat = $plat->nom;
        
            if (!isset($plats_par_jour[$jour])) {
                $plats_par_jour[$jour] = array();
            }
        
            $plats_par_jour[$jour][] = $nom_plat;
        }
        
        
        // Créer une nouvelle instance de la classe FPDF
        $pdf = new FPDF();
        $pdf->AddPage();
    
        // Afficher les exercices du programme
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Liste des exercices du programme:', 0, 1);
        $pdf->Ln(5);
    
        $pdf->SetFont('Arial', '', 12);
        foreach ($exercices_par_jour as $jour => $exercices) {
            $pdf->Cell(20 , 10, "Jour ".$jour." : ", 0, 0);
            $nom = "";            
            foreach ($exercices as $exercice) {
                $nom=$nom." ".$exercice;
            }
            $pdf->Cell(0, 10, $nom, 0, 1);
            
        }
    
        // Afficher les plats du programme
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Liste des plats du programme:', 0, 1);
        $pdf->Ln(5);
    
        $pdf->SetFont('Arial', '', 12);

        foreach ($plats_par_jour as $jour => $plats) {
            $nom = "";
            $pdf->Cell(20 , 10, "Jour ".$jour." : ", 0, 0);
            foreach ($plats as $plat) {
                $nom=$nom." ".$plat."  ";
            }
            $pdf->Cell(0, 10, $nom, 0, 1);
        }
        
    
        // Générer le fichier PDF
        $pdf->Output('programme.pdf', 'D');
    }

    /*public function uploadImages()
    {
    // Vérifier s'il y a des fichiers sélectionnés
    if (!empty($_FILES['images']['name'][0])) {
        // Configuration des paramètres d'upload
        $config['upload_path'] = './uploads/'; // Chemin de destination pour enregistrer les images
        $config['allowed_types'] = 'gif|jpg|jpeg|png'; // Types de fichiers autorisés
        $config['max_size'] = 2048; // Taille maximale du fichier en kilo-octets (2 Mo)

        // Charger la bibliothèque d'upload
        $this->load->library('upload', $config);

        $uploadedImages = [];

        // Traiter chaque image téléchargée
        foreach ($_FILES['images']['name'] as $index => $filename) {
            $_FILES['image']['name'] = $_FILES['images']['name'][$index];
            $_FILES['image']['type'] = $_FILES['images']['type'][$index];
            $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$index];
            $_FILES['image']['error'] = $_FILES['images']['error'][$index];
            $_FILES['image']['size'] = $_FILES['images']['size'][$index];

            // Vérifier si le téléchargement a réussi
            if ($this->upload->do_upload('image')) {
                // Récupérer les informations sur le fichier téléchargé
                $uploadData = $this->upload->data();
                $fileFullName = $uploadData['file_name']; // Nom du fichier complet

                // Faire quelque chose avec le fichier téléchargé (par exemple, enregistrer le nom du fichier en base de données)

                // Ajouter le nom du fichier à la liste des images téléchargées
                $uploadedImages[] = $fileFullName;
            } else {
                // Afficher les erreurs de téléchargement
                $uploadError = $this->upload->display_errors();
                echo "Erreur lors du téléchargement de l'image : " . $uploadError;
            }
        }

        // Afficher un message de succès avec la liste des images téléchargées
        echo "Les images suivantes ont été téléchargées avec succès : " . implode(", ", $uploadedImages);
    } else {
        // Aucun fichier sélectionné
        echo "Veuillez sélectionner des images à télécharger.";
    }
}*/

}
?>