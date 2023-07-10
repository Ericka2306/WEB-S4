<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign extends CI_Controller {
    public function sign_in() {
        $this->load->view('Login');
    }
}
?>
