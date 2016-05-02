<?php
	class granja_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		
		function Eventos(){
			$query = $this->db->get_where('evento', array('eve_estado' => 1));
			return $query->result();
		}

		function TipoServicios(){
			$query = $this->db->get_where('tipo_servicio', array('tps_estado' => 1));
			return $query->result();
		}

		function Reproductores(){
			$query = $this->db->get_where('reproductor', array('rep_estado' => 1));
			return $query->result();
		}

		function CausaAbortos(){
			$query = $this->db->get_where('causa_aborto', array('cab_estado' => 1));
			return $query->result();
		}

		function EspMuerte(){
			$query = $this->db->get_where('especificacion_de_muerte', array('edm_estado' => 1));
			return $query->result();
		}

		function EspVenta(){
			$query = $this->db->get_where('especificacion_de_venta', array('edv_estado' => 1));
			return $query->result();
		}

		function MedGenital(){
			$query = $this->db->get_where('medicina_genital', array('mdg_estado' => 1));
			return $query->result();
		}

		function CausaNoInse(){
			$query = $this->db->get_where('causa_no_inseminal', array('cni_estado' => 1));
			return $query->result();
		}

		function ViaAplicaciones(){
			$query = $this->db->get_where('via_aplicacion', array('vap_estado' => 1));
			return $query->result();
		}

		function TipoPartos(){
			$query = $this->db->get_where('tipo_parto', array('tpa_estado' => 1));
			return $query->result();
		}

		function EstadoCrias(){
			$query = $this->db->get_where('estado_cria', array('etc_estado' => 1));
			return $query->result();
		}

		function MedCuartos(){
			$query = $this->db->get_where('med_cuartos_mamarios', array('mdm_estado' => 1));
			return $query->result();
		}

		function MostrarAnimal(){
			$query = $this->db->get_where('animales', array('ani_estado' => 1));
			return $query->result_array();
		}

		function MostrarEventos($ani_id){
			$query = $this->db->query("select ea.*,e.*from animales as a inner join eventoanimal as ea on(a.ani_id=ea.eveani_animal) inner join evento as e on (e.eve_id=ea.eveani_evento) 
				where a.ani_id=".$ani_id
			);
			return $query->result_array();
		}

		function Insertar(){

			// Grabamos Un Parto
			if ($_POST["evento"]==1) {
				$data = array(
	               'par_animal' => $_POST["ani_id"],
	               'par_rp' => $_POST["rpparto"],
	               'par_tipo_parto' => $_POST["tipoparto"],
	               'par_estado_cria' => $_POST["estadocria"],
	               'par_fecha' => $_POST["fechaevento"]
	            );
				$estado= $this->db->insert('parto', $data);
			}
			// Grabamos Un Aborto
			if ($_POST["evento"]==2) {
				$data = array(
	               'abo_animal' => $_POST["ani_id"],
	               'abo_causaaborto' => $_POST["causaaborto"],
	               'abo_fecha' => $_POST["fechaevento"]
	            );
				$estado= $this->db->insert('aborto', $data);
			}
			// Grabamos Un Celo
			if ($_POST["evento"]==3) {
				$data = array(
	               'cel_animal' => $_POST["ani_id"],
	               'cel_causa_no_inseminal' => $_POST["causanoinse"],
	               'cel_medicina_genital' => $_POST["medgenital"],
	               'cel_via_aplicacion' => $_POST["viaaplica"],
	               'cel_fecha' => $_POST["fechaevento"]
	            );
				$estado= $this->db->insert('celo', $data);
			}
			// Grabamos Un Servicio
			if ($_POST["evento"]==4) {
				$data = array(
	               'ser_animal' => $_POST["ani_id"],
	               'ser_reproductor' => $_POST["reproductor"],
	               'ser_personal' => 1,
	               'ser_tipo_servicio' => $_POST["tiposervicio"],
	               'ser_fecha' => $_POST["fechaevento"]
	            );
				$estado= $this->db->insert('servicio', $data);
			}
			// Grabamos Una Muerte
			if ($_POST["evento"]==5) {
				$data = array(
	               'mue_animal' => $_POST["ani_id"],
	               'mue_espec_muerte' => $_POST["espmuerte"],
	               'mue_fecha' => $_POST["fechaevento"]
	            );
				$estado= $this->db->insert('muerte', $data);
			}
			// Grabamos Una Venta
			if ($_POST["evento"]==6) {
				$data = array(
	               'ven_animal' => $_POST["ani_id"],
	               'ven_especificacion_venta' => $_POST["espventa"],
	               'ven_fecha' => $_POST["fechaevento"]
	            );
				$estado= $this->db->insert('venta', $data);
			}
			// Grabamos Un Secado
			if ($_POST["evento"]==7) {
				$data = array(
	               'sec_animal' => $_POST["ani_id"],
	               'sec_med_cuartos_mamarios' => $_POST["medcuartosm"],
	               'sec_fecha' => $_POST["fechaevento"]
	            );
				$estado= $this->db->insert('secado', $data);
			}

			// Grabamos en la tabla evento animal
			$idrefevento = $this->db->insert_id();
			$data = array(
               'eveani_animal' => $_POST["ani_id"],
               'eveani_evento' => $_POST["evento"],
               'eveani_fecha' => $_POST["fechaevento"],
               'eveani_refevento' => $idrefevento
            );
			$estado= $this->db->insert('eventoanimal', $data);

			if ($estado==1) {
				return 1;
			}else{
				return 0;
			}
		}

		function ListarEvento($refevento_id,$evento){
			// El evento es un parto
			if($evento==1){
				$query = $this->db->get_where('parto', array('par_id' => $refevento_id));
			}
			// El evento es un aborto
			if($evento==2){
				$query = $this->db->get_where('aborto', array('abo_id' => $refevento_id));
			}
			// El evento es un celo
			if($evento==3){
				$query = $this->db->get_where('celo', array('cel_id' => $refevento_id));
			}
			// El evento es un servicio
			if($evento==4){
				$query = $this->db->get_where('servicio', array('ser_id' => $refevento_id));
			}
			// El evento es una muerte
			if($evento==5){
				$query = $this->db->get_where('muerte', array('mue_id' => $refevento_id));
			}
			// El evento es una venta
			if($evento==6){
				$query = $this->db->get_where('venta', array('ven_id' => $refevento_id));
			}
			// El evento es una secado
			if($evento==7){
				$query = $this->db->get_where('secado', array('sec_id' => $refevento_id));
			}
			
			return $query->result();	
		}

		function Modificar(){
			// Actualizamos Un Parto
			if ($_POST["evento"]==1) {
				$data = array(
	               'par_rp' => $_POST["rpparto"],
	               'par_tipo_parto' => $_POST["tipoparto"],
	               'par_estado_cria' => $_POST["estadocria"],
	               'par_fecha' => $_POST["fechaevento"]
	            );
				$this->db->where('par_id', $_POST["refevento"]);
				$estado= $this->db->update('parto', $data);
			}
			// Actualizamos Un Servicio
			if ($_POST["evento"]==2) {
				$data = array(
	               'abo_causaaborto' => $_POST["causaaborto"],
	               'abo_fecha' => $_POST["fechaevento"]
	            );
				$this->db->where('abo_id', $_POST["refevento"]);
				$estado= $this->db->update('aborto', $data);
			}
			// Actualizamos Un Celo
			if ($_POST["evento"]==3) {
				$data = array(
	               'cel_causa_no_inseminal' => $_POST["causanoinse"],
	               'cel_medicina_genital' => $_POST["medgenital"],
	               'cel_via_aplicacion' => $_POST["viaaplica"],
	               'cel_fecha' => $_POST["fechaevento"]
	            );
				$this->db->where('cel_id', $_POST["refevento"]);
				$estado= $this->db->update('celo', $data);
			}
			// Actualizamos Un Servicio
			if ($_POST["evento"]==4) {
				$data = array(
	               'ser_reproductor' => $_POST["reproductor"],
	               'ser_tipo_servicio' => $_POST["tiposervicio"],
	               'ser_fecha' => $_POST["fechaevento"]
	            );
				$this->db->where('ser_id', $_POST["refevento"]);
				$estado= $this->db->update('servicio', $data); 
			}
			// Actualizamos Una muerte
			if ($_POST["evento"]==5) {
				$data = array(
	               'mue_espec_muerte' => $_POST["espmuerte"],
	               'mue_fecha' => $_POST["fechaevento"]
	            );
				$this->db->where('mue_id', $_POST["refevento"]);
				$estado= $this->db->update('muerte', $data); 
			}
			// Actualizamos Una muerte
			if ($_POST["evento"]==6) {
				$data = array(
	               'ven_especificacion_venta' => $_POST["espventa"],
	               'ven_fecha' => $_POST["fechaevento"]
	            );
				$this->db->where('ven_id', $_POST["refevento"]);
				$estado= $this->db->update('venta', $data); 
			}
			// Actualizamos Un Secado
			if ($_POST["evento"]==7) {
				$data = array(
	               'sec_med_cuartos_mamarios' => $_POST["medcuartosm"],
	               'sec_fecha' => $_POST["fechaevento"]
	            );
				$this->db->where('sec_id', $_POST["refevento"]);
				$estado= $this->db->update('secado', $data); 
			}
			// Actualizamos en la tabla evento animal
			$data = array(
               'eveani_fecha' => $_POST["fechaevento"]
            );
            $this->db->where('eveani_id', $_POST["id"]);
			$estado= $this->db->update('eventoanimal', $data);

			if ($estado==1) {
				return 1;
			}else{
				return 0;
			}
		}
	}
?>