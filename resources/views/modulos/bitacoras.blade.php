@extends('admin.admin_master')
@section('admin')

  @php
    $id = Auth::user()->id;
    $adminData = App\Models\User::find($id);
  @endphp

<div class="content-wrapper" style="min-height: 1058.31px;">
  
  <!-- Content Header (Page header) -->
  <section class="content-header">
      
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrativo Bitacoras</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio" style="color: blue;"><i class="nav-icon fas fa-home"></i>&nbsp;Inicio</a></li>
              <li class="breadcrumb-item active">Bitacoras</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      
      <div class="card-header">
          <br>

        <h3 class="card-title">Bitacoras Registradas</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
        </div>

      </div>

      <div class="card-body">
        
        <div style="width: 100%; display: flex; justify-content: center;">
          <div class="dt-buttons btn-group" style="text-align: center;">          
            <button class="btn btn-default buttons-print text-uppercase" tabindex="0" aria-controls="user-group-list" type="button" title="Imprimir"><span><i class="fa fa-print"></i></span></button>

            <button class="btn btn-default buttons-copy buttons-html5 text-muted" tabindex="0" aria-controls="user-group-list" type="button" title="Copiar"><span><i class="fa fa-copy"></i></span></button> 

            <button type="submit" id="export_data" name="Exportexcel" class="btn btn-default buttons-excel buttons-html5 text-success" tabindex="0" aria-controls="user-group-list" type="button" title="Exportar a Excel"><span><i class="fa fa-file-excel"></i></span></button> 

            <button class="btn btn-default buttons-pdf buttons-html5 text-danger" tabindex="0" aria-controls="user-group-list" type="button" title=" Exportar a PDF"><span><i class="fa fa-file-pdf"></i></span></button> 

            <button id="email-btn" class="btn btn-default buttons-email text-primary" tabindex="0" aria-controls="invoice-invoice-list" type="button" title="Email"><span><i class="fa fa-envelope"></i></span></button>
          </div>
        </div>
      
        <br>
      
        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
          <thead>
            <tr>
              <th>Id</th>
              <th>Correo</th>
              <th>Fecha Ingreso</th>
              <th>Fecha Cierre</th>
              <th>Estado</th>
            </tr>
          </thead>
            <tbody>
               
            @foreach($usuarios as $item)
                <tr>
                  
                  <td> {{$item->id}} </td>

                  <td> {{$item->email}} </td>
              
                  <td>
                    {{$item->fechaIngreso}}
                  </td>
              
                  <td>
                    {{$item->fechaCierre}}
                  </td>
              
                  <td>
                    @if(Auth::check() && Auth::user()->id == $item->id)
                      <button class="btn btn-success btn-sm btnActivar">Activo</button>
                    @else
                      <button class="btn btn-danger btn-sm btnActivar">Inactivo</button>
                    @endif
                  </td>
               </tr>
             @endforeach
            
            </tbody>
        </table>
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <!--Footer-->
      </div>
        <!-- /.card-footer-->

    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->

</div>

@endsection 





