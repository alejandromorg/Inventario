<?php

class DetalleCodigoClasificacion extends Eloquent
{
    protected $table = "inv_detalle_codigo_clasificacion";    

	public $timestamps = false;
    protected $guarded = [
        "ID"
    ]; 
}