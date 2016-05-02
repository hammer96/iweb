<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//   require_once APPPATH."/views/Fuente/cabecera.php";
class Raza extends CI_Controller {
	
	public function index(){		
		$this->load->database('default');
		$this->load->model('raza_model');

		$Razas = $this->raza_model->MostrarRazas();
		$this->load->view("Raza/index.php",compact("Razas"));
	}

	public function guardar(){
		$this->load->database('default');
		$this->load->model('raza_model');

		if ($this->input->post("id")=="") {
			$guardarRaza= $this->raza_model->Insertar($this->input->post("raz_descripcion"),$this->input->post("raz_abreviatura"));
			if ($guardarRaza==1) { 
				echo "SuccessI";
			}else{
				echo "ErrorI";
			}
		}else{
			$modificarRaza= $this->raza_model->Modificar($this->input->post("id"),$this->input->post("raz_descripcion"),$this->input->post("raz_abreviatura"));
			if ($modificarRaza==1) {
				echo "SuccessM";
			}else{
				echo "ErrorM";
			}
		}
	}

	public function modificar(){
		$this->load->database('default');
		$this->load->model('raza_model');

		$listaRaza= $this->raza_model->ListarRaza($this->input->post("raz_id"));
		echo json_encode($listaRaza);
	}

	public function eliminar(){
		$this->load->database('default');
		$this->load->model('raza_model');

		$eliminarRaza= $this->raza_model->Eliminar($this->input->post("raz_id"));
		if ($eliminarRaza==1) { 
			echo "SuccessI";
		}else{
			echo "ErrorI";
		}
	}
}