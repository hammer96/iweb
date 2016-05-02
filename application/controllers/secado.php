<?php if ( ! defined('BASEPATH')) exit('No dimdmt script access allowed');

include_once "controlador_base.php";

class Secado extends Controlador_Base {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("secado_model");
		$this->load->model('modelo_base');
	}


	public function index()
	{
		$controlador = get_class($this);
		$view = $controlador."/index";
		$med_cuartos_mamarios = $this->db->get_where("med_cuartos_mamarios",array("mdm_estado"=>"1"))->result();
		$animal = $this->db->get_where("animales",array("ani_estado"=>"1"))->result();
		$data["med_cuartos_mamarios"] = $this->desencriptar($med_cuartos_mamarios,["mdm_id","mdm_descripcion"]);
		$data["animal"] = $this->desencriptar($animal,["ani_id","ani_nombre"]);
		$data["secado"] = $this->secado_model->listar();
		$data["scripts"] = $this->cargar_js(["secado.js"]);
		parent::index($view,$data);
	}

	public function guardar()
	{
		if ($this->input->post("id")=="") {
			$campos = array("sec_animal","sec_med_cuartos_mamarios","sec_fecha");
			$r = $this->modelo_base->insertar("secado",$campos);
			echo $this->tabla_ajax()."|".$r;
		}else{
			$campos = array("sec_animal","sec_cuartos_mamarios");
			$r= $this->modelo_base->modificar("secado",$campos,"sec_id");
			echo $this->tabla_ajax()."|".$r;
		}
	}

	public function modificar(){
		echo json_encode($this->db->get_where("secado",
			array("sec_estado"=>"1","sec_id"=>$this->input->post("id")))->row());
	}

	public function eliminar(){
		$estado = $this->modelo_base->eliminar(["secado","sec_id","sec_estado"]);
		echo $this->tabla_ajax()."|".$estado;
	}


	public function tabla_ajax()
	{
		$r = $this->secado_model->listar();
		$html = "";
		if(count($r)>0) {
			foreach ($r as $value) {

		$html .= '<tr>
			<td class="center">'.$value->sec_id.'</td>
			<td class="center">'.$value->ani_rp.'</td>
			<td class="center">'.$value->mdm_descripcion.'</td>
			<td class="center">'.$value->sec_fecha.'</td>
			<td class="center">
				<button id="modificar" class="sb-toggle btn btn-warning btn-xs" mdm_id="'.$value->sec_id.'" ><i class="fa fa-edit"></i></button>
				<button id="eliminar" class="btn btn-danger btn-xs" mdm_id="'.$value->sec_id.'"><i class="fa fa-times"></i></button>
			</td>
		</tr>';  }
		}
		echo $html;
	}

}