<?php

class CodigoClasificacion extends Eloquent
{
    protected $table = "inv_codigo_clasificacion";    

	public $timestamps = false;
    protected $guarded = [
        "ID"
    ]; 
}