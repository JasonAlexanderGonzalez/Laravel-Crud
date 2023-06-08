<!-- Instanciamos un método para que muestre al usuario del TENANAT conectado
    y nos permita editar el perfil de la TIENDA, es decir; del TENANT -->
    @php
   $id = Auth::user()->tenant->id;
    $tenant = App\Models\Tenants::find($id);
@endphp


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<div class="col-12 col-md-8"> 
	
	<div class="card card-primary card-outline">
		
		<div class="card-header">
			
			<h5 class="m-0 text-uppercase text-secondary">
				
				<strong>Actualizar datos de la TIENDA</strong>

			</h5>

		</div>

		<div class="card-body">

        <form method="post" action="{{ route('changedata.tenant') }}" enctype="multipart/form-data">
                @csrf
            
                <!-- NOMBRE DE TIENDA -->
            <div class="form-group">
            <label for="inputName" class="control-label">Nombre de la tienda:</label>
            <div>   
            <input name="nombreTienda" class="form-control" type="text" value="{{ $tenant->nombreTienda }}"  id="example-text-input">
            </div>
            </div>

             <!-- Dirección -->
            <div class="form-group">
            <label for="inputName" class="control-label">Dirección:</label>
            <div>
            <input name="Direccion" class="form-control" type="text" value="{{ $tenant->Direccion }}"  id="example-text-input">
            </div>
            </div>
            
            <!-- Email de Tienda -->
            <div class="form-group">
				<label for="inputEmail" class="control-label">Correo electrónico:</label>
				<div>					
                <input name="CorreoTenant" class="form-control" type="text" value="{{ $tenant->CorreoTenant }}"  id="example-text-input" readonly>
				</div>
			</div>

            <!-- Telefono de Tienda -->
            <div class="form-group">
				<label for="inputTelefono" class="control-label">Telefono:</label>
				<div>					
                <input name="Telefono" class="form-control" type="text" value="{{ $tenant->Telefono }}"  id="example-text-input" readonly>
				</div>
			</div>

            <!-- Fecha Contrato -->
			<div class="form-group">
                <label for="labelFecha" class="control-label">Fecha  de contrato:</label>
                <div>
                <input name="FechaContrato" class="form-control" type="text" value="{{ $tenant->FechaContrato }}"  id="example-text-input" readonly>
                </div>
            </div>

            <!-- Fecha Vencimiento -->
			<div class="form-group">
            <label for="labelFecha" class="control-label">Fecha  de vencimiento:</label>
            <div>
            <input name="FechaVencimiento" class="form-control" type="text" value="{{ $tenant->	FechaVencimiento }}"  id="example-text-input" readonly>
            </div>
            </div>


            <div class="form-group">
				<div class="col-sm-offset-2">
                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Actualizar Perfil">
				</div>
			</div>

        </form>
		</div>

	</div>	

</div>


<!-- Script para capturar las imágenes(leerlas) y cargarlas en el objeto de imagenes -->
<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                //Se mostrará la imagen el el img con el nombre showImage
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>