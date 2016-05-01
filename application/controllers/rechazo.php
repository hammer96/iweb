<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once "controlador_base.php";

class Rechazo extends Controlador_Base {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("rechazo_model");
		$this->load->model('modelo_base');
	}


	public function index()
	{
		$controlador = get_class($this);
		$view = $controlador."/index";
		$causa_rechazo = $this->db->get_where("causa_rechazo",array("car_estado"=>"1"))->result();
		$animal = $this->db->get_where("animales",array("ani_estado"=>"1"))->result();
		$data["causa_rechazo"] = $this->desencriptar($causa_rechazo,["car_id","car_descripcion"]);
		$data["animal"] = $this->desencriptar($animal,["ani_id","ani_nombre"]);
		$data["rechazo"] = $this->rechazo_model->listar();
		$data["scripts"] = $this->cargar_js(["rechazo.js"]);
		parent::index($view,$data);
	}

	public function guardar()
	{
		if ($this->input->post("id")=="") {
			$campos = array("rec_animal","rec_causa_rechazo","rec_fecha");
			$r = $this->modelo_base->insertar("rechazo",$campos);
			echo $this->tabla_ajax()."|".$r;
		}else{
			$campos = array("rec_animal","rec_causa_rechazo");
			$r= $this->modelo_base->modificar("rechazo",$campos,"rec_id");
			echo $this->tabla_ajax()."|".$r;
		}
	}

	public function modificar(){
		echo json_encode($this->db->get_where("rechazo",
			array("rec_estado"=>"1","rec_id"=>$this->input->post("id")))->row());
	}

	public function eliminar(){
		$estado = $this->modelo_base->eliminar(["rechazo","rec_id","rec_estado"]);
		echo $this->tabla_ajax()."|".$estado;
	}


	public function tabla_ajax()
	{
		$r = $this->rechazo_model->listar();
		$html = "";
		if(count($r)>0) {
			foreach ($r as $value) {

		$html .= '<tr>
			<td class="center">'.$value->rec_id.'</td>
			<td class="center">'.$value->ani_rp.'</td>
			<td class="center">'.$value->car_descripcion.'</td>
			<td class="center">'.$value->rec_fecha.'</td>
			<td class="center">
				<button id="modificar" class="sb-toggle btn btn-warning btn-xs" rec_id="'.$value->rec_id.'" ><i class="fa fa-edit"></i></button>
				<button id="eliminar" class="btn btn-danger btn-xs" rec_id="'.$value->rec_id.'"><i class="fa fa-times"></i></button>
			</td>
		</tr>';  }
		}
		echo $html;
	}

}