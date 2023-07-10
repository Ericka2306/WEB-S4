<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connection extends CI_Controller {
    public function testConnection() {
        // Charger la bibliothèque de base de données
        $this->load->database();

        // Établir une connexion à la base de données
        $this->db->initialize();

        // Vérifier la connexion
        if ($this->db->conn_id) {
            echo "Connexion réussie à la base de données PostgreSQL.";
        } else {
            echo "Échec de la connexion à la base de données PostgreSQL.";
        }
    }
}
?>
