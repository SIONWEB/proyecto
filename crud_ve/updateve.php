
<?php
    session_start();
    ob_start();
    include '../connect_db.php';

    if (isset($_SESSION['email'])) {?>


<!DOCTYPE HTML>

<html>
	<head>
		<title>General</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="../estilos.css">
		<link rel="stylesheet" href="../assets/css/main.css" />
		<style type="text/css">
			
			#example {

				color: black;
			}

		</style>
			
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="../Administrador.php" class="logo"><strong>Timiza ParkLot</strong> Conjunto Residensial</a>
									<ul class="icons">
										<li><a href="../cerrar_sesion.php" class="icon fa-instagram"><span class="label"></span>-SALIR-</a></li>
										<li><span class="label"></span>-ADMINISTRADOR-</li>
									</ul>
								</header>

							<!-- Content -->
						<section>
									<header class="main">
										<h1>Modificar vehiculos</h1>
									</header>
						<form name="form1" method="post" action="" id="cdr" >
  									<h3>Buscar vehiculo  </h3>
      								<p>
        							<input name="placa"  type="text" id="busqueda">
        							<input type="submit" name="Submit" value="buscar" />
        							</p>
      								</p>
						</form>
						
						<form  action="CRUD/editarDatos.php" method="POST">	
								
								
								<?php
									$busca="";
									$busca=	isset($_POST['placa'])?$_POST['placa']:"";
									$link=mysqli_connect('localhost','root','12345','parqueadero');
									
									if($busca!=""){
										//echo "SELECT * FROM usuarios WHERE cedula LIKE '%".$busca."%'";
									$mostrar="SELECT * FROM vehiculos WHERE placa = '".$busca."'";//cambiar nombre de la tabla de busqueda
									$result=mysqli_query($link,$mostrar);
								 while($mostrar=mysqli_fetch_array($result)){
		 							

								  ?>
								  <table>
								 
								 <tbody>
								
									<td><?php echo $mostrar['placa']; ?></td>
									<td><?php echo $mostrar['color']; ?></td>
									<td><?php echo $mostrar['marca']; ?></td>						
									<td><?php echo $mostrar['estado']; ?></td>
									<td><?php echo $mostrar['observaciones']; ?></td>
									<td><?php echo $mostrar['origen']; ?></td>
								</tbody>
								</table>
								 <div class="form-group">

								 	<!-- campos nombres-->
								 	<small id="cedulaHelp" class="form-text text-muted">placa a Actualizar</small>
								 	<input type="text" class="form-control" id="example" aria-describedby="cedulaHelp" placeholder="Ver cedula" name="placa" value="<?php echo $mostrar['placa']; ?>" readonly>

								 	<!-- campos nombres-->
								 	<small id="nombreHelp" class="form-text text-muted">color  a Actualizar.</small>
								 	<input type="text" class="form-control" id="example" aria-describedby="nombreHelp" placeholder="Ingrese los Nombres" name="color" value="<?php echo $mostrar['color']; ?>">
								 	
								    <!-- campos apellidos-->
								    <small id="apellidoHelp" class="form-text text-muted">marca  a Actualizar.</small>
								    <input type="text" class="form-control" id="example" aria-describedby="apellidoHelp" placeholder="Ingrese los Apellidos" name="marca" value="<?php echo $mostrar['marca']; ?>">
								 	
								 	<!-- campos apellidos-->
								   <small id="telefonoHelp" class="form-text text-muted">estado  a Actualizar.</small>
								    <input type="text" class="form-control" id="example" aria-describedby="telefonoHelp" placeholder="Ingrese el telefono" name="estado" value="<?php echo $mostrar['estado']; ?>">

								      <small id="telefonoHelp" class="form-text text-muted">observaciones  a Actualizar.</small>
								    <input type="text" class="form-control" id="example" aria-describedby="telefonoHelp" placeholder="Ingrese el telefono" name="observaciones" value="<?php echo $mostrar['observaciones']; ?>">

								     <small id="telefonoHelp" class="form-text text-muted">origen a Actualizar.</small>
								    <input type="text" class="form-control" id="example" aria-describedby="telefonoHelp" placeholder="Ingrese el celular" name="origen" value="<?php echo $mostrar['origen']; ?>">

								 </div>
								
								  
								 		
								 	<!-- ingreso de documentos-->						
								 <!--div class="form-group"> ingreso o acceso a carpetas para guardar
								    <label for="exampleInputFile">File input</label>
								    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
								    <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
								  </div-->
								 

								  <div class="form-check" style="margin-top: 1%;">
								     <button type="submit" class="btn btn-primary">Actualizar</button>
								   
								  </div>
								  <?php
									}

								}
								  ?>

						</form>


					</section>

					<section>	
					<div class="table-responsive">
   						<table class="table table-small-font table-bordered table-striped table-responsive">
								  <thead>
								  	<h1 style="text-align: center;">Listados de Ingreso</h1>
								    <tr>
								    
								      <th scope="col">PLACA</th>
								      <th scope="col">COLOR</th>
								       <th scope="col">MARCA</th>
								      <th scope="col">ESTADO</th>
								      <th scope="col">FECHA INGRESO</th>
								      <th scope="col">FECHA SALIDA</th>
								      <th scope="col">OBSERVACIONES</th>
								      <th scope="col">ORIGEN</th>
								     </tr>
								  </thead>
								  <?php 
								  
								  $link=mysqli_connect('localhost','root','12345','parqueadero');
								  $sql="SELECT * FROM vehiculos ";
								  $result=mysqli_query($link,$sql);

								  while($mostrar=mysqli_fetch_array($result)){
		 
								  ?>
								<tbody>
								
									<td><?php echo $mostrar['placa']; ?></td>
									<td><?php echo $mostrar['color']; ?></td>
									<td><?php echo $mostrar['marca']; ?></td>						
								
									<td><?php echo $mostrar['fecha_ingreso']; ?></td>
									<td><?php echo $mostrar['fecha_salida']; ?></td>
								</tbody>

								<?php 
								}
								?>
						</table>
					</div>
					</section>	
						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							

							<!-- Menu -->
						<nav id="menu">
									<header class="major">
										<h2 style="color: black;">Menu</h2>
									</header>
									<ul>
										<li><a href="../Administrador.php">Inicio</a></li>
										<li>
											<span class="opener">Ingresos Usuarios</span>
											<ul>
												<li style="color: black;"><a href="crearuser.php">Crear</a></li>
												<li style="color: black;"><a href="eliminaruser.php">Eliminar</a></li>
												<li style="color: black;"><a href="modificaruser.php">Modificar</a></li>
												<li style="color: black;"><a href="listaruser.php">Listado</a></li>
											</ul>
										</li>
										<li>
											<span class="opener">Ingresos Vehiculos</span>
											<ul>
												<li style="color: black;"><a href="#">Crear</a></li>
												<li style="color: black;"><a href="#">Eliminar</a></li>
												<li style="color: black;"><a href="#">Modificar</a></li>
												<li style="color: black;"><a href="#">Listado</a></li>
											</ul>
										</li>
										<li>
											<span class="opener">Puntos de parqueo</span>
											<ul>
												<li style="color: black;"><a href="#">Visualizar Punto/parqueo</a></li>
												<li style="color: black;"><a href="#">Programar Punto/parqueo</a></li>
												
											</ul>
										</li>
										<li><a href="../elements.php">Programar Eventos</a></li>
										<li>
											<span class="opener">Informes</span>
											<ul>
												<li style="color: black;"><a href="#">Diario</a></li>
												<li style="color: black;"><a href="#">Semanal</a></li>
												<li style="color: black;"><a href="#">Mensual</a></li>
												
											</ul>
										</li>
										<li><a href="../generic.php">Quejas y Reclamos(PQR)</a></li>
										
										
									</ul>
								</nav>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Destacados</h2>
									</header>
									<div class="mini-posts">
										<article>
											<a href="#" class="image"><img src="../images/pic014.jpg" alt="" /></a>
											<p style="color: black;">Noticias Uno mes actual más Importantes del conjunto</p>
										</article>
										<article>
											<a href="#" class="image"><img src="../images/pic015.jpg" alt="" /></a>
										<p style="color: black;">Noticias Dos mes actual más Importantes del conjunto</p>
										</article>
										<article>
											<a href="#" class="image"><img src="../images/pic016.jpg" alt="" /></a>
										<p style="color: black;">Noticias Dos mes actual más Importantes del conjunto</p>
										</article>
									</div>
									<ul class="actions">
										<li><a href="#" class="button">Galeria</a></li>
									</ul>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Noticias Antiguas</h2>
									</header>
									<p>parrafos</p>
									<ul class="contact">
										<li class="fa-envelope-o"><a href="#">administrador@sionwebsites.com</a></li>
										<li class="fa-phone">(+57) 317-264-6327</li>
										<li class="fa-home">Bogota, Colombia</li>
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Untitled. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
								</footer>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>

			<script>
   $(function() {
      $('.table-responsive').responsiveTable({options});
   });
</script>

	</body>
</html>

<?php
    }
    else{
        echo'<script>window.location ="../index.php"</script>';

        }
 ?>
