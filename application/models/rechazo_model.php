<?php
	class Rechazo_Model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function listar()
		{
			return $this->db->query("SELECT r.rec_id,r.rec_fecha,a.ani_rp,cr.car_descripcion FROM rechazo as r
			inner join animales as a on(r.rec_animal=a.ani_id)
			inner join causa_rechazo as cr on(r.rec_causa_rechazo=cr.car_id)
			where r.rec_estado=1 order by r.rec_id desc")->result();
		}
	}
?>