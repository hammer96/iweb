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
                                                <td class="center" ><?php echo $animal['ani_rp']?></td>
                                                <td class="center" ><?php echo $animal['ani_nombre'] ?></td>

                                                <!-- Enero-->
                                                <td class="sb-toggle center">
                                                	<?php foreach ($animal['eventos'] as $key => $evento) { 
                                                		$fecha=explode("-",$evento['eveani_fecha']);
	                                                	if ($fecha[1]=="01") { ?>
		                                                	<i class="<?php echo $evento['eve_simbolo'] ?>" id="simbolo">
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
		                                                	<i class="<?php echo $evento['eve_simbolo'] ?>" id="simbolo">
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
		                                                	<i class="<?php echo $evento['eve_simbolo'] ?>" id="simbolo">
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
		                                                	<i class="<?php echo $evento['eve_simbolo'] ?>" id="simbolo">
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
		                                                	<i class="<?php echo $evento['eve_simbolo'] ?>" id="simbolo">
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
		                                                	<i class="<?php echo $evento['eve_simbolo'] ?>" id="simbolo">
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
		                                                	<i class="<?php echo $evento['eve_simbolo'] ?>" id="simbolo">
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
		                                                	<i class="<?php echo $evento['eve_simbolo'] ?>" id="simbolo">
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
		                                                	<i class="<?php echo $evento['eve_simbolo'] ?>" id="simbolo">
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
		                                                	<i class="<?php echo $evento['eve_simbolo'] ?>" id="simbolo">
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
		                                                	<i class="<?php echo $evento['eve_simbolo'] ?>" id="simbolo">
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
		                                                	<i class="<?php echo $evento['eve_simbolo'] ?>" id="simbolo">
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
									<div class="form-group">
										<label class="col-sm-3 control-label" for="form-field-1">
											Evento
										</label>
										<div class="col-sm-9">
											<select class="form-control">
												<option value="Evento">Seleccione Evento</option>
												<option value="Parto">Parto</option>
												<option value="Servicio">Servicio</option>
												<option value="Celo">Celo</option>
												<option value="Aborto">Aborto</option>
												<option value="Muerte">Muerte</option>
												<option value="Venta">Venta</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label" for="form-field-1">
											Fecha Evento
										</label>W
										<div class="col-sm-9">
											<input type="text" id="fechaevento" class="form-control">
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