<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Animal extends CI_Controller {
	
	public function index(){		
		$this->load->database('default');
		$this->load->model('animal_model');

		$Animales = $this->animal_model->MostrarAnimales();
		$Razas = $this->animal_model->Razas();
		$this->load->view("Animal/index.php",compact("Animales","Razas"));
	}

	public function guardar(){
		$this->load->database('default');
		$this->load->model('animal_model');
		
		if ($this->input->post("idani")=="") {
			$guardarAnimal= $this->animal_model->Insertar();
			if ($guardarAnimal==1) { 
				echo "SuccessI";
			}else{
				echo "ErrorI";
			}
		}else{
			$modificarAnimal= $this->animal_model->Modificar();
			if ($modificarAnimal==1) {
				echo "SuccessM";
			}else{
				echo "ErrorM";
			}
		}
	}

	public function modificar(){
		$this->load->database('default');
		$this->load->model('animal_model');

		$listaAnimal= $this->animal_model->ListarAnimal($this->input->post("ani_id"));
		echo json_encode($listaAnimal);
	}

	public function eliminar(){
		$this->load->database('default');
		$this->load->model('animal_model');

		$eliminarAnimal= $this->animal_model->Eliminar($this->input->post("ani_id"));
		if ($eliminarAnimal==1) { 
			echo "SuccessI";
		}else{
			echo "ErrorI";
		}
	}
}