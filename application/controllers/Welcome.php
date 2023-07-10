<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['page']='index';
		$this->load->view('template/template',$data);
	}	
	public function contact()
	{
		$data['page']='contact';
		$this->load->view('template/template',$data);
	}	
	public function program(){
		$data['page']='liste_program';
		$this->load->model('Regime');
		$data['regime']=$this->Regime->select_regime();
		$this->load->view('template/template',$data);
	}	
	public function regime(){
		$data['page']='liste_program';
		//$this->load->model('Regime');
		//$data['regimes']=$this->Regime->select_regime();
		$this->load->view('template/template',$data);
	}	
}
