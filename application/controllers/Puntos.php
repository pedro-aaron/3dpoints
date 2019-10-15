<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puntos extends CI_Controller {

	public function index()
	{
		$this->show();
	}


	public function show(){
		if (!isset($this->session->puntos)) {
			$this->session->puntos = '[]';
		}
		$data = array();
		$data['puntos'] = $this->session->puntos; 

		$this->load->view('puntos', $data);
	}

	public function add($p1, $x, $y, $z){
		if (!isset($this->session->puntos)) {
			$this->session->puntos = '[]';
		}
		
		$puntos = json_decode($this->session->puntos);
		

		$punto =  array('label'=>$p1, 'x'=>$x, 'y'=>$y, 'z'=>$z);
		$puntos[] = $punto;
		$this->session->puntos = json_encode($puntos);
		echo count($puntos);
	}

	public function count(){
		if (!isset($this->session->puntos)) {
			$this->session->puntos = '[]';
		}
		
		$puntos = json_decode($this->session->puntos);
		echo count($puntos);
	}	

	public function clear(){
		$this->session->sess_destroy();

	}

	public function sesion(){
		echo ($this->session->puntos);
	}
}
