<?php

class UnidadEmpaque extends Eloquent
{
    protected $table = "aux_unidadempaque";   
	protected $primaryKey = "ID";
	
	public $timestamps = false;
    protected $guarded = [
        "ID"
    ];


}