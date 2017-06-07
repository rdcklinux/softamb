<div class="container">

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1 class="text-center"><?=$title?></h1>
			<br>
			<form role="form" action="/Backend/Persona/edit" method="GET">
                              
				<div class="form-group">
					Rut<input type="text"  name="rut" class="form-control ">
				</div>  
				<div class="form-group">
					Password<input type="text"  name="password" class="form-control ">
				</div>              
				<div class="form-group">
					Nombre <input type="text"  name="nombre" class="form-control ">
				</div>         
				<div class="form-group">
					Apellido <input type="text"  name="apellido" class="form-control ">
				</div>        
				<div class="form-group">
					Fecha Nacimiento <input type="text"  name="fecha_nacimiento" class="form-control ">
				</div>   
				<div class="form-group">
					Direccion <input type="text"  name="direccion" class="form-control ">
				</div> 
				<div class="form-group">
					Contacto <input type="text"  name="contacto" class="form-control ">
				</div> 	
				<div class="form-group">
					Activo <input type="text"  name="activo" class="form-control ">
				</div> 		
				<div class="form-group">
					Gestor <input type="text"  name="gestor" class="form-control ">
				</div> 	 
				<div class="form-group">
					Cliente <input type="text"  name="cliente" class="form-control ">
				</div> 	              

				<div class="row">
					<div class="col-md-6">
						
						<button type="submit" class="btn btn-success btn-block">Actualizar</button>

					</div>
					<div class="col-md-6">
						<a class="btn btn-default btn-block" href="/backend/persona">Volver</a>
					</div>
				</div>
			</form>
		</div>
	</div>

</div>
