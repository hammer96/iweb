
<div class="row">
	<div class="col-sm-12">
		<div class="breadcrumb">
			<div style="margin-top:-9px;"></div>
			<center><h4>
				<i class="fa fa-file-text-o"></i> Tipo de Parto - Granja Tarapoto
			</h4></center>
		</div>
	</div>
</div> <br><br>

			<div class="row">
					<div class="col-sm-12">
						<button type="button" class="sb-toggle btn btn-teal nuevo">
							<i class="fa fa-plus"></i> Nuevo Registro
						</button>
						<div style="margin-top:-30px;"></div>
						<table class="table table-bordered table-hover table-full-width" id="sample_1">
							<thead>
								<tr>
									<th class="center"># Codigo</th>
									<th class="center">Descripcion</th>
									<th class="center">Abreviatura</th>
									<th class="center">Accion</th>
								</tr>
							</thead>
							<tbody id="data_body">
								<?php
									if(count($tipo_parto)>0) {
										foreach ($tipo_parto as $value) {

									echo '<tr>
										<td class="center">'.$value->tpa_id.'</td>
										<td class="center">'.$value->tpa_descripcion.'</td>
										<td class="center">'.$value->tpa_abreviatura.'</td>

										<td class="center">
											<button id="modificar" class="sb-toggle btn btn-warning btn-xs" rec_id="'.$value->tpa_id.'" ><i class="fa fa-edit"></i></button>
											<button id="eliminar" class="btn btn-danger btn-xs" rec_id="'.$value->tpa_id.'"><i class="fa fa-times" ></i></button>
										</td>
									</tr>';  } } ?>
							</tbody>
						</table>
					</div>
				</div>



		<!-- Mensaje Correcto-->
	    <div id="Alert" class="modal fade" data-width="369" style="display: none;">
	        <div class="row" id="Mensaje">
			    <center>
			    	<h4 class="modal-title">
			        	<div class="col-md-2" id="iconomensaje">
			        	</div>
				        <div class="col-md-10" id="textomensaje">
			        	</div>
				    </h4> Sistema Granja Tarapoto <br><br>
				    <button type="button" data-dismiss="modal" class="btn btn-teal" onclick="actualizar()">
				        <i class="fa fa-times"></i> Ok. Cerrar
				    </button>
				</center>
			</div>
	    </div>

		<div id="page-sidebar">
			<a class="sidebar-toggler sb-toggle" href="#"><i class="fa fa-indent"></i></a>
			<div class="sidebar-wrapper">
				<ul class="nav nav-tabs nav-justified" id="sidebar-tab">
					<li class="active" style="font-size:18px;padding:5px;">
						<a href="#users" role="tab" data-toggle="tab"><i class="fa fa-list"></i> Registro Tipo Parto</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="users">
						<div class="panel panel-default">
							<div class="panel-body">
								<form class="form-horizontal" id="form"> <br>

									<input type="hidden" name="id" id="id">
									<div class="form-group">
										<label class="col-sm-3 control-label">Descripcion</label>
										<div class="col-sm-9">
											<?php echo form_input('tpa_descripcion',"",'id="tpa_descripcion" class="form-control" required'); ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Abreviatura</label>
										<div class="col-sm-9">
											<?php echo form_input('tpa_abreviatura',"", 'id="tpa_abreviatura" class="form-control" required'); ?>
										</div>
									</div>
									<br>

									<div class="form-group"> <center>
										<button type="button" class="btn btn-teal" onclick="return validar(this.form);">
											<i class="fa fa-save"></i> Guardar
										</button>
										<button type="button" class="sb-toggle btn btn-danger cancelar" >
											<i class="fa fa-times"></i> Cancelar
										</button>
									</center> </div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>