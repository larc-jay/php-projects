<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('course_model');
	}
	public function index()
	{
		//$data['schedules'] = $this->course_model->getTop10Schedules();
		$data['discoverProgram'] = $this->course_model->getDiscoverProgrem();
		$data['locations'] = $this->course_model->getLocations();
		$this->load->view('templates/homeheader');
		$this->load->view('pages/home',$data);
		$this->load->view('templates/level-1');
		//$this->load->view('templates/level-2');
		//$this->load->view('templates/level-3',$data);
		//$this->load->view('templates/level-4');
		//$this->load->view('templates/level-5');
		$this->load->view('templates/level-6');
		$this->load->view('templates/homefooter');
	}
	public function loadCarousel(){
		return $this->load->view('templates/carousel',TRUE);
	}
}
