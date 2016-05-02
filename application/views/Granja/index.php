<!DOCTYPE html>
<html lang="en">
	<head>
		<title>GRANJA TARAPOTO</title>
		<meta charset="utf-8" />		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

		<?php include("Librerias/fuente/libcss.php"); ?>
	</head>
	<body>	
		<!-- Cabecera Del Sistema-->	
		<?php include("Librerias/fuente/cabecera.php"); ?>

		<div class="main-container">
			<!-- Menu Del Sistema-->
			<?php include("Librerias/fuente/menu.php"); ?>

			<!-- Todo el contenido -->
			<div class="main-content">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="breadcrumb">
								<div style="margin-top:-9px;"></div>
								<center><h4>
									<i class="fa fa-calendar"></i> Calendario - Granja Tarapoto
								</h4></center>
							</div>
						</div>
					</div> <br><br>

					<div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-calendar"></i>
                                <center>
                                	<button type="button" class="btn btn-default btn-xs"><i class="fa fa fa-arrow-circle-left"></i></button>
                                    Calendario de control de animales - AÑO 2016
                                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa fa-arrow-circle-right"></i></button>
                                </center>
                                <div class="panel-tools">
                                    <a class="btn btn-xs btn-link panel-collapse collapses" href="#"></a>
                                    <a class="btn btn-xs btn-link panel-refresh" href="#">
                                        <i class="fa fa-refresh"></i>
                                    </a>
                                    <a class="btn btn-xs btn-link panel-expand" href="#">
                                        <i class="fa fa-resize-full"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover" id="calendario" >
                                    <thead>
                                        <tr>
                                            <th class="center">RP</th>
                                            <th class="center">Nombre</th>
                                            <th class="center">Ene</th>
                                            <th class="center">Feb</th>
                                            <th class="center">Mar</th>
                                            <th class="center">Abr</th>
                                            <th class="center">May</th>
                                            <th class="center">Jun</th>
                                            <th class="center">Jul</th>
                                            <th class="center">Ago</th>
                                            <th class="center">Sep</th>
                                            <th class="center">Oct</th>
                                            <th class="center">Nov</th>
                                            <th class="center">Dic</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach ($Animales['animal'] as $key => $animal) { ?> <tr>
                                                <td class="center" ><?php echo $animal['ani_id']." / ".$animal['ani_rp'] ?></td>
                                                <td class="center" ><?php echo $animal['ani_nombre'] ?></td>

                                                <!-- Enero-->
                                                <td class="sb-toggle center">
                                                	<?php foreach ($animal['eventos'] as $key => $evento) { 
                                                		$fecha=explode("-",$evento['eveani_fecha']);
	                                                	if ($fecha[1]=="01") { ?>
		                                                	<i class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top"  id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                                		<span class="diaevento" ><?php echo $fecha[2]?></span>
		                                                	</i>
	                                                	<?php } 
	                                                } ?>
	                                            </td>
	                                            <!-- Febrero -->
                                                <td class="sb-toggle center">
                                                	<?php foreach ($animal['eventos'] as $key => $evento) { 
                                                		$fecha=explode("-",$evento['eveani_fecha']);
	                                                	if ($fecha[1]=="02") { ?>
		                                                	<i class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top" id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                                		<span class="diaevento" ><?php echo $fecha[2]?></span>
		                                                	</i>
	                                                	<?php } 
	                                                } ?>
	                                            </td>
	                                            <!-- Marzo -->
                                                <td class="sb-toggle center">
                                                	<?php foreach ($animal['eventos'] as $key => $evento) { 
                                                		$fecha=explode("-",$evento['eveani_fecha']);
	                                                	if ($fecha[1]=="03") { ?>
		                                                	<i class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top"  id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                                		<span class="diaevento" ><?php echo $fecha[2]?></span>
		                                                	</i>
	                                                	<?php } 
	                                                } ?>
	                                            </td>
	                                            <!-- Abril -->
                                                <td class="sb-toggle center">
                                                	<?php foreach ($animal['eventos'] as $key => $evento) { 
                                                		$fecha=explode("-",$evento['eveani_fecha']);
	                                                	if ($fecha[1]=="04") { ?>
		                                                	<i class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top"  id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                                		<span class="diaevento" ><?php echo $fecha[2]?></span>
		                                                	</i>
	                                                	<?php } 
	                                                } ?>
	                                            </td>
	                                            <!-- Mayo -->
                                                <td class="sb-toggle center">
                                                	<?php foreach ($animal['eventos'] as $key => $evento) { 
                                                		$fecha=explode("-",$evento['eveani_fecha']);
	                                                	if ($fecha[1]=="05") { ?>
		                                                	<i class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top"  id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                                		<span class="diaevento" ><?php echo $fecha[2]?></span>
		                                                	</i>
	                                                	<?php } 
	                                                } ?>
	                                            </td>
	                                            <!-- Junio -->
                                                <td class="sb-toggle center">
                                                	<?php foreach ($animal['eventos'] as $key => $evento) { 
                                                		$fecha=explode("-",$evento['eveani_fecha']);
	                                                	if ($fecha[1]=="06") { ?>
		                                                	<i class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top"  id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                                		<span class="diaevento" ><?php echo $fecha[2]?></span>
		                                                	</i>
	                                                	<?php } 
	                                                } ?>
	                                            </td>
	                                            <!-- Julio -->
                                                <td class="sb-toggle center">
                                                	<?php foreach ($animal['eventos'] as $key => $evento) { 
                                                		$fecha=explode("-",$evento['eveani_fecha']);
	                                                	if ($fecha[1]=="07") { ?>
		                                                	<i class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top" id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                                		<span class="diaevento" ><?php echo $fecha[2]?></span>
		                                                	</i>
	                                                	<?php } 
	                                                } ?>
	                                            </td>
	                                            <!-- Agosto -->
                                                <td class="sb-toggle center">
                                                	<?php foreach ($animal['eventos'] as $key => $evento) { 
                                                		$fecha=explode("-",$evento['eveani_fecha']);
	                                                	if ($fecha[1]=="08") { ?>
		                                                	<i class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top"  id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                                		<span class="diaevento" ><?php echo $fecha[2]?></span>
		                                                	</i>
	                                                	<?php } 
	                                                } ?>
	                                            </td>
												<!-- Septiembre -->
                                                <td class="sb-toggle center">
                                                	<?php foreach ($animal['eventos'] as $key => $evento) { 
                                                		$fecha=explode("-",$evento['eveani_fecha']);
	                                                	if ($fecha[1]=="09") { ?>
		                                                	<i class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top"  id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                                		<span class="diaevento" ><?php echo $fecha[2]?></span>
		                                                	</i>
	                                                	<?php } 
	                                                } ?>
	                                            </td>
                                                <!-- Octubre -->
                                                <td class="sb-toggle center">
                                                	<?php foreach ($animal['eventos'] as $key => $evento) { 
                                                		$fecha=explode("-",$evento['eveani_fecha']);
	                                                	if ($fecha[1]=="10") { ?>
		                                                	<i class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top" id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                                		<span class="diaevento" ><?php echo $fecha[2]?></span>
		                                                	</i>
	                                                	<?php } 
	                                                } ?>
	                                            </td>
	                                            <!-- Noviembre -->
                                                <td class="sb-toggle center">
                                                	<?php foreach ($animal['eventos'] as $key => $evento) { 
                                                		$fecha=explode("-",$evento['eveani_fecha']);
	                                                	if ($fecha[1]=="11") { ?>
		                                                	<i class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top"  id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                                		<span class="diaevento" ><?php echo $fecha[2]?></span>
		                                                	</i>
	                                                	<?php } 
	                                                } ?>
	                                            </td>
	                                            <!-- Diciembre -->
                                                <td class="sb-toggle center">
                                                	<?php foreach ($animal['eventos'] as $key => $evento) { 
                                                		$fecha=explode("-",$evento['eveani_fecha']);
	                                                	if ($fecha[1]=="12") { ?>
		                                                	<i class="tooltips <?php echo $evento['eve_simbolo'] ?>" data-original-title="<?php echo $evento['eve_descripcion'] ?>" data-placement="top"   id="simbolo" onclick="modificar('<?php echo $evento['eveani_refevento'] ?>','<?php echo $evento['eveani_evento'] ?>','<?php echo $evento['eveani_id'] ?>')">
		                                                		<span class="diaevento" ><?php echo $fecha[2]?></span>
		                                                	</i>
	                                                	<?php }
	                                                } ?>
	                                            </td>
                                            </tr> <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
				</div>
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
	    
		<!-- Para El Registro Nuevo-->
		<div id="page-sidebar">
			<a class="sidebar-toggler sb-toggle" href="#"><i class="fa fa-indent"></i></a>
			<div class="sidebar-wrapper">
				<ul class="nav nav-tabs nav-justified" id="sidebar-tab">
					<li class="active" style="font-size:18px;padding:5px;">
						<a href="#users" role="tab" data-toggle="tab"><i class="fa fa-list"></i> Registro Evento</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="users">
						<div class="panel panel-default">
							<div class="panel-body">
								<form class="form-horizontal" id="form_evento"> <br>
									<input type="hidden" id="id" name="id">
									<input type="hidden" id="refevento" name="refevento">
									<input type="hidden" id="ani_id" name="ani_id">
									<div class="form-group">
										<label class="col-sm-3 control-label" for="form-field-1">
											Evento
										</label>
										<div class="col-sm-9">
											<select class="form-control" id="evento" name="evento">
												<option value="evento">Seleccionar Evento</option>
												<?php 
													foreach($Eventos as $value){ ?>
														<option value="<?php echo $value->eve_id ?>"><?php echo $value->eve_descripcion ?></option>
													<?php }
												?>
											</select>
										</div>
									</div>
									<!-- Para Parto-->
									<div id="parto">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												RP Cria
											</label>
											<div class="col-sm-9">
												<input type="text" id="rpparto" name="rpparto" class="form-control">
											</div>
										</div> 
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Tipo Parto
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="tipoparto" name="tipoparto">
													<option value="tipoparto">Seleccionar Tipo Parto</option>
													<?php 
														foreach($TipoPartos as $value){ ?>
															<option value="<?php echo $value->tpa_id ?>"><?php echo $value->tpa_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Estado Cria
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="estadocria" name="estadocria">
													<option value="estadocria">Seleccionar Estado Cria</option>
													<?php 
														foreach($EstadoCrias as $value){ ?>
															<option value="<?php echo $value->etc_id ?>"><?php echo $value->etc_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>
									<!-- Para Aborto-->
									<div id="aborto">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Causa Aborto
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="causaaborto" name="causaaborto">
													<option value="causaaborto">Seleccionar Causa Aborto</option>
													<?php 
														foreach($CausaAbortos as $value){ ?>
															<option value="<?php echo $value->cab_id ?>"><?php echo $value->cab_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>	

									<!-- Para Celo-->
									<div id="celo">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Via Aplicacion
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="viaaplica" name="viaaplica">
													<option value="viaaplica">Seleccionar Via Aplicacion</option>
													<?php 
														foreach($ViaAplicaciones as $value){ ?>
															<option value="<?php echo $value->vap_id ?>"><?php echo $value->vap_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												C.No Inseminal
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="causanoinse" name="causanoinse">
													<option value="causanoinse">Seleccionar Causa No Insemial</option>
													<?php 
														foreach($CausaNoInse as $value){ ?>
															<option value="<?php echo $value->cni_id ?>"><?php echo $value->cni_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Med. Genital
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="medgenital" name="medgenital">
													<option value="medgenital">Seleccionar Medicina Genital</option>
													<?php 
														foreach($MedGenital as $value){ ?>
															<option value="<?php echo $value->mdg_id ?>"><?php echo $value->mdg_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>	

									<!-- Para Servicio-->
									<div id="servicio">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Tipo Servicio
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="tiposervicio" name="tiposervicio">
													<option value="tiposervicio">Seleccionar Tipo Servicio</option>
													<?php 
														foreach($TipoServicios as $value){ ?>
															<option value="<?php echo $value->tps_id ?>"><?php echo $value->tps_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Reproductor
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="reproductor" name="reproductor">
													<option value="reproductor">Seleccionar Reproductor </option>
													<?php 
														foreach($Reproductores as $value){ ?>
															<option value="<?php echo $value->rep_id ?>"><?php echo $value->rep_rp ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>									

									<!-- Para Muerte-->
									<div id="muerte">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Especif. Muerte
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="espmuerte" name="espmuerte">
													<option value="espmuerte">Seleccionar Especificacion Muerte</option>
													<?php 
														foreach($EspMuerte as $value){ ?>
															<option value="<?php echo $value->edm_id ?>"><?php echo $value->edm_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>	

									<!-- Para Venta-->
									<div id="venta">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Especif. Venta
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="espventa" name="espventa">
													<option value="espventa">Seleccionar Especificacion Venta</option>
													<?php 
														foreach($EspVenta as $value){ ?>
															<option value="<?php echo $value->edv_id ?>"><?php echo $value->edv_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>	

									<!-- Para Secado-->
									<div id="secado">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="form-field-1">
												Med.Cuartos M.
											</label>
											<div class="col-sm-9">
												<select class="form-control" id="medcuartosm" name="medcuartosm">
													<option value="medcuartosm">Seleccionar Med. C. Mamarios</option>
													<?php 
														foreach($MedCuartos as $value){ ?>
															<option value="<?php echo $value->mdm_id ?>"><?php echo $value->mdm_descripcion ?></option>
														<?php }
													?>
												</select>
											</div>
										</div> 
									</div>	

									<div class="form-group">
										<label class="col-sm-3 control-label" for="form-field-1">
											Fecha Evento
										</label>
										<div class="col-sm-9">
											<input type="text" id="fechaevento" name="fechaevento" class="form-control">
										</div>
									</div> <br>
									<div class="form-group"> <center>
										<button type="button" class="btn btn-teal" onclick="return guardar(this.form);">
											<i class="fa fa-save"></i> Guardar 
										</button>
										<button type="button" class="sb-toggle btn btn-danger" onclick="nuevocancel()"> 
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

		<!-- Librerias JS -->
		<?php include("Librerias/fuente/libjs.php"); ?>
		<script src="<?php echo base_url();?>Librerias/app/granja.js"></script>		
	</body>
</html>