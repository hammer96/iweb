<?php
	class Secado_Model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function listar()
		{
			return $this->db->query("SELECT s.sec_id,s.sec_fecha,mcm.mdm_descripcion,a.ani_rp FROM secado as s
			inner join animales as a on (s.sec_animal=a.ani_id)
			inner join med_cuartos_mamarios as mcm on (mcm.mdm_id=sec_med_cuartos_mamarios)
			where s.sec_estado=1 order by s.sec_id desc
			")->result();
		}
	}
?>