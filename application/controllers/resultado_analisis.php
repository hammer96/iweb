<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once "controlador_base.php";

class Resultado_Analisis extends Controlador_Base {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('modelo_base');
	}

	public function index()
	{
		$controlador = get_class($this);
		$view = $controlador."/index";
		$data["resultado_analisis"] = $this->db->get_where("resultado_analisis",array("res_estado"=>"1"))->result();
		$data["scripts"] = $this->cargar_js(["resultado_analisis.js"]);
		parent::index($view,$data);
	}

	public function guardar()
	{
		$campos = array("res_descripcion","res_abreviatura");
		if ($this->input->post("id")=="") {
			$r = $this->modelo_base->insertar("resultado_analisis",$campos);
			echo $this->tabla_ajax()."|".$r;
		}else{
			$r= $this->modelo_base->modificar("resultado_analisis",$campos,"res_id");
			echo $this->tabla_ajax()."|".$r;
		}
	}

	public function modificar(){
		echo json_encode($this->db->get_where("resultado_analisis",
			array("res_estado"=>"1","res_id"=>$this->input->post("id")))->row());
	}

	public function eliminar(){
		$estado = $this->modelo_base->eliminar(["resultado_analisis","res_id","res_estado"]);
		echo $this->tabla_ajax()."|".$estado;
	}

	public function tabla_ajax()
	{
		$r = $this->db->get_where("resultado_analisis",array("res_estado"=>"1"))->result();
		$html = "";
		if(count($r)>0) {
			foreach ($r as $value) {

		$html .= '<tr>
					<td class="center">'.$value->res_id.'</td>
					<td class="center">'.$value->res_descripcion.'</td>
					<td class="center">'.$value->res_abreviatura.'</td>

					<td class="center">
						<button id="modificar" class="sb-toggle btn btn-warning btn-xs" rec_id="'.$value->res_id.'" ><i class="fa fa-edit"></i></button>
						<button id="eliminar" class="btn btn-danger btn-xs" rec_id="'.$value->res_id.'"><i class="fa fa-times" ></i></button>
					</td>
				</tr>';  }
		}
		echo $html;
	}

}