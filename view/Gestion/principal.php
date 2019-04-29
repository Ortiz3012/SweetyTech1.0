<!DOCTYPE html>
<?php
?>
<html lang="en">
	<?php include_once ("../util/head.php"); ?>
	<body>
		<?php include_once ("../util/menu.php"); ?>
		<main>
			<?php include_once ("../util/logo.php"); ?>

			<!-- breadcrumbs -->
			<div class="row col-md-12" id="migas">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb" style="background:#DB00DB; padding-top:15%;">
						<li class="breadcrumb-item text-light" id="titulos"><a>Pagina Principal</a></li>

					</ol>
				</nav>
			</div>
			<!-- / breadcrumbs -->
			<div class="row col-md-12" style="margin-left:5%;">

				<div class="card text-white bg-primary col-md-3" style="max-width: 18rem; height:18rem;  margin: 3%;">
					<div class="card-header">Publicaciones</div>
					<div class="card-body">
						<h5 class="card-title">Crear nueva publicacion el la web o editar una realizada</h5>
						<p class="card-text"> <span class="lnr lnr-license icon10"> 7</span></p>

					</div>

				</div>

				<div class="card text-white bg-success col-md-3" style="max-width: 18rem; height:18rem;  margin: 3%;">
					<div class="card-header">Comentarios</div>
					<div class="card-body">
						<h5 class="card-title">Ver Nuevos Comentarios de publicaciones</h5>
						<p class="card-text"><span class="lnr lnr-bubble icon10"> 12</span></p>
					</div>
				</div>
				<div class="card text-white bg-danger col-md-3" style="max-width: 18rem; height:18rem;  margin: 3%;">
					<div class="card-header">Mensajes</div>
					<div class="card-body">
						<h5 class="card-title">Ver los nuevos mensajes que han realizado</h5>
						<p class="card-text"><span class="lnr lnr-envelope icon10">14</span></p>
					</div>
				</div>
				<div class="card text-white bg-dark col-md-3" style="max-width: 18rem; height:18rem;  margin: 3%; ;">
					<div class="card-header">Estadadisticas</div>
					<div class="card-body">
						<h5 class="card-title">Ver las estadiaticas del mes a comparacion con el anterior</h5>
						<p class="card-text"><span class="lnr lnr-chart-bars icon10"> </span><span class="lnr lnr-chevron-up icon10"></span></p>
					</div>
				</div>

			</div>
			<?php require_once ("../util/footer.php"); ?>
		</main>
		<?php require_once ('../util/Libscripts.php') ; ?>
	</body>
</html>
