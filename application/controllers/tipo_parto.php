<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once "controlador_base.php";

class Tipo_Parto extends Controlador_Base {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('modelo_base');
	}

	public function index()
	{
		$controlador = get_class($this);
		$view = $controlador."/index";
		$data["tipo_parto"] = $this->db->get_where("tipo_parto",array("tpa_estado"=>"1"))->result();
		$data["scripts"] = $this->cargar_js(["tipo_parto.js"]);
		parent::index($view,$data);
	}

	public function guardar()
	{
		$campos = array("tpa_descripcion","tpa_abreviatura");
		if ($this->input->post("id")=="") {
			$r = $this->modelo_base->insertar("tipo_parto",$campos);
			echo $this->tabla_ajax()."|".$r;
		}else{
			$r= $this->modelo_base->modificar("tipo_parto",$campos,"tpa_id");
			echo $this->tabla_ajax()."|".$r;
		}
	}

	public function modificar(){
		echo json_encode($this->db->get_where("tipo_parto",
			array("tpa_estado"=>"1","tpa_id"=>$this->input->post("id")))->row());
	}

	public function eliminar(){
		$estado = $this->modelo_base->eliminar(["tipo_parto","tpa_id","tpa_estado"]);
		echo $this->tabla_ajax()."|".$estado;
	}


	public function tabla_ajax()
	{
		$r = $this->db->get_where("tipo_parto",array("tpa_estado"=>"1"))->result();
		$html = "";
		if(count($r)>0) {
			foreach ($r as $value) {

		$html .= '<tr>
					<td class="center">'.$value->tpa_id.'</td>
					<td class="center">'.$value->tpa_descripcion.'</td>
					<td class="center">'.$value->tpa_abreviatura.'</td>

					<td class="center">
						<button id="modificar" class="sb-toggle btn btn-warning btn-xs" rec_id="'.$value->tpa_id.'" ><i class="fa fa-edit"></i></button>
						<button id="eliminar" class="btn btn-danger btn-xs" rec_id="'.$value->tpa_id.'"><i class="fa fa-times" ></i></button>
					</td>
				</tr>';  }
		}
		echo $html;
	}

}