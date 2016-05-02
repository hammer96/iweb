<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Granja extends CI_Controller {
	
	public function index(){		
		$this->load->database('default');
		$this->load->model('granja_model');

		$Animales['animal']=$this->granja_model->MostrarAnimal();
		foreach ($Animales['animal'] as $key => $value) {
			$Animales['animal'][$key]['eventos']=$this->granja_model->MostrarEventos($value['ani_id']);
		}
		$Eventos = $this->granja_model->Eventos();

		$TipoServicios = $this->granja_model->TipoServicios();

		$Reproductores = $this->granja_model->Reproductores();
		$CausaAbortos = $this->granja_model->CausaAbortos();

		$EspMuerte = $this->granja_model->EspMuerte();

		$EspVenta = $this->granja_model->EspVenta();

		$MedGenital = $this->granja_model->MedGenital();
		$CausaNoInse = $this->granja_model->CausaNoInse();
		$ViaAplicaciones = $this->granja_model->ViaAplicaciones();

		$TipoPartos = $this->granja_model->TipoPartos();
		$EstadoCrias = $this->granja_model->EstadoCrias();

		$MedCuartos = $this->granja_model->MedCuartos();

		$this->load->view("Granja/index.php",compact("Animales","Eventos","TipoServicios","Reproductores",     "CausaAbortos","EspMuerte","EspVenta","MedGenital","CausaNoInse","ViaAplicaciones","TipoPartos","EstadoCrias","MedCuartos"));
	}
	
	public function Guardar(){
		$this->load->database('default');
		$this->load->model('granja_model');

		if ($this->input->post("id")=="") {
			$guardarEvento= $this->granja_model->Insertar();
			if ($guardarEvento==1) { 
				echo "SuccessI";
			}else{
				echo "ErrorI";
			}
		}else{
			$modificarEvento= $this->granja_model->Modificar();
			if ($modificarEvento==1) {
				echo "SuccessM";
			}else{
				echo "ErrorM";
			}
		}		
	}

	public function modificar(){
		$this->load->database('default');
		$this->load->model('granja_model');

		$listaEvento= $this->granja_model->ListarEvento($this->input->post("refevento_id"),$this->input->post("evento"));
		echo json_encode($listaEvento);
	}

}