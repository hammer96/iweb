<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once "controlador_base.php";

class Registro_Analisis extends Controlador_Base {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("reganalisis_model");
		$this->load->model('modelo_base');
	}


	public function index()
	{
		$controlador = get_class($this);
		$view = $controlador."/index";
		$resultado_analisis = $this->db->get_where("resultado_analisis",array("res_estado"=>"1"))->result();
		$tipo_analisis = $this->db->get_where("tipo_analisis",array("tpa_estado"=>"1"))->result();
		$animal = $this->db->get_where("animales",array("ani_estado"=>"1"))->result();
		$data["resultado_analisis"] = $this->desencriptar($resultado_analisis,["res_id","res_descripcion"]);
		$data["tipo_analisis"] = $this->desencriptar($tipo_analisis,["tpa_id","tpa_descripcion"]);
		$data["animal"] = $this->desencriptar($animal,["ani_id","ani_nombre"]);
		$data["registro_analisis"] = $this->reganalisis_model->listar();
		$data["scripts"] = $this->cargar_js(["registro_analisis.js"]);
		parent::index($view,$data);
	}

	public function guardar()
	{
		if ($this->input->post("id")=="") {
			$campos = array("rga_animal","rga_tipo_analisis","rga_resultado_analisis","rga_fecha");
			$r = $this->modelo_base->insertar("registro_analisis",$campos);
			echo $this->tabla_ajax()."|".$r;
		}else{
			$campos = array("rga_animal","rga_tipo_analisis","rga_resultado_analisis");
			$r= $this->modelo_base->modificar("registro_analisis",$campos,"rga_id");
			echo $this->tabla_ajax()."|".$r;
		}
	}

	public function modificar(){
		echo json_encode($this->db->get_where("registro_analisis",
			array("rga_estado"=>"1","rga_id"=>$this->input->post("id")))->row());
	}

	public function eliminar(){
		$estado = $this->modelo_base->eliminar(["registro_analisis","rga_id","rga_estado"]);
		echo $this->tabla_ajax()."|".$estado;
	}


	public function tabla_ajax()
	{
		$r = $this->reganalisis_model->listar();
		$html = "";
		if(count($r)>0) {
			foreach ($r as $value) {

		$html .= '<tr>
					<td class="center">'.$value->rga_id.'</td>
					<td class="center">'.$value->ani_rp.'</td>
					<td class="center">'.$value->res_descripcion.'</td>
					<td class="center">'.$value->tpa_descripcion.'</td>
					<td class="center">'.$value->rga_fecha.'</td>
					<td class="center">
						<button id="modificar" class="sb-toggle btn btn-warning btn-xs" rec_id="'.$value->rga_id.'" ><i class="fa fa-edit"></i></button>
						<button id="eliminar" class="btn btn-danger btn-xs" rec_id="'.$value->rga_id.'"><i class="fa fa-times" ></i></button>
					</td>
				</tr>';  }
		}
		echo $html;
	}

}