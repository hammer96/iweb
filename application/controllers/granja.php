<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Granja extends CI_Controller {
	
	public function index(){		
		$this->load->database('default');
		$this->load->model('animal_model');

		$Animales['animal']=$this->animal_model->MostrarAnimal();
		foreach ($Animales['animal'] as $key => $value) {
			$Animales['animal'][$key]['eventos']=$this->animal_model->MostrarEventos($value['ani_id']);
		}
		//echo "<pre>";
		//print_r($Animal);	
		$this->load->view("Granja/index.php",compact("Animales"));
	}
	

	public function Nuevo(){
		$this->load->database('default');
		$this->load->model('Concepto_model');

		$TipoMovimientos = $this->Concepto_model->TipoMovimientos();
		$NuevoConcep= $this->Concepto_model->Nuevo();
		$this->load->view("Concepto/index.php",compact("NuevoConcep","TipoMovimientos"));
		echo json_encode($NuevoConcep);
	}

	public function Guardar(){
		$this->load->database('default');
		$this->load->model('Concepto_model');

		$NuevoConcep= $this->Concepto_model->Insertar($this->input->post("codconcepto"),$this->input->post("codtipomovimiento"),$this->input->post("descripcion"));
		echo "<center> <span class='glyphicon glyphicon-warning-sign' aria-hidden='true'></span> <b> Concepto Insertado Correctamente </b> </center>";
	}


}