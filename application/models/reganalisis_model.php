<?php
	class Reganalisis_Model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		public function listar()
		{
			return $this->db->query("SELECT ra.rga_id,ra.rga_fecha,a.ani_rp,re.res_descripcion,ta.tpa_descripcion FROM registro_analisis as ra
				inner join animales as a on(ra.rga_animal=a.ani_id)
				inner join resultado_analisis as re on(re.res_id=ra.rga_resultado_analisis)
				inner join tipo_analisis as ta on(ta.tpa_id=ra.rga_tipo_analisis)
				where ra.rga_estado=1
				order by ra.rga_id desc")->result();
		}
	}
?>