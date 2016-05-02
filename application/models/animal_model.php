<?php
	class animal_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		
		function MostrarAnimales(){			
			$query = $this->db->query("select a.*,tp.tiporeg_descripcion as ani_tiporegi, r.raz_descripcion as ani_raza from animales as a inner join tipo_registro as tp on(a.ani_tiporeg=tp.tiporeg_id) inner join raza as r on(a.ani_raza=r.raz_id) where a.ani_estado=1"
			);
			return $query->result();
		}

		function Razas(){
			$query = $this->db->get_where('raza', array('raz_estado' => 1));
			return $query->result();
		}

		function Insertar(){
			$file=$_FILES['imagen']['name'];
			move_uploaded_file($_FILES["imagen"]["tmp_name"],'./Librerias/assets/images/'.$file);

			$config['upload_path'] = './Librerias/assets/images/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
				
			$this->load->library('upload', $config);
			$this->upload->do_upload("imagen");
			$icono = $this->upload->data();

			$data = array(
	            "ani_rp"=>$_POST["ani_rp"],
	            "ani_nombre" => $_POST["ani_nombre"],
	            "ani_padre" => $_POST["ani_padre"],
	            "ani_madre"=> $_POST["ani_madre"],
	            "ani_fechanac" => $_POST["ani_fechanac"],
	            "ani_fechareg" => date('d-m-Y'),
	            "ani_sexo" => $_POST["ani_sexo"],
	            "ani_tiporeg" => $_POST["ani_tiporeg"],
	            "ani_raza"=> $_POST["ani_raza"],
	            "ani_foto" => $file,
	            "ani_descripcion" => $_POST["ani_descripcion"],
	            "ani_proveedor" => $_POST["ani_proveedor"]
	        );
			$estado= $this->db->insert('animales', $data);

			if ($estado==1) {
				return 1;
			}else{
				return 0;
			}
		}

		function ListarAnimal($ani_id){
			$query = $this->db->get_where('animales', array('ani_id' => $ani_id));
			return $query->result();
		}

		function Modificar(){
			$file=$_FILES['imagen']['name'];
			move_uploaded_file($_FILES["imagen"]["tmp_name"],'./Librerias/assets/images/'.$file);

			$config['upload_path'] = './Librerias/assets/images/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
				
			$this->load->library('upload', $config);
			$this->upload->do_upload("imagen");
			$icono = $this->upload->data();

			$data = array(
	            "ani_rp"=>$_POST["ani_rp"],
	            "ani_nombre" => $_POST["ani_nombre"],
	            "ani_padre" => $_POST["ani_padre"],
	            "ani_madre"=> $_POST["ani_madre"],
	            "ani_fechanac" => $_POST["ani_fechanac"],
	            "ani_fechareg" => date('d-m-Y'),
	            "ani_sexo" => $_POST["ani_sexo"],
	            "ani_tiporeg" => $_POST["ani_tiporeg"],
	            "ani_raza"=> $_POST["ani_raza"],
	            "ani_foto" => $file,
	            "ani_descripcion" => $_POST["ani_descripcion"],
	            "ani_proveedor" => $_POST["ani_proveedor"]
	        );
			$this->db->where('ani_id', $_POST["idani"]);
			$estado= $this->db->update('animales', $data); 
			if ($estado==1) {
				return 1;
			}else{
				return 0;
			}
		}

		function Eliminar($ani_id){
			$data = array(
               'ani_estado' => 0
            );
			$this->db->where('ani_id', $ani_id);
			$estado= $this->db->update('animales', $data); 
			if ($estado==1) {
				return 1;
			}else{
				return 0;
			}
		}
	}
?>