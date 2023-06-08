<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();

            $table->string('Descripcion');
            $table->string('CodigoBarras');
            $table->binary('ImagenProducto')->nullable();
            $table->float('PrecioCompra')->nullable();
            $table->float('PrecioVenta')->nullable();
            $table->float('Utilidad')->nullable();
            $table->integer('Existencia')->nullable();
            $table->integer('Stock')->nullable();
            $table->float('Ventas')->nullable();
            $table->timestamp('FechaIngreso')->nullable();

             //genero el campo de estado y luego lo relaciono
             $table->unsignedBigInteger('estado_id');  
             $table->foreign('estado_id')->references('id')->on('estados');
 
             //genero el campo de estado y luego lo relaciono
             $table->unsignedBigInteger('tenant_id');  
             $table->foreign('tenant_id')->references('id')->on('tenants');

              //genero el campo de estado y luego lo relaciono
              $table->unsignedBigInteger('categoria_id');  
              $table->foreign('categoria_id')->references('id')->on('categorias');

              //genero el campo de estado y luego lo relaciono
              $table->unsignedBigInteger('proveedor_id');  
              $table->foreign('proveedor_id')->references('id')->on('proveedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
